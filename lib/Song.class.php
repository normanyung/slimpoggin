<?php
require_once 'Base.class.php';

class Song extends Base {
	public function validate($data=null) {
		$errors=array(); // error collector array

		// if $data is not passed, default to this object's data.
		if ($data==null) $data=$this->data;
		return true;
	}

	protected function getCollectionName() {
		return 'songs';
	}
}
