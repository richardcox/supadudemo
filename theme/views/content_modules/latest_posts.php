<?php
if($module['choose_items'] == 1) {
	$post_items = [
		$module['item_1'],
		$module['item_2'],
		$module['item_3']
	];
} else {
	$args = array(
		'posts_per_page'   => 3,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$post_items = get_posts($args);
}
?>

<section class="supadu-latest-posts large-12 columns">
	
	<!-- The title -->
	<?php if(!empty($module['title'])) { ?>
	<div class="row title">
		<div class="large-12 columns">
			<h2 class="text-center"><?= $module['title'] ?></h2>
		</div>
	</div>
	<?php } ?>

	<!-- The posts -->
	<div class="row">
		<?php
		foreach($post_items as $item) {
			$thumb_url = '';
			$thumb_url_array = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'full');

			if(!empty($thumb_url_array)) {
				$thumb_url = $thumb_url_array[0];
			}

			?>
			<div class="large-4 medium-6 small-12 columns supadu-post">
				<a class="container" href="<?= $item->guid ?>">
					<span class="image" style="background-image:url(<?= $thumb_url ?>)">
						<span class="overlay"></span>
					</span>
					<span class="text">
						<p><?= mb_strimwidth($item->post_title, 0 , 85, '...') ?></p>
						<p><?= mb_strimwidth(get_the_excerpt($item->ID), 0, 40, "...") ?></p>
						<span class="read-more">Read more</span>
					</span>
				</a>
			</div>
		<?php } ?>
	</div>

</section>
