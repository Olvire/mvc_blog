<?php
require_once('config.php');
class DB {
	private static $instance = NULL;

	private function __construct() {}

	private function __clone() {}

	public static function connect() {
		if (!isset(self::$instance)) {
			self::$instance = pg_connect("
				host=$DATABASE['host'] 
				user=$DATABASE['user'] 
				password=$DATABASE['password'] 
				dbname=$DATABASE['dbname']
			");
		}
		return self::$instance;
	}
}