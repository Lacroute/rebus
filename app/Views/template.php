<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $pageTitle ?> - Kép</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<base href="<?php echo $REBUS_FOLDER; ?>" />
		<title>Intranet</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>

	<body>
		<?php include('partial/header.php') ?>

		<?php include($page.".php"); ?>

		<?php include('partial/footer.php') ?>


	</body>
</html>