<?php
class ConnectorController{

	function beforeRoute(){
		echo F3::get('VERB');
	}

	function home(){
    	echo Views::instance()->render('home.php');
	}

	function doc(){
		echo Views::instance()->render('userref.html');
	}

<<<<<<< HEAD
	function search(){
		echo 'coucou';exit();
		switch (F3::get('VERB')) {
			case 'GET':
				break;
			case 'POST':
				$keyword = F3::get('POST.keyword');
				$dribble = new kepezz\Dribbble();
				$pinterest = new kepezz\Pinterest();
				F3::set('res_dribbble', $dribble->search($keyword));
				F3::set('res_pinterest', $pinterest->search($keyword));
				echo Views::instance()->render('result_debug.php');
				break;
		}
	}

	function coucou(){
		echo 'coucou';
	}
=======
>>>>>>> dd1fd99d4e12b4e1a8df1d05922d339e051bffdd
}
