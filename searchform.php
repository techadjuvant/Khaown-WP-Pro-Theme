
<div class="search-container">
	<form role="search" method="get" class="form-inline my-lg-0 em-search-bar ml-auto p-2" action="<?php  echo home_url( '/' ); ?>">
		<input style="flex-grow: 5" class="form-control" aria-label="<?php _e('Search','khaown'); ?>" type="search" name="s" placeholder="<?php _e('Search','khaown'); ?>" value="<?php echo get_search_query(); ?>">
		<button style="flex-grow: 1" class="btn search-btn" type="submit"><?php _e('Search', 'khaown'); ?></button>
	</form> 	
</div>