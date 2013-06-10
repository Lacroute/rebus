<div id="queryResult">
<?php
$globalResults = F3::get('results');
echo($globalResults);

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
}; ?>

<!--
<div id="queryResult">
<section class="resultSelection"><input class="inputRoulette boutonAction" type="text" value="Trop" readonly>
	<section class="container">
		<button class="actionRoulette monte boutonAction">˄</button>
		<div class="resultByWord">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/230290/screenshots/1090736/birds_teaser.png">
			<img class="item selected"src="//dribbble.s3.amazonaws.com/users/33376/screenshots/1089916/tomato_teaser.png">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/121508/screenshots/1089249/styled_raigino_teaser.jpg">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/5990/screenshots/1088939/l_teaser.png">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/28943/screenshots/1088629/bounce-plugin_teaser.png">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/110764/screenshots/1088517/drewrender_teaser.jpg">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/1935/screenshots/1088351/ns_dribbble_teaser.jpg">
		</div>
		<button class="actionRoulette descend">˅</button>
		</section>
	</section>
	<section class="resultSelection">
			<h1>cool</h1>
			
			<section class="container">
				<button class="actionRoulette monte">˄</button>
				<div class="resultByWord">
					<img class="item"src="//dribbble.s3.amazonaws.com/users/230290/screenshots/1090736/birds_teaser.png">
			<img class="item selected"src="//dribbble.s3.amazonaws.com/users/33376/screenshots/1089916/tomato_teaser.png">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/121508/screenshots/1089249/styled_raigino_teaser.jpg">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/5990/screenshots/1088939/l_teaser.png">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/28943/screenshots/1088629/bounce-plugin_teaser.png">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/110764/screenshots/1088517/drewrender_teaser.jpg">
			<img class="item"src="//dribbble.s3.amazonaws.com/users/1935/screenshots/1088351/ns_dribbble_teaser.jpg">
			</div>
		<button class="actionRoulette descend">˅</button>
	</section>
</section>
</div>
-->
<div id="saleFooter" class="separator"></div>
<div id="wrapperFooter">
	<button id="kepezzSelected"class="boutonAction" id="kepezz">Kepezz</button>
</div>
<script type="text/javascript" src="/kep/public/js/roulette.js"></script>