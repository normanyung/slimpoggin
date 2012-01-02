<?php

class PogginError {
	protected static $error_codes=array(
		// Song related errors: 1000
		array(1001, 'SONG_NOT_FOUND',                        'Song not found.'),
		array(1002, 'SONG_REQUIRED_TITLE',                   'Song must have a title.'),
		array(1003, 'SONG_REQUIRED_TEXT',                    'Song must have text.'),
		array(1004, 'SONG_LENGTH_TITLE',                     'Song title cannot be longer than 64 characters.'),
		array(1005, 'SONG_LENGTH_AUTHOR',                    'Song title cannot be longer than 64 characters.'),
		array(1006, 'SONG_LENGTH_TEXT',                      'Song text is too long.'),
		array(1007, 'SONG_INVALID_YEAR',                     'Song year is invalid.'),
		
		// Shared errors: 9000
		array(9001, 'ID_MISMATCH',                           '\'_id\' mismatch in opeation.'),
	
	);
	
	public static function getMessage($code) {
		$index=is_numeric($code)?0:1;
		$error_codes=self::$error_codes;
		foreach ($error_codes as $i=>$error) {
			if ($error[$index]==$code) return $error_codes[$i];
		}
		
		return array(
			-1,
			'UNKNOWN_ERROR',
			'Unknown error.'
		);
	}
}
?>