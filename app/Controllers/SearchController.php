<?php
class SearchController{

	function search(){
		switch (F3::get('VERB')) {
			case 'GET':
				F3::set('page', 'tutorial');

				break;
			case 'POST':
				$sentence = F3::get('POST.sentence');
				$sentence = explode(" ", $sentence);
				$dribble = new kepezz\Dribbble();
				$pinterest = new kepezz\Pinterest();
				$vimeo = new kepezz\Vimeo();

				$result = array();
				foreach ($sentence as $index => $keyword) {
					$result[$keyword]['img']['dribbble'] = $dribble->search($keyword);
					$result[$keyword]['img']['pinterest'] = $pinterest->search($keyword);
					$result[$keyword]['vid']['vimeo'] = $vimeo->search($keyword);
				}

				F3::set('results', $result);
				break;
		}
	}

	function tutorial(){
		$this->search();
	}

	function afterRoute(){
		F3::set('SESSION', F3::get('SESSION'));
		echo Views::instance()->render('template.php');
	}
}
?>