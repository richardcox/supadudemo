<?php
/**
 * The archive template
 *
 * @package WordPress
 * @subpackage SupaduTheme
 * @author Richard Cox
 */
?>
<?php use supaduDemo\theme;?>

<?php get_template_part('theme/views/global/header') ?>

<?php
$args = [
	'posts_per_page'   => 1000,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_status'      => 'publish',
	'suppress_filters' => true 
];
$postType = $wp_query->query['post_type'];
?>

<main id="supadu-main">
	<?php
	if(empty($postType)){

		$posts = get_posts($args);
		foreach($posts as $post) {?>

			<h1><?= $post->post_title ?></h1>

		<?php }

	} else {
		$args['post_type'] = $postType;
		$posts = get_posts($args);
		// Load a custom archive view
		get_template_part("theme/views/archive_templates/archive", "{$postType}");
	}
	?>
</main>

<?php get_template_part('theme/views/global/footer');
