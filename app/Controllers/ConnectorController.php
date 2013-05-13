<?php
class ConnectorController{

	function beforeroute(){
		// $id = F3::get('SESSION.user_id');
		// if(!isset($id)){F3::reroute('/user/login');
	}

	function home(){

    	F3::set('page', 'home');
	}

	function doc(){
		echo Views::instance()->render('userref.html');
		die();
	}

	function search(){
		switch (F3::get('VERB')) {
			case 'GET':
				break;
			case 'POST':
				$sentence = F3::get('POST.sentence');
				$dribble = new kepezz\Dribbble();
				$pinterest = new kepezz\Pinterest();
				F3::set('res_dribbble', $dribble->search($sentence));
				F3::set('res_pinterest', $pinterest->search($sentence));

				F3::set('page', 'result_debug');
				break;
		}
	}

	function afterRoute(){
		echo Views::instance()->render('template.php');
	}

}
