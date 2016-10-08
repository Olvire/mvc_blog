<?php

function call($controller, $action,$param) {
	require_once('controllers/' . $controller . '_controller.php');
	switch($controller) {
		case 'posts':
			$controller = new PostsController();
			break;
		case 'tags':
			$controller = new TagsController();
			break;
		case 'users':
			$controller = new UsersController();
			break;
	}
	$controller->{ $action }($param);
}

$controllers = array(
	'posts' => ['home','view','page','error','new','edit','delete'],
	'tags' => ['get_posts'],
	'users' => ['login','logout']
);


if (array_key_exists($controller,$controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller,$action,$param);
	} else {
		call('posts','error',NULL);
	}
} else {
	call('posts','error',NULL);
}