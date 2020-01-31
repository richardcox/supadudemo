<?php use supaduDemo\resources ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <meta name="HandheldFriendly" content="true">

    <title><?=the_title()?></title>
    
  	<?php resources::enqueueConditional(get_body_class()) ?>
  	
  	<?php 
  		$template = get_field('page_template'); 
  		if(empty($template) || $template == 'default') {
  			$template = '';
  		}
  	?>
    <?php wp_head() ?>


<body <?= body_class($template); ?> >

    <header id="supadu-header">
        <div class="row">
            <div class="large-12 columns header-column">
                <div id="logo" class="table">
                    <a href="<?= get_home_url() ?>" class="table-cell">
                        <img src="<?= get_header_image() ?>"/>
                    </a>
                </div>
                <div class="mobile-nav-buttons table">
                    <span class="table-cell">
                        <a class="top-level-link open-mobile-nav">
                            <span class="icon-bars"></span>
                        </a>
                    </span>
                </div>
                <?= get_template_part('theme/views/global/navigation/desktop', 'navigation') ?>
            </div>
        </div>  
    </header>
    <?= get_template_part('theme/views/global/navigation/mobile', 'navigation') ?>
