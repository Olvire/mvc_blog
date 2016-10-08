<?php

class DB {
	private static $instance = NULL;

	private function __construct() {}

	private function __clone() {}

	public static function connect() {
		require_once('config.php');
		$host = $DATABASE['host'];
		$dbname = $DATABASE['dbname'];
		$user = $DATABASE['user'];
		$password = $DATABASE['password'];
		if (!isset(self::$instance)) {
			self::$instance = pg_connect("host=$host dbname=$dbname user=$user password=$password");
		}
		return self::$instance;
	}

	public static function close() {
		if ($db) {
			echo "CLOSING DB CONNECTION";
			pg_close($db);
		}
	}
}