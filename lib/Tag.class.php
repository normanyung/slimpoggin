<?php
require_once 'Base.class.php';

/// class defining Tags
class Tag extends Base {
	public function validate($data=null) {
		$errors=array(); // error collector array

		// if $data is not passed, default to this object's data.
		if ($data==null) $data=$this->data;
		return true;
	}

	/// @return array of Song objects that have this tag.
	public function getSongs() {
		
	}
	
	/// @return string mongo collection name.
	protected function getCollectionName() {
		return 'tags';
	}
}
