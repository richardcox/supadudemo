<?php

use supaduDemo\theme;

$menuObj = theme::loadMenuByPosition('header-menu');
$membersMenu = theme::loadMenuByPosition('members-menu');

?>

<nav class="mobile">
	<div class="mobile-nav-topbar">
		<a class="button close"><span class="icon-chevron-up"></span></a>
	</div>

	<ul class="vertical menu top-level" data-drilldown>
		
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
	  	<li class='<?= $classes; ?>'>
		  	<a href="<?= $menuNode['url'] ?>" class="table top-level-link mobile-top-level-link">
		  		<span class="table-cell">
			  		<span class="icon-chevron-right"></span> 
			  		<span class="title"><?= $menuNode['title'] ?></span>
			  	</span>
		  	</a>
		  	<?php
		  	$parentTitle = $menuNode['title'];
		  	if (!isset($menuNode['childs'])) {
		  	     continue;
		  	}
		  	if (is_array($menuNode['childs']) || !empty($menuNode['childs'])) { ?>
		  	<!-- Sub Menu -->
		  	<ul class="vertical menu sub-menu">
  				<?php
  				foreach ($menuNode['childs'] as $menuChildNode) { ?>
  				<li>
					<a href="<?= $menuChildNode['url']; ?>" class="table">
  						<span class="table-cell">
	  						<span class="icon-chevron-right"></span> 
	      					<?= $menuChildNode['title'] ?>
  						</span>
  					</a>
  				</li>
  				<?php } ?>	
		  	</ul> <!-- Sub Menu -->
		  	<?php } ?>
	  	</li> <!-- Top level menu item -->
  	<?php 
  	} 
  	?>
	</ul>
</nav>
