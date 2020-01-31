<div class="search">
	<form action="<?= home_url() ?>/" method="get">
	    <h4>Search for something</h4>
	    <div class="container">
		    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
		    <button type="submit" class="button"><span class="icon-search"></span></button>
		</div>
	</form>
</div>
