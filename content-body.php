<?php do_action('etendard_before_content'); ?>

<div class="entry-content content" itemprop="articleBody">
	
	<?php do_action('etendard_top_content'); ?>
	
	<?php 
	if (is_single() || is_page()){
	
		the_content();
	}
	else if(is_category() || is_tax()){
	
		echo etendard_excerpt(25); ?>
		
		<a href="<?php the_permalink(); ?>" class="bookmark bouton lirelasuite" title="<?php the_title(); ?>"><?php _e('Read more','etendard'); ?></a>
		
	<?php 
	}else if(is_tag()|| is_author() ){
	
		echo etendard_excerpt(0); // == No excerpt
		
	}else{
	
		echo etendard_excerpt(50);
	?>
		
		<a href="<?php the_permalink(); ?>" class="bookmark bouton lirelasuite" title="<?php the_title(); ?>"><?php _e('Read more','etendard'); ?></a>
	
	<?php } ?>
	
	<?php do_action('etendard_bottom_content'); ?>

</div>

<?php do_action('etendard_after_content'); ?>