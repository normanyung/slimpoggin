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

$app->get('/info', function() {
	phpinfo();
});

$app->get('/test', function() use ($app) {
	$app->response()->header('Content-type', 'text/plain');
	$data='{"_id":"4ef8265140fac3d702000003","title":"How Great is Our God","author":"Chris Tomlins","year":"2005","text":"    C                     Am7\nThe splendor of the King, clothed in majesty,\n                    F2\nLet all the earth rejoice, all the earth rejoice.\n   C                           Am7\nHe wraps Himself in light, and darkness tries to hide,\n                    F2\nAnd trembles at his voice, trembles at his voice.\n\n    C                          G\nHow great is our God, sing with me,\n    Am7                        G\nHow great is our God, all will see,\n    Fmaj7      G            C  Csus C\nHow great, how great is our God.\n\nAge to age He stands, and time is in His hands,\nBeginning and the end, beginning and the end.\nThe Godhead, three in one: Father, Spirit, Son,\nThe Lion and the Lamb, the Lion and the Lamb.\n\nC                   G\nName above all names,\nAm7                 G\nWorthy of all praise,\n   Fmaj7\nMy heart will sing\n    G            C Csus C\nHow great is our God.\n"}';
	$http=http_post_data("http://www.poggin.org/api/song/4ef8265140fac3d702000003", $data);
	$response=http_parse_message($http);
	print_r($response);
});

$app->run();
?>