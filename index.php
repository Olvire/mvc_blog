<?php

session_start();

require_once('connection.php');
if (isset($_GET['controller']) && isset($_GET['action'])) {
	$controller = $_GET['controller'];
	$action = $_GET['action'];
	if (isset($_GET['param'])) {
		$param = $_GET['param'];
	}
} else {
	$controller = 'posts';
	$action = 'home';
	$param = NULL;
}

require_once('views/layout.php');

DB::close();

?>