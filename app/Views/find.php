<div>
<h1>La phrase</h1>
<?php //var_dump($empty);?>
<h1>La phrase</h1>
<form id="form">
<?php 

if($isFound == 1){
	//is is found
	echo implode(" ", $sentence);
}else{
	//if is not found
	foreach($sentence as $word){
		$temp = false;
		foreach($empty as $a){				
			if($word== $a->word){
				$temp = true;				
				break;
			}
		}		
		if(!$temp){
			echo '<input type="text" class="inputRoulette boutonAction check"  data-value="'.$word.'"/> ';
		}else{
			echo '<span>'.$word.' </span>';
		}
	}
}
?>
<input type="submit" style="width:0px;height:0px;border:none;padding:0px;" value="ok"/>
</form>
<a href="" id="valid">Check</a>
</div>

<script>
	$("#valid").on('click', function(){
		check();
		return false;

	});	

	$('#form').on('submit', function(){
		check();
		return false;
	})


	function check(){
		var count = 0;
		$('.check').each(function(index, obj){
			console.log($(obj).val().toUpperCase(), $(obj).attr('data-value').toUpperCase());
			if($.trim($(obj).val().toUpperCase()) != $.trim($(obj).attr('data-value').toUpperCase())){
				$(obj).css('background-color', 'red');
			}else{
				$(obj).css('background-color', 'green');
				count++;
			}
		});
		if(count == $('.check').length){
			$('.check').each(function(index, obj){
				$("<span />", { text: this.value, "class":"view" }).insertAfter(this);
  				$(this).hide();
			});
			$.ajax({
			  url: "pool/validate",
			  type: 'POST',
			   data: { idRebus: "<?php echo $idRebus; ?>" }
			}).done(function(data) {
			//console.log(data);
			});
			//console.log('rébus trouvé, TODO : requête en ajax pour valider la chose');
			$('#valid').remove();
		}
	}
</script>