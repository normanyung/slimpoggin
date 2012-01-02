<?php

$app->get('/api/song/:mongoid', function($mongoid) use ($app) {
	$song=Song::loadById($mongoid);
	if (!$song) pogginError('SONG_NOT_FOUND', 404);
	print pogginSuccess($song->toApiObj());
});

// update song by passing new $data in json. 
$app->post('/api/song/:mongoid', function($mongoid) use ($app) {
	$song=Song::loadById($mongoid);
	if (!$song) pogginError('SONG_NOT_FOUND', 404);
	$input=file_get_contents('php://input');
	$data=json_decode($input, true);
	$update=$song->update($data, true);
	if (true===$update) {
		$app->response()->status(204);
	} else {
		// $update contains array of errors
		pogginError($update, 501);
	}
});

?>