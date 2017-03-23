<form method="get" class="searchform search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<fieldset> 
		<input type="text" name="s" class="s" value="" placeholder="Search here"> 
        <button type="submit" class="search-button fa fa-search" placeholder="<?php _e('Search','palo-alto'); ?>" type="submit" value=""></button>
        <span class="search-submit fa fa-search"></span>
	</fieldset>
</form>