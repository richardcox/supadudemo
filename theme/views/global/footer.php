<?php
use supaduDemo\theme;

$menuObj = theme::loadMenuByPosition('footer-menu');

?>
		<footer id="supadu-footer">
			<div class="row">
				<div class="large-12 columns">
					<nav>
						<ul>
						<?php 
					  	foreach ($menuObj as $menuNode) { 
				  			if (!empty( $menuNode['classes'] )){
				  			$classes = implode(' ', $menuNode['classes']);
				  		}
					  	if (isset($menuNode['childs'])) {
					  		$classes = $classes. ' has-submenu';
					  	}
					  	?>

					  	<!-- Top level menu item -->
					  	<li class='<?= $classes; ?> table'>
						  	<a href="<?= $menuNode['url'] ?>" class="top-level-link table-cell">
						  		<span class="text-node">
						  		<?= $menuNode['title'] ?>
						  		</span>
						  	</a>
						  	<?php
						  	$parentTitle = $menuNode['title'];
						  	if (!isset($menuNode['childs'])) {
						  	     continue;
						  	}
						  	if (is_array($menuNode['childs']) || !empty($menuNode['childs'])) { ?>
						  	<!-- Sub Menu -->
						  	<div class="sub-menu-container">
						  		<div class="row">
						  			<div class="large-12 columns text-center">
						  				<h4 class="title"><span class="text-node"><?= $parentTitle ?></span></h4>
						  			</div>
						  		</div>
						  		<div class="row medium-up-3">
					  				<?php
					  				foreach ($menuNode['childs'] as $menuChildNode) {

					  					if (!empty( $menuChildNode['classes'] )){
					  						$classes = implode(' ', $menuChildNode['classes']);
					  						?>

						  					<div class='<?= $classes ?> column'>
						  					<?php 
						  					} 
						  					else { ?>
						  					<div class='column'>
						  					<?php 
						  					} ?>
						  						<a href="<?= $menuChildNode['url']; ?>">
							  						<span class="submenu-item">
								      					<span class="sub-menu-item-title"><?= $menuChildNode['title'] ?></span>
							  						</span>
							  					</a>
				  							</div>

				  						<?php }	?>
					  			</div>
						  	</div> <!-- Sub Menu -->
						  	<?php } ?>
					  	</li> <!-- Top level menu item -->
						
					  	<?php } ?>
						
						</ul>
					</nav>
				</div>

				<div class="large-12 columns copyright text-center">
					<?php if(!empty(get_field('copyright', 'option'))) {
						echo get_field('copyright', 'option');
					} ?>
				</div>

			</div>
		</footer>

		<?php wp_footer(); ?>

		<script>
		jQuery(document).foundation();
		</script>

	</body>
</html>