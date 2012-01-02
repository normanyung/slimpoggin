<?php
require_once 'Base.class.php';

class Song extends Base {
	public function validate($data=null) {
		$errors=array(); // error collector array
		
		// if $data is not passed, use this instance's data.
		if ($data===null) $data=$this->data;
		
		// required
		if (''==trim($data['title'])) $errors[]=PogginError::getMessage('SONG_REQUIRED_TITLE');
		if (''==trim($data['text']))  $errors[]=PogginError::getMessage('SONG_REQUIRED_TEXT');
		
		// length
		if (64<strlen($data['title']))   $errors[]=PogginError::getMessage('SONG_LENGTH_TITLE');
		if (64<strlen($data['author']))  $errors[]=PogginError::getMessage('SONG_LENGTH_AUTHOR');
		if (4096<strlen($data['text']))  $errors[]=PogginError::getMessage('SONG_LENGTH_TEXT');
		
		// invalid year input (not very extensive checking).
		if (!empty($data['year']) && !is_numeric($data['year'])) $errors[]=PogginError::getMessage('SONG_INVALID_YEAR');
		
		if (empty($errors)) return true;
		return $errors;
	}

	/// determines whether the input string is a chords line
	/// @param $line string to check
	/// @return boolean
	public function isChordLine($line) {
		// A-G, m(inor), maj, min, dim, aug, sus, #, b, 0-9
		$line=trim($line);
		if ($line=='' || preg_match('/[^abcdefgmnujs#i0-9 ]/i', $line)) return false;
		
		return true;
	}
	
	/// returns just the lyrics.
	public function getLyrics() {
		$text=$this->getText();
		$lines=explode("\n", $text);
		$lyrics='';
		foreach($lines as $l) {
			if (!$this->isChordLine($l)) $lyrics.=$l."\n";
		}
		return $lyrics;
	}
	
	/// @return string. mongo collection name.
	protected function getCollectionName() {
		return 'songs';
	}
	
	/// define default fields and values for Song objects.
	/// @return associative array.
	protected function getDefaults() {
		return array(
			'title'=>'', 
			'author'=>'', 
			'year'=>'', 
			'text'=>'',
		);	
	}
	
	/// @return sanitized array of $this->data;
	public function toApiObj() {
		return array(
			'_id'       => $this->getId(),
			'title'     => $this->getTitle(),
			'author'    => $this->getAuthor(),
			'year'      => $this->getYear(),
			'text'      => $this->getText(),
		);
	}
}
?>