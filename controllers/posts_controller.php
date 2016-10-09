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
					$error = "Title and body fields are required";
				} else {
					require_once($_SERVER['DOCUMENT_ROOT'] . '/models/post.php');
					require_once($_SERVER['DOCUMENT_ROOT'] . '/models/tag.php');
					$tags = explode(',',$_POST['tags']);
					foreach ($tags as $tag) {
						$tag = trim($tag);
					}
					$post = Post::new($_POST['title'],$_POST['body']);
					$tags = Tag::add_tags($post->id,$tags);
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
			require_once($_SERVER['DOCUMENT_ROOT'] . '/models/tag.php');
			if (!empty($_POST)) {
				if (empty($_POST['title']) || empty($_POST['body'])) {
					$error = "Title and body fields are required";
				} else {
					$tags = explode(',',$_POST['tags']);
					foreach ($tags as $tag) {
						$tag = trim($tag);
					}
					$post = Post::edit($post_id,$_POST['title'],$_POST['body']);
					$tags = Tag::update_tags($post_id,$tags);
					echo "<script>window.location.href = '/posts/view/$post_id';</script>";
				}
			}
			$post = Post::get($post_id);
			$tags = Tag::get($post_id);
			$tags_string = implode(",",$tags);
			require_once('views/posts/edit.php');
		} else {
			$this::error();
		}
	}

	public function delete($post_id) {
		if (isset($_SESSION['user'])) {
			require_once($_SERVER['DOCUMENT_ROOT'] . '/models/post.php');
			require_once($_SERVER['DOCUMENT_ROOT'] . '/models/tag.php');
			Tag::delete_tags($post_id);
			Post::delete($post_id);
			echo "<script>window.location.href = '/';</script>";
		}
	}

	public function error() {
		require_once('views/posts/error.php');
	}
}