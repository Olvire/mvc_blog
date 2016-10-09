<div id="new_post_wrapper" class="content_wrapper">
	<?php 
	if (isset($error)) {
		echo "<p class='error'>$error</p>";
	}
	?>
	<form method="post">
		<input type="text" name="title" value="<?php echo $post->title ?>">
		<textarea name="body"><?php echo str_replace("<br />", "", $post->body) ?></textarea>
		<input type="submit" value="submit">
	</form>
</div>