<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage SupaduTheme
 * @author Richard Cox
 */
?>
<?php use supaduDemo\theme ?>

<?php get_template_part('theme/views/global/header') ?>
	

<main id="supadu-main">
	<?php
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			the_title();
			the_content();

		endwhile;
	?>
</main>

<?php get_template_part('theme/views/global/footer') ?>


