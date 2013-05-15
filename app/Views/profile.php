<h1><?php echo  $user->user->user_name.' '.$user->user->user_last_name ?></h1>


<?php if($isfriend == 1): ?>
	<a href="">retirer de ses amis</a>
<?php elseif($isfriend == 2): ?>
<a href="user/invitation/add-<?php echo $user->user->user_id ?>">ajouter à ses amis</a>
<?php endif; ?>

<h1>Rébus de l'auteur</h1>
<?php foreach($rebusAuthor as $rebus): ?>
	<?php echo $rebus->rebus_sentence ?><br/>
<?php endforeach; ?>
<h1>Amis</h1>
<?php foreach($friends as $friend): ?>
	<a href="user/profile/<?php echo $friend->user_id ?>/<?php echo $friend->user_name ?>_<?php echo $friend->user_last_name ?>"><?php echo $friend->user_name.' '.$friend->user_last_name ?></a><br/>
<?php endforeach ?>

<br/>

<?php if($isfriend == 3):?>
<h1>Demande d'amitié en attente</h1>
<?php foreach($waiting_invit as $w): ?>
	<?php echo $w->user_name ?> <?php echo $w->user_last_name ?> - <a href="user/invitation/accept-<?php echo $w->sender_id ?>">Accepter</a> -- <a href="user/invitation/decline-<?php echo $w->sender_id ?>">décliner</a><br/>
<?php endforeach; ?>
<?php endif; ?>

<?php if($SESSION['user_facebook_id'] == "noFB"): ?>
<a href="">Lier mon compte avec Facebook</a>
<?php endif;?>
