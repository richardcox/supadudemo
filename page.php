<?php
/**
 * The page template
 *
 * @package WordPress
 * @subpackage SupaduTheme
 * @author Richard Cox
 */
?>
<?php use supaduDemo\theme;?>

<?php get_template_part('theme/views/global/header') ?>

<main id="supadu-main">
    <?php 
    if ( have_posts() ) {
        while (have_posts()) {
            the_post();
            the_content();

            // Render the cuntent modules
            if ( !post_password_required() ) { 
                theme::renderModules('supadu_custom_content');
            }
        }
    }
    ?>
</main>

<?php get_template_part('theme/views/global/footer') ?>
    
