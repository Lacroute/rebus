<div>
<h1>La phrase</h1>
<?php //var_dump($empty);?>
<h1>La phrase</h1>
<?php 
foreach($sentence as $word){
	$temp = false;
	foreach($empty as $a){
			
		if(stripos($word, $a->word) !== false){
			$temp = true;

			break;
		}
	}
	var_dump($temp);
	if($temp){
		//echo '<input type="text" value="'.$word.'"/>';
	}else{
		//echo '<span>'.$word.' </span>';
	}

}

?>

</div>