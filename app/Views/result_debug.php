<?php
$res_dribbble = json_decode(F3::get('res_dribbble'));
$res_pinterest = json_decode(F3::get('res_pinterest'));
echo "<h1>Dribble</h1>";
foreach ($res_dribbble->results as $object) {
	echo('<img src="'.$object->thumbnail.'"><br />');
}
echo "<h1>Pinterest</h1>";
foreach ($res_pinterest->results as $object) {
	echo('<img src="'.$object->thumbnail.'"><br />');
}
echo "<h1>Flux brut récupéré</h1>";
var_dump($res_dribbble);
var_dump($res_pinterest);
?>