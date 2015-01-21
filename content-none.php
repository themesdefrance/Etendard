<?php do_action('etendard_before_post'); ?>

<article class="article" itemscope itemtype="http://schema.org/Article">
	
	<?php do_action('etendard_top_post'); ?>
	
	<div class="entry-content content">
		<p>
			<?php printf(apply_filters('etendard_nopostfound', __('Sorry, no posts were found. You can <a href="%s" title="Click here to get back to the homepage">go back to the homepage</a> or use the search field below :', 'etendard')) , home_url()); ?>
		</p>
		<?php get_search_form(); ?>
	
	</div><!--END .entry-content-->
	
	<?php do_action('etendard_bottom_post'); ?>
	
</article><!--END .article-->

<?php do_action('etendard_after_post'); ?>