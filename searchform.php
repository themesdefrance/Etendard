<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text">
			<?php _e('Search :', 'etendard'); ?>
		</span>
		<input class="search-field" placeholder="<?php _e('Search...', 'etendard'); ?>" value="" name="s" title="<?php _e('Search...', 'etendard'); ?>" type="search" />
	</label>
	<span class="search-submit-wrapper">
		<input class="search-submit" value="<?php _e('Go', 'etendard'); ?>" type="submit" />
	</span>
</form>