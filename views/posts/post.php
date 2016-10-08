	<div id="post_wrapper">
		<div class="post">
			<div class="title">
				<?php echo $post->title; ?>
			</div>
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