<?php
/**
 * The search template
 *
 * @package WordPress
 * @subpackage SupaduTheme
 * @author Richard Cox
 */
?>
<?php use supaduDemo\theme ?>

<?php get_template_part('theme/views/global/header') ?>

<?php 
if($wp_query->found_posts > 0) {
	get_template_part('theme/views/partials/pagination');
}
?>		

<main id="supadu-main">
	<header>
		<h1 class="page-title screen-reader-text">Search results</h1>
	</header>
	<?php
	if ( have_posts() ) :

		/* Start the Loop */
		while ( have_posts() ) : the_post();

			// Template for a single search result
			get_template_part('theme/views/partials/search', 'result');

		endwhile;

	else :
		// Template to display "No results message"
		get_template_part('theme/views/partials/no', 'results');

	endif;
	?>
</main>

<?php get_template_part('theme/views/global/footer') ?>


