
	<div id="queryResult">
<?php
$globalResults = F3::get('results');

foreach ($globalResults as $keyword => $wordResult) {
	echo ('<section class="resultSelection"><h1>'.$keyword.'</h1><section class="container"><div class="resultByWord">');
	foreach ($wordResult['img'] as $imgJsonResult) {
		$imgJsonResult = json_decode($imgJsonResult);
		foreach ($imgJsonResult->results as $object) {
			echo('<img src="'.$object->thumbnail.'"><br />');
		};
	};
	foreach ($wordResult['vid'] as $vidJsonResult) {
		$vidJsonResult = json_decode($vidJsonResult);
		foreach ($vidJsonResult as $object) {
			echo('<iframe src="http://player.vimeo.com/video/'.$object->id.'?byline=0&badge=0&color=d01e2f&title=0&portrait=0&" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
		};
	}
	echo ('</div></section></section>');
};
// echo "</div><p><h1>Flux brut récupéré</h1></p>";
// var_dump($globalResults);
?>

