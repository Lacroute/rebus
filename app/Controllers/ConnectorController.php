<?php
class ConnectorController{

	function home(){
    	echo Views::instance()->render('home.php');
	}

	function doc(){
		echo Views::instance()->render('userref.html');
	}

}
?>