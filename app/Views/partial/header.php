<header>
<nav>

	<ul>
		<li><a href="home">Home</a></li>
		<li><a href="tutorial">Tutorial</a></li>
		<li><a href="pool/create">Kepezz</a></li>

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