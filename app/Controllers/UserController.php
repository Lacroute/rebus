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
				$this->isConnected();
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
	
		echo Views::instance()->render('signin.php');
	}

	function login(){
		
		//if already connected
		$this->isConnected();

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

		echo Views::instance()->render('login.php');
	}

	function logout(){
		F3::mset(array(	'SESSION.user_id' 			=> null,
						'SESSION.user_mail' 		=> null,
						'SESSION.user_name' 		=> null,
						'SESSION.user_last_name'	=> null,
						'SESSION.user_facebook_id'	=> null));
		F3::reroute('/');
	}

	//show his own profile
	function profile(){
		$this->isConnected();
		$user = new UserModel(F3::get('SESSION.user_id'));
		//reroute for profile with slug
		F3::reroute('/user/profile/'.$user->user->user_id.'/'.$user->user->user_name.'_'.$user->user->user_last_name);exit();
	}

	//show the profilbyId
	function showProfileById(){
		$user = new UserModel(F3::get('PARAMS.id'));
		//stop if user not found
		if($user->user == null){echo 'pas d\'user sous cet id';exit();}
		//reroute with slug
		F3::reroute('/user/profile/'.$user->user->user_id.'/'.$user->user->user_name.'_'.$user->user->user_last_name);exit();
	}

	function showProfileByIdandSlug(){
		$user = new UserModel(F3::get('PARAMS.id'));
		//stop if user not found
		if($user->user == null){echo 'pas d\'user sous cet id';exit();}
		//reroute if slug is not good
		if(F3::get('PARAMS.slug') != $user->user->user_name.'_'.$user->user->user_last_name){
			F3::reroute('/user/profile/'.$user->user->user_id.'/'.$user->user->user_name.'_'.$user->user->user_last_name);exit();
		}


		$rebusAuthor = $user->getRebus('author');
		$friends = $user->getFriends();
		F3::mset(array(	'page'			=> 'profile',
		 				'rebusAuthor'	=> $rebusAuthor,
		 				'friends'	=> $friends,
						'pageTitle'		=> F3::get('SESSION.user_name').' '.F3::get('SESSION.user_last_name')));

		
	}

	function editProfile(){
		$this->isConnected();
		$user = new UserModel(F3::get('SESSION.user_id'));
		$userData = $user->user;
		F3::mset(array(	'user'			=> $userData,
		 				'page'			=> 'editProfile',
						'pageTitle'		=> 'edit Profile'));

	}

	private function isConnected(){
		//if already connected
		if(!F3::exists('SESSION.user_id')){F3::reroute('/');exit();}
	}


	function afterRoute(){
		F3::set('SESSION', F3::get('SESSION'));
		// echo Views::instance()->render('template.php');
	}

}
?>