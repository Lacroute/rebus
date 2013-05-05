<h1><?php echo $SESSION['user_name'].' '.$SESSION['user_last_name'] ?></h1>
<?php var_dump($SESSION)?>
<h1>Rébus de l'auteur</h1>
<?php foreach($rebusAuthor as $rebus): ?>
	<?php echo $rebus->rebus_sentence ?><br/>
<?php endforeach; ?>
<h1>Amis</h1>
<?php foreach($friends as $friend): ?>
	<?php echo $friend->user_name.' '.$friend->user_last_name ?><br/>
<?php endforeach ?>

<br/>

<?php if($SESSION['user_facebook_id'] == "noFB"): ?>
<a href="">Lier mon compte avec Facebook</a>
<?php endif;?>
