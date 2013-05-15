<form action="user/signin" method='post'>
<?php echo $error ?>
	<label>Nom : </label> <input type="text" name="user_last_name" pattern="[\-A-zéèêàáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ0-9]{1,50}" required/><br/>
	<label>Prénom : </label> <input type="text" name="user_name" pattern="[\-A-zéèêàáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ0-9]{1,50}" required/><br/>
	<label>Email</label> <input type="email" name="user_mail" required/><br/>
	<label>Mot de passe</label> <input type="password" name="user_passwd" required/><br/>
	<label>Retaper le mot de passe</label> <input type="password" name="user_passwd2" required/><br/>
	<input type="submit" value="Envoyer"/>

</form>