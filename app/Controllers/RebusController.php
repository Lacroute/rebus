<?php
class RebusController{

	function pool(){
		echo "Ici, dashboard.";
	}

	function create(){
		switch(F3::get('VERB')){
			case 'GET':
				echo Views::instance()->render('admin/ConnectorCreate.php');
				break;
			case 'POST':
				$check=array('sentence'=>'required','receiver'=>'required');
				// F3::set('POST', Datas::instance()->secure(F3::get('POST')));
				$error=Datas::instance()->check(F3::get('POST'),$check);
				if($error){
					F3::set('errorMsg',$error);
					F3::reroute('/pool');
					return;
				}

				$data = array(
					"sentence" => F3::get('POST.sentence'),
					"receiver" => F3::get('POST.receiver')
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

				// F3::reroute('/pool');
				break;
		}
	}

	function addItems(){
		$json = F3::get('POST');
		var_dump($json);
	}

	function afterRoute(){
		echo Views::instance()->render('template.php');
	}
}
?>