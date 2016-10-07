<?php

function call($controller, $action,$param) {
	require_once('controllers/' . $controller . '_controller.php');
	switch($controller) {
		case 'posts':
			$controller = new PostsController();
			break;
	}
	$controller->{ $action }($param);
}
$controllers = array('posts' => ['home','view','error','edit']);

if (array_key_exists($controller,$controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller,$action,$param);
	} else {
		call('posts','error');
	}
} else {
	call('posts','error');
}