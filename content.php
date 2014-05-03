<?php $format = get_post_format(); ?>

<?php if ( false === $format ) $format = 'standard'; ?>

<article <?php post_class('article'); ?>>

	<header class="header">
	
		<?php get_template_part( 'format', $format ); ?>
		
		<?php get_template_part( 'content', 'header-meta' ); ?>
		
	</header>
	
	<div class="content">
		<?php 
		if (is_single() || is_page()){
		
			the_content();
		}
		else if(is_category() || is_tax()){
		
			echo etendard_excerpt(25); ?>
			
			<a href="<?php the_permalink(); ?>" class="bouton lirelasuite" title="<?php the_title(); ?>">Lire la suite</a>
			
		<?php 
		}else if(is_tag()|| is_search()){
		
			echo "";
			
		}else{
		
			echo etendard_excerpt(50);
		?>
			
			<a href="<?php the_permalink(); ?>" class="bouton lirelasuite" title="<?php the_title(); ?>">Lire la suite</a>
		
		<?php } ?>	

	</div>
	
	<footer class="footer">
	
		<?php get_template_part( 'content', 'footer-meta' ); ?>
		
	</footer>
	
</article>