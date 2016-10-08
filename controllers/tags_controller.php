<?php

class TagsController {
	public function get_posts($tag_id) {
		require_once($_SERVER['DOCUMENT_ROOT'] . '/models/tag.php');

		$tagged_posts = Tag::get_posts($tag_id);
		if ($tagged_posts) {
			require_once($_SERVER['DOCUMENT_ROOT'] . '/views/tags/tagged_posts.php');
		} else {
			$this::error();
		}
	}

	public function get_popular_tags() {
		require_once($_SERVER['DOCUMENT_ROOT'] . '/models/tag.php');

		$popular_tags = Tag::get_popular_tags();

		return $popular_tags;
	}

	public function error() {
		require_once($_SERVER['DOCUMENT_ROOT'] . "/views/tags/error.php");
	}
}