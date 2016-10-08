<DOCTYPE html>
<html>
<head>
	<title>Hello</title>
	<link rel="stylesheet" type="text/css" href="/views/static/style.css">
</head>
<body>
	<header>
		<a href='/'>blg</a>
	</header>
	<div id="container">
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/routes.php'); ?>
	<div id="sidebar">
		<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/sidebar.php'); ?>
	</div>
	</div>
</body>
</html>