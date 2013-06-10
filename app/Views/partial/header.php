<header id="menu">
<nav>
 	<a id="home" href="/kep/home"><img src="/kep/public/images/logo.png" alt="Accueil"></a>
	<ul>
	<?php if(!$SESSION['user_id']):?>
		<li><a class="boutonAction" id="signUp" href="user/signin">Inscription</a></li>
		<li class="court"><a href="user/login"><img src="/kep/public/images/connexion.png" alt="Connexion"></a></li>
		<li><a href="tutorial"><img src="/kep/public/images/info.png" alt="Tutorial"></a></li>

	<?php else:?>

		<li><a href="/kep/user/logout"><img src="/kep/public/images/deconnexion.png" alt="Connexion"></a></li>
		<li><a href="tutorial"><img src="/kep/public/images/info.png" alt="Tutorial"></a></li>
		<li><a href="/kep/user/listing"><img src="/kep/public/images/compte.png" alt="Mon compte"></a></li>
		<li><a href="/kep/pool/create"><img src="/kep/public/images/kepezz.png" alt="Kepezz"></a></li>

	<?php endif?>

	</ul>

</nav>
</header>
<div id="wrapper">