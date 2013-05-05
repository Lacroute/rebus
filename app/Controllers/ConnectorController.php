<?php
class ConnectorController{

	function beforeroute(){
		// $id = F3::get('SESSION.user_id');
		// if(!isset($id)){F3::reroute('/user/login');
	}

	function home(){
		$facebook = new Facebook(array(
			'appId'  => F3::get('APP_ID'),
			'secret' => F3::get('SECRET')
		));	

		//get user data
		$user = $facebook->getUser();

		if ($user) {
			try {
				// Proceed knowing you have a logged in user who's authenticated.
				$user_profile = $facebook->api('/me');
				F3::set('user', $user_profile);
			} catch (FacebookApiException $e) {
				$user = null;
				F3::set('user', null);
			}
		}

		//Link for connection/deconnection
		if ($user) {

			F3::mset(array(
				'FBconnexionText' => 'Déconnexion',
				'FBconnexionLink' =>  $facebook->getLogoutUrl()
				));

		} else {

			F3::mset(array(
				'FBconnexionText' => 'Connexion avec Facebook',
				'FBconnexionLink' => $facebook->getLoginUrl()
				));
		}

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
