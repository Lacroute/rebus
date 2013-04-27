<h1><?php echo $SESSION['user_name'].' '.$SESSION['user_last_name'] ?></h1>
<?php var_dump($SESSION)?>
<?php foreach($rebusAuthor as $rebus): ?>
	<?php echo $rebus->rebus_sentence ?><br/>
<?php endforeach; ?>
<?php if($SESSION['user_facebook_id'] == "noFB"): ?>
<a href="">Lier mon compte avec Facebook</a>
<?php endif;?>
