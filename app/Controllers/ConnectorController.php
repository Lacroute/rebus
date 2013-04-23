<?php
class ConnectorController{


	function beforeRoute(){
		echo F3::get('VERB');
		
	}

	function home(){
		$facebook = new Facebook(array(
			'appId'  => '228097693986241',
			'secret' => '1fd2798433f737a8c48994b963917562'
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

    	echo Views::instance()->render('home.php');
	}

	function doc(){
		echo Views::instance()->render('userref.html');
	}


	function search(){
		echo 'coucou';exit();
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

	function coucou(){
		echo 'coucou';
	}

}
