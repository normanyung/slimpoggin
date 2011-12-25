<?php
require_once "Slim/Slim.php";
require_once "lib/Song.class.php";

$app=new Slim();
$app->get('/', function() use ($app) {
	$song=new Song('4ee2464040fac3670c000000');

	$song->commit();
	print "yay";
});

$app->run();
?>
