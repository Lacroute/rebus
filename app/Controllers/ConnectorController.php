<?php
class ConnectorController{

	function home(){
    	print_r("C'est parti !");
	}

	function doc(){
		echo Views::instance()->render('userref.html');
	}
}
?>