<?php
require_once "Slim/Slim.php";
require_once "lib/Song.class.php";
require_once "lib/PogginError.class.php";

$app=new Slim();
require_once "routes.api.php";

$app->run();
?>