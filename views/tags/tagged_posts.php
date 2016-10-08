<div id="tagged_posts_wrapper" class="content_wrapper">
<div id="tagged_posts_header">
	Viewing posts tagged as <span class="tag"><?php echo $tagged_posts[0]->tag; ?></span>
</div>
<?php foreach ($tagged_posts as $post) { ?>
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
<?php } ?>
</div>