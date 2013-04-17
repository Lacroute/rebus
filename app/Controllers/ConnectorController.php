<?php
class ConnectorController{

	function home(){
    	echo Views::instance()->render('home.php');
	}

	function doc(){
		echo Views::instance()->render('userref.html');
	}

	function search(){
		switch (F3::get('VERB')) {
			case 'GET':
				break;
			case 'POST':
				$keyword = F3::get('POST.keyword');
				$dribble = new kepezz\Dribbble();
				$pinterest = new kepezz\Pinterest();
				F3::set('res_dribbble', $dribble->search($keyword));
				F3::set('res_pinterest', $pinterest->search($keyword));
				echo Views::instance()->render('result_debug.php');
				break;
		}
	}
}
?>