<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text">
			<?php _e('Rerchercher :', TEXT_TRANSLATION_DOMAIN); ?>
		</span>
		<input class="search-field" placeholder="<?php _e('Recherche…', TEXT_TRANSLATION_DOMAIN); ?>" value="" name="s" title="<?php _e('Recherche…', TEXT_TRANSLATION_DOMAIN); ?>" type="search" />
	</label>
	<span class="search-submit-wrapper">
		<input class="search-submit" value="<?php _e('Rechercher', TEXT_TRANSLATION_DOMAIN); ?>" type="submit" />
	</span>
</form>