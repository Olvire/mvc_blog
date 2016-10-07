<?php

require_once('connection.php');

class Post {
	public $id;
	public $user;
	public $title;
	public $body;
	public $timestamp;

	public function __construct($id,$title,$body,$username,$timestamp) {
		$this->id        = $id;
		$this->title     = $title;
		$this->body      = $body;
		$this->user      = $username;
		$this->timestamp = $timestamp;
	}

	public static function all() {
		$posts = [];
		$db = DB::connect();
		$q = pg_query('SELECT posts.id,posts.title,posts.body,posts.timestamp,users.username FROM posts INNER JOIN users on posts.user_id = users.id;');
		while ($post = pg_fetch_object($q)) {
			$posts[] = $post;
		}
		return $posts;
	}

	public static function get($post_id) {
		$db = DB::connect();
		$q = pg_query_params($db,"SELECT * FROM posts WHERE id = $1",array($post_id));
		$post = pg_fetch_object($q);
		return $post;
	}
}