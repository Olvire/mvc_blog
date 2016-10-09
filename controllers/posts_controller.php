<?php
class PostsController {
	public function home() {
		require_once('models/post.php');

		$posts = Post::get_page(0);

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

	public function page($page_number) {
		require_once('models/post.php');
		$posts = Post::get_page($page_number);
		if ($posts) { 
			require_once('views/posts/home.php');
		} else {
			$this::error();
		}
	}

	public function new() {
		if (isset($_SESSION['user'])) {
			if (!empty($_POST)) {
				if (empty($_POST['title']) || empty($_POST['body'])) {
					$error = "All fields are required";
				} else {
					require_once($_SERVER['DOCUMENT_ROOT'] . '/models/post.php');
					$post = Post::new($_POST['title'],$_POST['body']);
					echo "<script>window.location.href = '/posts/view/$post->id';</script>";
				}
			}
			require_once('views/posts/new_post.php');
		} else {
			$this::error();
		}
	}

	public function edit($post_id) {
		if (isset($_SESSION['user'])) {
			require_once($_SERVER['DOCUMENT_ROOT'] . '/models/post.php');
			if (!empty($_POST)) {
				if (empty($_POST['title']) || empty($_POST['body'])) {
					$error = "All fields are required";
				} else {
					;
					$post = Post::edit($post_id,$_POST['title'],$_POST['body']);
					echo "<script>window.location.href = '/posts/view/$post_id';</script>";
				}
			}
			$post = Post::get($post_id);
			require_once('views/posts/edit.php');
		} else {
			$this::error();
		}
	}

	public function delete($post_id) {
		if (isset($_SESSION['user'])) {
			require_once($_SERVER['DOCUMENT_ROOT'] . '/models/post.php');
			Post::delete($post_id);
			echo "<script>window.location.href = '/';</script>";
		}
	}

	public function error() {
		require_once('views/posts/error.php');
	}
}