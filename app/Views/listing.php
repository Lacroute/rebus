<div>

<?php foreach($users as $u):?>
	<div>
		<a href="user/profile/<?php echo $u->user_id ?>"><?php echo $u->user_name ?> <?php echo $u->user_last_name ?></a>
	</div>


<?php endforeach;?>

</div>