<section class="supadu-html-block">

	<?php if(!$module['full_width']): ?>
	<div class="row">
		<div class="large-12 columns">
	<?php endif ?>

		<?php
		if(!empty($module['content'])) 
		{
			echo $module['content'];
		}?>

	<?php if(!$module['full_width']): ?>	
		</div>
	</div>
	<?php endif ?>

	<div class="row divider">
		<div class="large-8 large-offset-2 columns">
			<hr/>
		</div>
	</div>
	
</section>