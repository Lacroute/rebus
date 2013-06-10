<h1>Login</h1>
<?php echo $error ?>
<form action="user/login" method='POST'>
	<label>Email :</label> <input type="email" name="user_mail"/>
	<label>Mot de passe :</label> <input type="password" name="user_passwd"/>
	<input type="submit" value="se connecter"/>
</form>
<a href="">Connextion avec Facebook</a>