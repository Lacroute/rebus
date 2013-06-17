<div id="table">
<header>
	<p>Debug info</p>
	<h1>La phrase</h1>
	<p><em>"<?php echo($rebus['sentence']);?>"</em></p>

	<?php if($rebus->author == $rebus->receiver):?>
	<p>ce rébus est à vous</p>
	<?php else: ?>
		<p>Ce rébus a été envoyé à l'id : <?php echo $rebus->receiver ;?></p>
		<?php if($rebus->is_found ==0):?>
			il ne l'a pas trouvé
		<?php else:?>
			il l'a trouvé
		<?php endif;?>
	<?php endif;?>
</header> 
<?php
	foreach ($rebus['items'] as $index => $itemDiv) {
		echo html_entity_decode($itemDiv);
	}

?>
</div>
