<div id="queryResult">
<?php
$globalResults = F3::get('results');

foreach ($globalResults as $keyword => $wordResult) {
	echo ('<section class="resultSelection"><h1>'.$keyword.'</h1><section class="container"><button class="actionRoulette monte">˄</button><div class="resultByWord">');
	foreach ($wordResult['img'] as $imgJsonResult) {
		$imgJsonResult = json_decode($imgJsonResult);
		foreach ($imgJsonResult->results as $object) {
			echo('<img class="item" src="'.$object->thumbnail.'">');
		};
	};
	foreach ($wordResult['vid'] as $vidJsonResult) {
		$vidJsonResult = json_decode($vidJsonResult);
		foreach ($vidJsonResult as $object) {
			echo('<iframe class="item" src="http://player.vimeo.com/video/'.$object->id.'?byline=0&badge=0&color=d01e2f&title=0&portrait=0&" width="250" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
		};
	}
	echo ('</div><button class="actionRoulette descend">˅</button></section></section>');
};
// echo "</div><p><h1>Flux brut récupéré</h1></p>";
// var_dump($globalResults);
?>
