<div id="home_wrapper">

<?php
foreach ($posts as $post) {
?>

<div class="post">
	<div class="title">
		<a href="index.php?controller=posts&action=view_one&param=<?php echo $post->id ?>">
			<?php echo $post->title ?>
		</a>
	</div>
	<div class="body">
		<?php echo $post->body ?>
	</div>
	<div class="timestamp">
		<?php echo $post->timestamp ?>
	</div>
</div>

<?php } ?>
</div>