<?php
class SearchController{

	function search(){
		switch (F3::get('VERB')) {
			case 'GET':
				echo Views::instance()->render('tutorial.php');
				break;
			case 'POST':
				$sentence = F3::get('POST.sentence');
				$sentence = explode(" ", $sentence);
				$dribble = new kepezz\Dribbble();
				$pinterest = new kepezz\Pinterest();
				$result = array();
				foreach ($sentence as $index => $keyword) {
					$result[$keyword]['dribbble'] = $dribble->search($keyword);
					$result[$keyword]['pinterest'] = $pinterest->search($keyword);
				}
				F3::set('results', $result);
				echo Views::instance()->render('result_debug.php');
				break;
		}
	}

	function tutorial(){
		$this->search();
	}
}
?>