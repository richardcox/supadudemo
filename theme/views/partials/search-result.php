<div class="row result">
	<div class="large-12 columns table">
		<div class="container table-cell">
			<h2>
			gjgjhgh
				<a href="<?= get_permalink($post->post_id) ?>">
					<?= $post->post_title ?>
				</a>
			</h2>
			<p><?= $post->post_excerpt ?></p>
			<a href="<?= get_permalink($post->post_id) ?>" class="read-more">
				Read more <span class="icon-long-arrow-right"></span>
			</a>
		</div>

	</div>
</div>