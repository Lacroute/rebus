<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $pageTitle ?> - Kép</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<base href="<?php echo $BASE_URL; ?>" />
		<title>Intranet</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Carme' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="/kep/public/css/reset.css">
		<link rel="stylesheet" type="text/css" href="/kep/public/css/style.css">
		<script type="text/javascript" src="/kep/public/js/jQuery.js"></script>
		<script type="text/javascript" src="/kep/public/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/kep/public/js/jquery.ui.touch-punch.min.js"></script>
	</head>

	<body>
		<?php include('partial/header.php') ?>

		<?php include($page.".php"); ?>

		<?php include('partial/footer.php') ?>


	</body>
</html>