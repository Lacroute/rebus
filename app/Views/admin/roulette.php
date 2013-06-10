<div id="queryResult">
<?php
$globalResults = F3::get('results');

foreach ($globalResults as $keyword => $wordResult) {
	echo ('<section class="resultSelection"><input class="inputRoulette boutonAction" type="text" value="'.$keyword.'" readonly><section class="container"><button class="actionRoulette monte boutonAction">˄</button><div class="resultByWord">');
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
	echo ('</div><button class="actionRoulette descend boutonAction">˅</button></section></section>');
}; 
echo '</div>'?>
<div id="saleFooter" class="separator"></div>
<div id="wrapperFooter">
	<button id="kepezzSelected"class="boutonAction" id="kepezzSelected">Valider</button>
</div>
<script type="text/javascript" src="/kep/public/js/roulette.js"></script>