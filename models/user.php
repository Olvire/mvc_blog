<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/connection.php");

class User {
	public function login($username,$password) {
		$db = DB::connect();
		$q = pg_query_params("SELECT * FROM users WHERE username = $1",array($username));
		$user = pg_fetch_object($q);
		return $user;
	}
}