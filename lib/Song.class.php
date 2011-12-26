<?php
require_once 'Base.class.php';

class Song extends Base {
	
	public function validate($data=null) {
		$errors=array(); // error collector array

		// if $data is not passed, default to this object's data.
		if ($data==null) $data=$this->data;
		return true;
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
}
