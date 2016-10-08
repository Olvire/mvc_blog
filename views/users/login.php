<div id="login_wrapper">
	<form method="POST">
		<input type="text" name="username">
		<input type="password" name="password">
		<input type="submit" value="submit">
	</form>
	<?php if ($message) {
		echo $message;
	}
	?>
</div>