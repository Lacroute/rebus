<section id="home_images"></section>
<section id="home_video"><br/><br/>
	<img src="/kep/public/images/logo_big.png" style="margin-left:170px;"><br/><br/><br/>
	<?php echo $error ?>
	<form action="user/login" method='POST' class="form_login">
		<label>Email :</label> <input class="inputStyle" type="email" name="user_mail"/><br/>
		<label>Mot de passe :</label> <input class="inputStyle" type="password" name="user_passwd"/><br/>
		<input type="submit" class="boutonAction" value="se connecter"/>
	</form>
	
</section>