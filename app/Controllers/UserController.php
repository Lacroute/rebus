<?php
class UserController{

	// GET | POST
	private $verb = null;

	function beforeRoute(){
		F3::set('SESSION', F3::get('SESSION'));
		$this->verb = F3::get('VERB');
	}


/*
	*	Part managing connection
	*	logout()
	*	login()
	*	signin()
*/		
	function logout(){
		F3::set('SESSION', null);

		F3::reroute('/');
	}


	function signin(){
		$this->isConnected(true);
		switch($this->verb){

			case 'GET':	
				F3::mset(array(	'page'		=> 'signin',
								'pageTitle'	=> 'Signin'));
			break;

			case 'POST':
				//Reroute if already connected
				if(!F3::exists('POST')){F3::reroute('/');}

				//Set default values for POST
				F3::mset(array(	'POST.user_status'		=> '1',
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
		$this->isConnected(true);

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
									'SESSION.user_last_name' 	=> $user->user->user_last_name));

				F3::reroute('/');
				}

			break;
		}//END SWITCH

		
	}



/*
	*	Part displaying user
	*	profile()
	*	login()
	*	signin()
*/		



	//show his own profile
	function profile(){
		$this->isConnected();
		$user = new UserModel(F3::get('SESSION.user_id'));
		//reroute for profile with slug
		F3::reroute('/user/profile/'.$user->user->user_id.'/'.$user->user->user_name.'_'.$user->user->user_last_name);exit();
	}

	
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

		if(F3::exists('SESSION.user_id')){
			$isfriend = $user->isfriend(F3::get('SESSION.user_id'));
			F3::set('isfriend', $isfriend);
			if($isfriend == 3){
				$temp =  new UserModel(F3::get('SESSION.user_id'));
				F3::set('waiting_invit', $temp->waitingInvit());
			}
		} 


		F3::mset(array(	'page'			=> 'profile',
		 				'rebusAuthor'	=> $rebusAuthor,
		 				'friends'	=> $friends,
		 				'user'	=> $user,
						'pageTitle'		=> $user->user->user_name.' '.$user->user->user_last_name));	
	}

	function editProfile(){
		$this->isConnected();
		$user = new UserModel(F3::get('SESSION.user_id'));
		$userData = $user->user;
		F3::mset(array(	'user'			=> $userData,
		 				'page'			=> 'editProfile',
						'pageTitle'		=> 'edit Profile'));
	}



	function listing(){
		
		$users =new UserModel();
		$users = $users->getList();
		//if user conneced, check if is friend
		F3::mset(array(	'users'			=> $users ,
		 				'page'			=> 'listing',
						'pageTitle'		=> 'List'));
	}

	function add(){
		$user =new UserModel(F3::get('SESSION.user_id'));
		$id = F3::get('PARAMS.id');
		$user->addToFriends($id);
	}


	function accept(){
		$user =new UserModel(F3::get('SESSION.user_id'));
		$id = F3::get('PARAMS.id');
		$user->InvitAction($id, true);
	}

	function decline(){
		$user =new UserModel(F3::get('SESSION.user_id'));
		$id = F3::get('PARAMS.id');
		$user->InvitAction($id, false);

	}

/*
	*
	*	Private functions
	*	isConnected()
	*
*/
	private function isConnected($bool = false){
	
		if($bool == false){
			// not connected
			if(!F3::exists('SESSION.user_id')){F3::reroute('/user/login');exit();}
		}else{
				//if already connected
			if(F3::exists('SESSION.user_id')){F3::reroute('/user/profile');exit();}
		}
		
	}


	function afterRoute(){
		echo Views::instance()->render('template.php');
	}

}
?>