<?php
	if ($_SESSION['user']) {
		$username = $_SESSION['user']->username;
		echo <<<EOT
		<div id="logged_in">
			<span>logged in as $username</span>
			<span><a class="linkbutton" href="/posts/new">new post</a></span>
			<span><a class="linkbutton" href="/logout">logout</a></span>
		</div>

EOT;
	}
?>

<span id="popular_tags_header">Popular Tags</span>
<ul id="popular_tags_list">
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/tags_controller.php');
$controller = new TagsController();
$popular_tags = $controller->get_popular_tags();

foreach($popular_tags as $tag) {
?>

<li><a class="under" href="/tags/view/<?php echo urlencode($tag['tag']); ?>"><?php echo $tag['tag'] ?></a> <?php echo "(" . $tag['count'] . ')'; ?></li>

<?php } ?>