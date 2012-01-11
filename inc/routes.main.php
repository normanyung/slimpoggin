<?php
$app->get('/', function() use ($app) {
	// I only have one real page. Poggin is all done in JS.
	require_once "inc/page.header.php";
	require_once "inc/page.main.php";
	require_once "inc/page.footer.php";
});


$app->get('/child', function() {
	require_once "inc/page.header.php";
	require_once "inc/page.main.php";
	print "child";
	require_once "inc/page.footer.php";
});
?>