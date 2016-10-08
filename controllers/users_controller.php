<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/user.php");

class UsersController {
	public function login() {
		if (!empty($_POST)) {
			$user = User::login($_POST['username'],$_POST['password']);
			if ($user) {
				if ($user->password == $_POST['password']) {
					$_SESSION['username'] = $_POST['username'];
					echo "<script>window.location.href='/';</script>";
				} else {
					$message = "Incorrect password";
				}
			} else {
				$message = "Incorrect username";
			}
		}
		require_once($_SERVER['DOCUMENT_ROOT'] . "/views/users/login.php");
	}

	public function logout() {
		session_destroy();
		echo "<script>window.location.href='/';</script>";
	}
}