<?php
class RebusController{

	function pool(){
		echo "Ici, dashboard.";
	}

	function create(){
		switch(F3::get('VERB')){
			case 'GET':
				F3::mset(array(	'page'		=> 'admin/ConnectorCreate',
								'pageTitle'	=> 'Former une phrase'));
				break;
			case 'POST':
				$check=array('sentence'=>'required','receiver'=>'required');
				$error=Datas::instance()->check(F3::get('POST'),$check);
				if($error){
					F3::set('errorMsg',$error);
					F3::reroute('/pool');
					return;
				}
				$idReceiver = (F3::get('SESSION.user_id') == "64") ? "63" : "64";

				$data = array(
					"sentence" => F3::get('POST.sentence'),
					"receiver" => $idReceiver
				);
				$rebusId = RebusModel::instance()->addRebus($data);

				//creation du dossier de stockage avec comme nom l'id du rebus
				mkdir(F3::get('REBUS_FOLDER').'/'.$rebusId, 0777, true);
				
				//on crée le fichier json vierge
				$jsonFile = fopen(F3::get('REBUS_FOLDER').'/'.$rebusId.'/data.json', 'w');
				$jsonData = array(
					"author" => F3::get('SESSION.user_id'),
					"receiver" => $data['receiver'],
					"sentence" => $data['sentence'],
					"items" => [],
				);
				fwrite($jsonFile, json_encode($jsonData));
				fclose($jsonFile);

				$sc = new SearchController();
				$sc->search();	

				F3::mset(array(	'page'		=> 'admin/roulette',
								'pageTitle'	=> 'Choisir ses médias'));

				F3::set('SESSION.rebusId', $rebusId);
				
				break;
		}
	}

	function mashup(){
		F3::set('rebusId', F3::get('PARAMS.id'));
		F3::set('page', 'mashup');
	}

	function find(){
		$idRebus = F3::get('PARAMS.id');
		$rebus = new RebusModel();
		$myRebus = $rebus->getRebusByIdAndReceiver($idRebus, F3::get('SESSION.user_id'));
		$value = $rebus->getEmptyWords();
		F3::set('empty', $value );
		if(!$myRebus){
			F3::reroute('/');
		}else{
			F3::set('idRebus', $idRebus);
			F3::set('isFound', $myRebus->is_found);
			F3::set('sentence', explode(" ",$myRebus->sentence));
			F3::set('page', 'find');
		}
	}

	function show(){
		$idRebus = F3::get('PARAMS.id');
		$rebus = new RebusModel();
		$myRebus = $rebus->getRebusByIdAndAuthor($idRebus, F3::get('SESSION.user_id'));
		$str_data = file_get_contents(F3::get('REBUS_FOLDER').$idRebus.'/data.json');
		$data = json_decode($str_data,true);

		if(!$myRebus){
			F3::reroute('/');
		}else{
			F3::set('rebus', $data);
			F3::set('page', 'show');
		}
	}

	function addItems(){
		$rebusId = F3::get('SESSION.rebusId');
		$json = F3::get('POST.json');
		$str_data = file_get_contents(F3::get('REBUS_FOLDER').$rebusId.'/data.json');
		$data = json_decode($str_data,true);

		foreach ($json['items'] as $key=>$value) {
			$data['items'][$key] =$value;
		}

		file_put_contents(F3::get('REBUS_FOLDER').$rebusId.'/data.json', json_encode($data));
		echo $rebusId;
		die();
	}

	function validate(){
		$idRebus = F3::get('POST.idRebus');
		$rebus = new RebusModel();
		$rebus->validateRebus($idRebus);
		exit();
	}

	function afterRoute(){
		echo Views::instance()->render('template.php');
	}
}
?>