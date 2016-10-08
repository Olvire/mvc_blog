<div id="new_post_wrapper" class="content_wrapper">
	<?php 
	if (isset($error)) {
		echo "<p class='error'>$error</p>";
	}
	?>
	<form method="post">
		<input type="text" name="title">
		<textarea name="body"></textarea>
		<input type="submit" value="submit">
	</form>
</div>