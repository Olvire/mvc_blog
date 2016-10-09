<div id="new_post_wrapper" class="content_wrapper">
	<?php 
	if (isset($error)) {
		echo "<p class='error'>$error</p>";
	}
	?>
	<form method="post">
		<input type="text" placeholder="title" name="title">
		<textarea name="body" placeholder="body"></textarea>
		<input type="text" placeholder="tags" name="tags">
		<input type="submit" value="submit">
	</form>
</div>