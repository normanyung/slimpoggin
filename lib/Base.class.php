<?php
require_once 'Db.class.php';

/// base class that is modeled by the DB collections
abstract class Base {

	/// representation of data in DB.
	protected $data;

	/// original representation of data when fetched from DB.
	protected $original;

	/// the constructor
	///
	public function __construct($mongoId=null) {
		if ($mongoId===null) { // new unsaved object
			$this->data=array();
			$this->original=null;
		} elseif (is_array($mongoId)) {
			$this->data=$mongoId;
		} else {
			// wrap _id as a MongoId obj if scalar
			if(is_scalar($mongoId)) $mongoId=new MongoId($mongoId);
			$row=Db::$songs->findOne(array('_id'=>$mongoId));
			if ($row) $this->data=$row;
			else throw new Exception("could not find ".get_class()." with id: ".$mongoId);
		}
	}

	/// @return true or array of error code/messages.
	abstract public function validate($data=null);

	/// get the collection name for this object.
	abstract protected function getCollectionName();

	/// save to the db if it passses validation.
	public function commit() {
		$validate=$this->validate();
		if (true!==$validate) { // if errors returned in validate() spit em out.
			return $validate;
		}
		$collectionName=$this->getCollectionName();

		Db::${$collectionName}->save($this->data);
		return true;
	}
}
?>
