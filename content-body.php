<?php do_action('etendard_before_content'); ?>

<div class="entry-content content" itemprop="articleBody">
	
	<?php do_action('etendard_top_content'); ?>
	
	<?php 
	if (is_single() || is_page()){
	
		// Display an excerpt on comments page
			if(get_query_var( 'cpage' ) > 0):
				echo etendard_excerpt(50);
			else:
				the_content();
			endif;
	}
	else if(is_category() || is_tax()){
	
		echo etendard_excerpt(25); ?>
		
		<a href="<?php the_permalink(); ?>" class="bookmark bouton lirelasuite" title="<?php the_title_attribute(); ?>" rel="bookmark" itemprop="url"><?php _e('Read more','etendard'); ?></a>
		
	<?php 
	}else if(is_tag()|| is_author() ){
	
		echo etendard_excerpt(0); // == No excerpt
		
	}else{
	
		echo etendard_excerpt(50);
	?>
		
		<a href="<?php the_permalink(); ?>" class="bookmark bouton lirelasuite" title="<?php the_title_attribute(); ?>" rel="bookmark" itemprop="url"><?php _e('Read more','etendard'); ?></a>
	
	<?php } ?>
	
	<?php do_action('etendard_bottom_content'); ?>

</div><!--END .entry-content-->

<?php do_action('etendard_after_content'); ?>