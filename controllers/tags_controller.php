<?php

class TagsController {
	public function get_posts($tag_id) {
		require_once($_SERVER['DOCUMENT_ROOT'] . '/models/tag.php');

		$tagged_posts = Tag::get_posts($tag_id);

		require_once($_SERVER['DOCUMENT_ROOT'] . '/views/tags/tagged_posts.php');
	}
}