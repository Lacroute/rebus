<?php
class UserModel extends Prefab{

	//Mapper of rebus.user table
	private $user;

	 function __construct() {
	 		$user = new DB\SQL\Mapper(F3::get('db'),'user');
     }

     /**
		GET single user by id
		@param $id 			-> facebook id, or id
		@param $isFB 		-> TRUE = $id is a FB id, DEFAULT = false
		@return object
    **/
	function getUserById($id, $isFB = false){

		if($isFB == false){
			return $user->find(array("user_id=?", $id));
		}else{
			return $user->find(array("user_facebook_id=?", $id));
		}
		

    }

     /**
		SET single user
		@post 				-> Post form
		@isFantom			-> TRUE = SET a waiting user, DEFAULT = false
		@return object
    **/    
    function getUserByFacebookId($post, $isFantom = false){
		
		
    }

    /**
		UPDATE single user
		@post 				-> Post form		
    **/    
    function updateUser($post){
		

    }

	


	function __destruct(){

	}

}
?>