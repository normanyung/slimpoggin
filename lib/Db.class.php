<?php
/// Database "namespace" class

class Db {
	/// the db.
	public static $db;

	/// songs collection.
	public static $songs;

	/// users collection.
	public static $users;

	public static function init() {
		$mongo=new Mongo();
		self::$db=$db=$mongo->poggin;
		self::$songs=$db->songs;
		self::$users=$db->users;
	}
}
Db::init();
?>
