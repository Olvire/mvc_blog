<?php

require_once('connection.php');
require_once('utils.php');

class Post {
	public static function all() {
		$posts = [];
		$db = DB::connect();
		$q = pg_query('SELECT posts.id,posts.title,posts.body,posts.timestamp,users.username as author FROM posts INNER JOIN users on posts.user_id = users.id ORDER BY posts.id DESC;');
		while ($post = pg_fetch_object($q)) {
			$post->timestamp = pretty_timestamp($post->timestamp);
			$post->tags = Post::get_tags($db,$post->id);
			$posts[] = $post;
		}
		return $posts;
	}

	public static function get($post_id) {
		$db = DB::connect();
		$q = pg_query_params($db,"SELECT posts.id,posts.title,posts.body,posts.timestamp,users.username as author FROM posts INNER JOIN users on posts.user_id = users.id WHERE posts.id = $1",array($post_id));
		$post = pg_fetch_object($q);
		$post->timestamp = pretty_timestamp($post->timestamp);
		$post->tags = Post::get_tags($db,$post->id);
		return $post;
	}

	public static function get_tags($db, $post_id) {
		$q = pg_query_params($db,"SELECT tagged_posts.tag from tagged_posts where tagged_posts.post_id = $1",array($post_id));
		$tags = [];
		while ($tag = pg_fetch_object($q)) {
			$tags[] = $tag->tag;
		}
		return $tags;
	}
}