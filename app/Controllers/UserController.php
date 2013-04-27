<?php
class UserController{

	// GET | POST
	private $verb = null;

	function beforeRoute(){
		 $this->verb = F3::get('VERB');
	}

	function signin(){

		switch($this->verb){

			case 'GET':
				if(F3::exists('SESSION.user_id')){
					F3::reroute('/');
				}
				F3::mset(array(	'page'		=> 'signin',
								'pageTitle'	=> 'Signin'));
			break;




			case 'POST':
				//Reroute if already connected
				if(!F3::exists('POST')){F3::reroute('/');}

				//Set default values for POST
				F3::mset(array(	'POST.user_facebook_id'	=> 'noFB',
								'POST.user_status'		=> '1',
								'POST.user_passwd'		=> md5(F3::get('POST.user_passwd'))));
			 	$response = UserModel::instance()->setUser();

			 	if($response == false){
			 		//mail already used
			 		F3::mset(array(	'page'		=> 'signin',
					 				'error'		=> 'Votre mail est déjà utilisé',
					 				'pageTitle' => 'Signin'));
			 	}else{
			 		F3::reroute('/');
			 	}
			break;
		}//END SWITCH
	

	}

	function login(){
		
		//if already connected
		if(F3::exists('SESSION.user_id')){F3::reroute('/');}

		switch($this->verb){

			case 'GET':
			F3::mset(array(	'page'		=> 'login',
							'pageTitle' => 'Login'));
			break;




			case 'POST':
				$user = UserModel::instance()->getUserByConnection();	
				if($user == false){
					F3::mset(array(	'page'	=> 'login',
			 						'error' => 'Erreur de mot de passe / mail'));
				}else{
					F3::mset(array(	'SESSION.user_id' 			=> $user->user->user_id,
									'SESSION.user_mail' 		=> $user->user->user_mail,
									'SESSION.user_name' 		=> $user->user->user_name,
									'SESSION.user_last_name' 	=> $user->user->user_last_name,
									'SESSION.user_facebook_id' 	=> $user->user->user_facebook_id));

				F3::reroute('/');
				}

			break;
		}//END SWITCH
	}

	function logout(){
		F3::mset(array(	'SESSION.user_id' 			=> null,
						'SESSION.user_mail' 		=> null,
						'SESSION.user_name' 		=> null,
						'SESSION.user_last_name'	=> null,
						'SESSION.user_facebook_id'	=> null));
		F3::reroute('/');
	}

	function profile(){
		$user = new UserModel(F3::get('SESSION.user_id'));
		$user = $user->getRebus('author');

		F3::mset(array(	'page'			=> 'profile',
		 				'rebusAuthor'	=> $user,
						'pageTitle'		=> F3::get('SESSION.user_name').' '.F3::get('SESSION.user_last_name')));
	}


	function afterRoute(){
		F3::set('SESSION', F3::get('SESSION'));
		echo Views::instance()->render('template.php');
	}

}
?>