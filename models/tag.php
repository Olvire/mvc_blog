<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/connection.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/post.php');

class Tag {
	public static function get($post_id) {
		$db = DB::connect();
		$tags = [];
		$q = pg_query_params($db,"SELECT tag FROM tagged_posts WHERE post_id = $1",array($post_id));
		while ($tag = pg_fetch_object(($q))) {
			$tags[] = $tag->tag;
		}
		return $tags;
	}

	public static function get_posts($tag_name) {
		$db = DB::connect();
		$posts = [];
		$tag_name = str_replace('+','',$tag_name);
		$q = pg_query_params("SELECT posts.id, posts.title, posts.body, users.username as author, posts.timestamp, tagged_posts.tag from tagged_posts inner join posts on posts.id = tagged_posts.post_id inner join users on users.id = posts.user_id where tagged_posts.tag = $1 ORDER BY posts.timestamp DESC",array($tag_name));
		while ($post = pg_fetch_object($q)) {
			$post->timestamp = pretty_timestamp($post->timestamp);
			$post->tags = Post::get_tags($db,$post->id);
			$posts[] = $post;
		}

		return $posts;
	}

	public static function get_popular_tags() {
		$db = DB::connect();
		$q = pg_query("SELECT tag, COUNT(*) AS count FROM tagged_posts GROUP BY tag ORDER BY count DESC LIMIT 10");
		$tags = [];
		while ($tag = pg_fetch_object($q)) {
			$tags[] = array(
				"tag" => $tag->tag,
				"count" => $tag->count
			);
		}
		return $tags;
	}

	public static function add_tags($post_id,$tags) {
		$db = DB::connect();
		foreach ($tags as $tag) {
			$q = pg_query_params($db,"INSERT INTO tagged_posts VALUES ($1,$2)",array($post_id,$tag));
		}
	}

	public static function update_tags($post_id,$tags) {
		$db = DB::connect();
		$q = pg_query_params($db,"DELETE FROM tagged_posts WHERE post_id = $1",array($post_id));
		Tag::add_tags($post_id,$tags);
	}

	public static function delete_tags($post_id) {
		$db = DB::connect();
		$q = pg_query_params($db,"DELETE FROM tagged_posts WHERE post_id = $1",array($post_id));
	}
}