<?php
class PostsController {
	public function home() {
		require_once('models/post.php');

		$posts = Post::all();

		require_once('views/posts/home.php');
	}

	public function view($post_id) {
		require_once('models/post.php');
		$post = Post::get($post_id);
		if ($post) {
			require_once('views/posts/post.php');
		} else {
			$this::error();
		}
	}

	public function edit($post_id) {
		require_once('models/post.php');
		$post = Post::get($post_id);
		require_once('views/posts/post.php');
		echo "EDIT";
	}

	public function error() {
		require_once('views/posts/error.php');
	}
}