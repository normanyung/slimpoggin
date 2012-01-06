<?php
$app->get('/', function() use ($app) {
	// I only have one real page. Poggin is all done in JS.
	require_once "_page.php";
});
?>