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

	function afterRoute(){
		echo Views::instance()->render('template.php');
	}

}
