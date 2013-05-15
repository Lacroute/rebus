<?php
class UserModel extends Prefab{

	//Mapper of rebus.user table
    private $mapper= null;

    //user
   	public $user = null;


	 function __construct($id = false, $isFB = false) {
	 		$this->mapper = new DB\SQL\Mapper(F3::get('db'),'user');

	 		if($id != false){	
	 			//if UserModel instancied with id parameter
	 			//we construct object with user properties
 				$this->initUser($id, $isFB);
 				
	 		}

	 		return $this;
     }


     /**
		GET single user 
		@param $id 			->  id
		@return object
    **/
    public function initUser($id){

    	
    	$search = $this->mapper->load(array('user_id=?', $id));
    	
    	$this->user = ($this->mapper->dry()) ? null : $search;
    	return $this;
    }
     /**
		GET single user by passwd and mail
		@param $id 			->  id
		@param $isFB 		-> TRUE = $id is a FB id, DEFAULT = false
		@return object
    **/
    public function getUserByConnection(){

    	$result =  $this->mapper->load(array("user_mail=? and user_passwd=?", F3::get('POST.user_mail'),  md5(F3::get('POST.user_passwd'))));
    	if($this->mapper->dry()){
    		return false;
    	}else{
    		$this->user = $result;
    		return $this;
    	}
    }

     /**
		SET single user
		@param $isFantom			-> TRUE = SET a waiting user, DEFAULT = false (useless if form = db)
		@return object
    **/
	public function setUser($isFantom = false){
		
		//vérification si le pseudo est déjà pris	
		$this->mapper->load(array('user_mail=?', F3::get('POST.user_mail')));
		
		if(!$this->mapper->dry()){
			return false;
		}

		//vérification si le compte facebook est déjà lié
		/*if(F3::get('POST.user_facebook_id') != "noFB")
		$ifExists = $this->mapper->load(array('user_facebook_id=?', F3::get('POST.user_facebook_id') ));
		if(!$this->mapper->dry()){
			return false;
		}*/

		$this->mapper->copyFrom('POST');
		$this->mapper->insert();
		$this->user = $this->mapper->last();
		return $this;
    }


   /**
		UPDATE single user
		@param $userId 				-> userId	
		@param $isFB 				-> TRUE = userId is FB	DEFAULT = false
		@return Bool 				-> TRUE = updated, FALSE = no user to update
    **/    
    public function updateUser(){
		
    	if($this->user != null){
    		$this->mapper->load(array('user_id=?',$this->user->user_id));
    	}else{
    		return false;
    	}
		
		if($this->mapper->dry()){
			//no user to update
			return false;
		}else{
			$this->mapper->copyFrom('POST');
			$this->mapper->update();
			return true;
		}

    	

    }

    /**
		GET rebus author
		@param $type
		@return object
    **/     
	public function getRebus($type){

		$search = new DB\SQL\Mapper(F3::get('db'),'view_'.$type.'_to_rebus');
		$result = $search->find(array(('user_id=?'), $this->user->user_id));
		return $result;
		
	}


    /**
		GET friendlist
		@return object
    **/     
	public function getFriends(){

		$search = new DB\SQL\Mapper(F3::get('db'),'view_user_to_user');
		$result = $search->find(array(('friend_id=?'), $this->user->user_id));
		return $result;
		
	}

    /**
		GET friendlist
		@return object
    **/     
	public function getList(){

		$search = new DB\SQL\Mapper(F3::get('db'),'user');
		$result = $search->find();
		return $result;
		
	}

    /**
		is in friendlist ?
		@return bool
    **/     
	public function isfriend($id){
		if($id == $this->user->user_id){
			return 3;
		}
		$search = new DB\SQL\Mapper(F3::get('db'),'view_user_to_user');
		$result = $search->load(array(('user_id=? and friend_id=?'), $id, $this->user->user_id));
		if($search->dry()){
			return 2;
		}else{
			return 1;
		}

	}

    /**
		is in friendlist ?
		@return bool
    **/     
	public function waitingInvit(){
		$search = new DB\SQL\Mapper(F3::get('db'),'view_waiting_invit');
		$result = $search->find(array('user_id=?', $this->user->user_id));
		return $result;
	}

	public function InvitAction($id, $bool){
		if($bool == false){
			//refuse
			$search = new DB\SQL\Mapper(F3::get('db'),'user_to_user');
			$search->load(array('user_id_1=? AND user_id_2=?',$id,  $this->user->user_id));
			$search->erase();
		}else{
			//accept
			$search = new DB\SQL\Mapper(F3::get('db'),'user_to_user');
			$search->load(array('user_id_1=? AND user_id_2=?',$id,  $this->user->user_id));
			$search->status = 1;
			$search->update();

		}
	}

	public function addToFriends($id){
		$search = new DB\SQL\Mapper(F3::get('db'),'user_to_user');
		$search->user_id_1 = $this->user->user_id;
		$search->user_id_2 = $id;
		$search->status = 0;
		$search->save();
	}

	function __destruct(){

	}

}
?>