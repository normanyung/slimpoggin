<?php
require_once "Slim/Slim.php";
require_once "lib/Song.class.php";
require_once "lib/PogginError.class.php";

$app=new Slim();
require_once "inc/routes.api.php";
require_once "inc/routes.errors.php";
require_once "inc/routes.main.php";
$app->run();
?>