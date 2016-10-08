<DOCTYPE html>
<html>
<head>
	<title>dylan's php blog</title>
	<link rel="stylesheet" type="text/css" href="/views/static/style.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet"> 
	<link rel="icon" href="icon.png" type="image/png">
</head>
<body>
	<header>
		<a href='/'>dylan's php blog</a>
	</header>
	<div id="container">
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/routes.php'); ?>
	<div id="sidebar">
		<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/sidebar.php'); ?>
	</div>
	</div>
</body>
</html>