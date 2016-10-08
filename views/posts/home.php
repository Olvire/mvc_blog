	<div id="home_wrapper">
	<?php
	if (!$posts) {
		echo "<p class='error'>No posts here</p>";
	} else {
	foreach ($posts as $post) {
	?>
		<div class="post">
			<div class="title">
				<a href="/posts/view/<?php echo $post->id ?>">
					<?php echo $post->title ?>
				</a>
			</div>
			<div class="body">
				<?php echo $post->body; ?>

			</div>
			<div class="timestamp">
				<?php echo "posted by " . $post->author . " at " . $post->timestamp; ?>
			</div>
			<?php if ($post->tags) { ?>
			<div class="post_tags">
				tagged as: 
				<?php foreach ($post->tags as $tag) { ?>
					<span class="post_tag">
						<a class="under" href="/tags/view/<?php echo urlencode($tag) ?>">
							<?php echo $tag; ?></span>
						</a>
					</span>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	<?php } 
		if ($page_number > 0) {
	?>
		<a href="posts/page/<?php echo $page_number - 1 ?>">Prev</a>
	<?php } ?>
	<a href="posts/page/<?php echo $page_number + 1 ?>">Next</a>
	<?php } ?>
</div>
