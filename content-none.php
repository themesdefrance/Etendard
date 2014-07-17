<article class="article">
	<div class="content">
		<p>
			<?php printf(apply_filters('etendard_sans_contenu', __('Sorry, no posts were found. You can <a href='%s' title="Click here to get back to the homepage">go back to the homepage</a> or use the search field below :', 'etendard')) , home_url()); ?>
		</p>
		<?php get_search_form(); ?>
	
	</div>

</article>