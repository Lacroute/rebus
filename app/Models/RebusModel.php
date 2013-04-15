<?php
class RebusModel extends Prefab{

	//Mapper of rebus.rebus table
	private $rebus;

	function __construct() {
			$rebus = new DB\SQL\Mapper(F3::get('db'),'rebus');
	}

	/**
		GET single rebus by id
		@param $rebusId 		-> rebusId
		@return object
    **/
	function getSingleRebus($id){

		$rebus->find(array('rebus_id=?',$rebusId));

		if($rebus->dry()){
			return false;
		}else{
			return $rebus;
		}
	}

	/**
		SET rebus
    **/
	function setRebus(){

		$rebus->copyFrom('POST');
		$rebus->save();

	}

	/**
		GET single rebus by id
		@param $userId 		-> userId
		@return object | Bool
    **/
	function getRebusByAuthor($userId){


		$rebus->load(array('author=?', $userId));

		if($rebus->dry()){
			//no rebus match
			return false
		}else{
			return $rebus;
		}
		

	}

	/**
		GET single rebus by id
		@param $userId 			-> userId
		@param $typeOfSearch	-> 0 = all, 1 = only found, 2 only unfound, DEFAULT = 0
		@return object | Bool
    **/
	function getRebusByAuthor($userId, $typeOfSearch = 0){

		switch($typeOfSearch){

			case 0:
				$myArray = array('receiver=?', $userId);
			break;

			case 1:
				$myArray = array('receiver=? AND is_found=?', $userId, 1);
			break;

			case 2:
				$myArray = array('receiver=? AND is_found=?', $userId, 2);
			break;

			default:
				return false;
			break;



		}

		$rebus->load($myArray);

		if($rebus->dry()){
			return false;
		}else{
			return $rebus;
		}
		

	}

	function __destruct(){

	}

}
?>