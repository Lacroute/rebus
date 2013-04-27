<?php
class UserModel extends Prefab{

	//Mapper of rebus.user table
    public $user = null;

	 function __construct() {
	 		$this->user = new DB\SQL\Mapper(F3::get('db'),'user');
     }

     /**
		GET single user passwd + email
		@param $userId 			-> facebook id, or id
		@param $isFB 		-> TRUE = $id is a FB id, DEFAULT = false
		@return object
    **/
	function connectUser(){

		return $this->user->load(array("user_mail=? and user_passwd=?", F3::get('POST.user_mail'),  md5(F3::get('POST.user_passwd'))));

    }

      /**
		GET single user by id
		@param $userId 			-> facebook id, or id
		@param $isFB 		-> TRUE = $id is a FB id, DEFAULT = false
		@return object
    **/
	function getUser($userId, $isFB = false){

		if($isFB){
			return $this->user->load(array("user_facebook_id=?", $userId));
		}else{
			
			return $this->user->load(array("user_id=?", $userId));
		}
		

    }

     /**
		SET single user
		@param $isFantom			-> TRUE = SET a waiting user, DEFAULT = false (useless if form = db)
		@return bool 				->TRUE = inscrit, FALSE = déjà présent dans la base
    **/    
    function setUser($isFantom = false){
		
		//vérification si le pseudo est déjà pris	
		$ifExists = $this->user->load(array('user_mail=?', F3::get('POST.user_mail')));
		
		if($ifExists != null){
			return false;
		}

		//vérification si le compte facebook est déjà lié
		if(F3::get('POST.user_facebook_id') != "-1")
		$ifExists = $this->user->load(array('user_facebook_id=?', F3::get('POST.user_facebook_id') ));
		if($ifExists != null){
			return false;
		}

		

		$this->user->copyFrom('POST');
		$this->user->insert();
		return true;
    }

    /**
		UPDATE single user
		@param $userId 				-> userId	
		@param $isFB 				-> TRUE = userId is FB	DEFAULT = false
		@return Bool 				-> TRUE = updated, FALSE = no user to update
    **/    
    function updateUser($userId, $isFB = false){
		
		if($isFB){
			$this->user->load(array('user_facebook_id=?',$userId));
		}else{
			$this->user->load(array('user_id=?',$userId));
		}
		

		if($this->user->dry()){

			//no user to update
			return false;

		}else{

			$this->user->copyFrom('POST');
			$this->user->update();

			return true;
		}

    	

    }

    /**
		DELETE single user
		@param $userId 				-> userId
		@param $isFB 				-> TRUE = userId is FB	DEFAULT = false
    **/  
	function deleteUser($userId, $isFB = false){

		if($isFB){
			$this->user->load(array('user_id=?',$userId));
		}else{
			$this->user->load(array('user_facebook_id=?',$userId));
		}

		$this->user->erase();

	}

	


	function __destruct(){

	}

}
?>