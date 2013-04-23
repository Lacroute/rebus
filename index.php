<?php
date_default_timezone_set ('Europe/Paris');
$f3=require('app/Helpers/Library/base.php');

$f3->config('config/globals.ini');
$f3->config('config/routes.ini');

$f3->run();
