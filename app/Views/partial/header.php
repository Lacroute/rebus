<header id="menu">
<nav>
 	<a id="home" href="/kep/home"><img src="/kep/public/images/logo.png" alt="Accueil"></a>
	<ul>
	<?php if(!$SESSION['user_id']):?>
		<li ><a class="boutonAction" id="login" href="user/login">Connexion</a></li>
		<li class="court"><a class="boutonAction" id="signUp" href="user/signin">Inscription</a></li>
		<li><a href="tutorial"><img src="/kep/public/images/info.png" alt="Tutorial"></a></li>

	<?php else:?>

		<li><a class="boutonAction" id="logout" href="/kep/user/logout">Déconnexion</a></li>
		<li><a href="tutorial"><img src="/kep/public/images/info.png" alt="Tutorial"></a></li>
		<li><a href="/kep/user/listing"><img src="/kep/public/images/compte.png" alt="Mon compte"></a></li>
		<li><a href="/kep/pool/create"><img src="/kep/public/images/kepezz.png" alt="Kepezz"></a></li>

	<?php endif?>

	</ul>

</nav>
</header>
<div id="wrapper">