<?php

namespace kepezz;

class Vimeo extends api{

	function __construct(){
		include 'vimeoAPI.php';
		$consKey = "aa14f452fdfeb91dd811b4768b3b560f65750174";
		$secret = "7403f4b8f1b93c4791bda7ef08e4693f563b6d47";
		$vimeo = new \phpVimeo($consKey,$secret);
		\F3::set('vimeoObject', $vimeo);
	}

	function search($keyword){
		$vimeo = \F3::get('vimeoObject');
		$result = $vimeo->call('vimeo.videos.search', array('query' => $keyword, 'per_page'=> 10));
		$result = $result->videos->video;
		return json_encode($result);
	}
}
?>