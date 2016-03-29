<form class="ast-search" role="search"  method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
	<input type="text" placeholder="<?php esc_attr_e('Search...', "portfolio-gallery"); ?>" id="search-input" name="s" value="<?php echo get_search_query(); ?>"/>
	<input type="submit" value="" id="search-submit" />
</form>