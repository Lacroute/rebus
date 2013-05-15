
	<div id="queryResult">
<?php
$globalResults = F3::get('results');
foreach ($globalResults as $keyword => $wordResult) {
	echo ('<section class="resultSelection"><h1>'.$keyword.'</h1><div>');
	foreach ($wordResult as $jsonResult) {
		$jsonResult = json_decode($jsonResult);
		foreach ($jsonResult->results as $object) {
			echo('<img src="'.$object->thumbnail.'"><br />');
		};
	};
	echo ('</div></section>');
};
echo "</div><p><h1>Flux brut récupéré</h1></p>";
var_dump($globalResults);
?>

