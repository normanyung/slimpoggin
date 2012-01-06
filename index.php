<?php
require_once "Slim/Slim.php";
require_once "lib/Song.class.php";
require_once "lib/PogginError.class.php";

$app=new Slim();

function pogginError($code, $status=501) {
	global $app;
	if (is_array($code)) {
		$response=$code;
	} else {
		$response=PogginError::getMessage($code);
	}
	$app->response()->header('Content-type', 'application/json');
	$app->halt($status, json_encode($response));
}

function pogginSuccess($data) {
	global $app;
	$app->response()->header('Content-type', 'application/json');
	print json_encode($data);
}

require_once "routes.api.php";
$app->run();
?>