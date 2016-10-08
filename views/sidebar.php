<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/tag.php');
$tags = Tag::get_count();
echo "Popular tags<br>";
foreach ($tags as $tag) {
	echo $tag['tag'] . " (" . $tag['count'] . ")<br>";
}