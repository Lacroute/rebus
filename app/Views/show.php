<div>
<h1>La phrase</h1>


<?php echo $rebus->sentence; ?>

<h2>shared ?</h2>
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
</div>
