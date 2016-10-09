<div id="new_post_wrapper" class="content_wrapper">
	<?php 
	if (isset($error)) {
		echo "<p class='error'>$error</p>";
	}
	?>
	<form method="post">
		<input type="text" name="title" placeholder='title' value="<?php echo $post->title ?>">
		<textarea placeholder='body' name="body"><?php echo str_replace("<br />", "", $post->body) ?></textarea>
		<input type="text" placeholder="tags (comma-separated)" name="tags" value ="<?php echo $tags_string ?>">
		<input type="submit" value="submit">
	</form>
</div>