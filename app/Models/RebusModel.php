<?php
class RebusModel extends Prefab{

	function __construct() {
		$this->rebus = new DB\SQL\Mapper(F3::get('db'),'rebus');
	}

	/**
		ADD new rebus
		@param $data : array
		@return $rebusId : Id in the database
	**/
	function addRebus($data){

		$this->rebus->sentence = $data['sentence'];
		$this->rebus->author = F3::get('SESSION.user_id');
		$this->rebus->receiver = $data['receiver'];
		$this->rebus->save();

		// On récupére l'ID du rebus inséré précedemment
		$rebusId=$this->rebus->_id; 

		return $rebusId;
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
			return false;
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
	function getRebusByReceiver($userId, $typeOfSearch = 0){

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

	function getRebusByIdAndReceiver($idRebus, $idReceiver){

		$this->rebus->load(array('receiver=? AND rebus_id=? AND is_found=0', $idReceiver, $idRebus));
		if($this->rebus->dry()){
			return false;
		}else{
			return $this->rebus;
		}

	}

	function getEmptyWords(){
		$empty = new DB\SQL\Mapper(F3::get('db'),'empty_words');
		return $empty->find();
	}

	function __destruct(){

	}

}
?>