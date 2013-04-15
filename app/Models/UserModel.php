<?php
class UserModel extends Prefab{

	//Mapper of rebus.user table
	private $user;

	 function __construct() {
	 		$user = new DB\SQL\Mapper(F3::get('db'),'user');
     }

     /**
		GET single user by id
		@param $userId 			-> facebook id, or id
		@param $isFB 		-> TRUE = $id is a FB id, DEFAULT = false
		@return object
    **/
	function getUser($userId, $isFB = false){

		if($isFB){
			return $user->find(array("user_facebook_id=?", $userId));
		}else{
			
			return $user->find(array("user_id=?", $userId));
		}
		

    }

     /**
		SET single user
		@param $isFantom			-> TRUE = SET a waiting user, DEFAULT = false (useless if form = db)
    **/    
    function setUser($isFantom = false){
		
		//$user->copyFrom('POST'); if post = db
		//$user->insert();

    	$user->user_facebook_id = F3::get('POST.user_facebook_id');

    	if($isFantom == false){
    		$user->user_status = 1;
    		$user->user_name = F3::get('POST.user_name');
    		$user->user_last_name = F3::get('POST.user_last_name');
    	}

    	$user->save();
		
    }

    /**
		UPDATE single user
		@param $userId 				-> userId	
		@param $isFB 				-> TRUE = userId is FB	DEFAULT = false
		@return Bool 				-> TRUE = updated, FALSE = no user to update
    **/    
    function updateUser($userId, $isFB = false){
		
		if($isFB){
			$user->find(array('user_facebook_id=?',$userId));
		}else{
			$user->find(array('user_id=?',$userId));
		}
		

		if($user->dry()){

			//no user to update
			return false;

		}else{

			$user->copyFrom('POST');
			$user->update();

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
			$user->find(array('user_id=?',$userId));
		}else{
			$user->find(array('user_facebook_id=?',$userId));
		}

		$user->erase();

	}

	


	function __destruct(){

	}

}
?>