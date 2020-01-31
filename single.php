<?php
/**
 * The Single template
 *
 * @package WordPress
 * @subpackage SupaduTheme
 * @author Richard Cox
 */
?>
<?php use supaduDemo\theme ?>

<?php get_template_part('theme/views/global/header') ?>

<main id="supadu-main">
	<div class="row">
		<div class="large-12 columns">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				
				the_title();
				the_content();

			endwhile;

		endif;

		?>
		</div>
	</div>
</main>

<?php get_template_part('theme/views/global/footer') ?>



