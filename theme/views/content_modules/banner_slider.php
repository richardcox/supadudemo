<section class="supadu-slider supadu-banner-slider">
<?php
foreach($module['slide'] as $slide) {?>

    <div class="container" style="background-image: url(<?= $slide['image']['url'] ?>)">
    	<div class="overlay <?php if($module['remove_overlay']) { ?> caption-bottom <?php } ?>">
    		<div class="row">
	    		<div class="large-12 columns text-center">
	    			
			        <div class="slide-content text-center">

			        	<!-- Slide title -->
			        	<h1><?= $slide['title'] ?></h1>

			        	<!-- Slide copy -->
			        	<?php if(!empty($slide['summary'])) { ?>
				        <p class="summary large-8 large-offset-2"><?= $slide['summary'] ?></p><br/>
				        <?php } ?>

				        <!-- Slide CTA -->
				        <p>
			        	<?php if(!empty($slide['cta_text']) && !empty($slide['cta_link'])) { ?>
				       	<a class="cta-button" href="<?= $slide['cta_link'] ?>"><?= $slide['cta_text'] ?></a>
					    <?php } ?>
					    </p>

				    </div>
				</div>
			</div>
    	</div>
    </div>

<?php 
} ?>
</section>