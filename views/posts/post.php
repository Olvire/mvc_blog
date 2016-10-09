	<div id="post_wrapper" class="content_wrapper">
		<div class="post">
			<div class="title">
				<?php echo $post->title; ?>
			</div>
			<?php
				if ($_SESSION['user']) {
					echo <<<EOT
					<div id="post_actions">
						<a class="linkbutton" href="/posts/edit/$post->id">edit</a>
						<a class="linkbutton" href="#" onclick="confirmDelete($post_id)">delete</a>
					</div>

EOT;
				}
			?>
			<div class="body">
				<?php echo $post->body; ?>
			</div>
			<div class="timestamp">
				<?php echo "posted by " . $post->author . " at " . $post->timestamp; ?>
			</div>
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
		</div>
	</div>


<script>
	function confirmDelete(post_id) {
		var ans = confirm("Are you sure?");
		if (ans) {
			window.location.href = "/posts/delete/" + post_id;
		}
	}
</script>