<header id="menu">
<nav>
 	<a id="home" href="home"><img src="public/images/logo.png" alt="Accueil"></a>
	<ul>
		<li><a href="tutorial"><img src="public/images/info.png" alt="Tutorial"></a></li>
		<li><a href="user/listing"><img src="public/images/compte.png" alt="Mon compte"></a></li>
		<li><a href="pool/create"><img src="public/images/kepezz.png" alt="Kepezz"></a></li>

	<?php if(!$SESSION['user_id']):?>
		<li><a href="user/login">login</a></li>
		<li><a href="user/signin">signin</a></li>

	<?php else:?>

		<li><a href="user/profile">Profile</a></li>
		<li><a href="user/logout">logout</a></li>

	<?php endif?>
	
	</ul>

</nav>
</header>