<h1>Edit profil</h1>

<form>
	<label>Name</label><input type="text" name="user_name" value="<?php echo $user->user_name ?>"/><br/>
	<label>Last name</label><input type="text" name="user_last_name" value="<?php echo $user->user_last_name ?>"/><br/>
	<label>Email</label><input type="email" name="user_mail" value="<?php echo $user->user_mail ?>"/><br/>

	<input type="submit" value="modifier" name="action"/>
</form>
<h1>Change password</h1>
<form>
	<label>Your password</label><input type="password" name="passwd1"/><br/>
	<label>Your new password</label><input type="password" name="passwd2"/><br/>
	<label>Retype your new password</label><input type="password" name="passwd3"/><br/>
	<input type="submit" value="changer" name="action"/>
</form>