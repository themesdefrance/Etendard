<article <?php post_class('article'); ?> itemscope itemtype="http://schema.org/Article">

	<header class="header">
	
		<?php if(!is_category() && !is_tag()): ?>
					
			<?php if (has_post_thumbnail() && !post_password_required()): ?>
			
				<div class="entry-thumbnail">
				
					<?php if (is_single() || is_page()): ?>
					
						<?php the_post_thumbnail('etendard-post-thumbnail'); ?>
						
					<?php else: ?>
					
						<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_post_thumbnail('etendard-post-thumbnail'); ?></a>
						
					<?php endif; ?>
				</div><!--END .entry-thumbnail-->
				
			<?php endif; ?>
		
		<?php endif; ?>
		
		<?php if (is_single()): ?>
		
			<?php if(!is_page_template('template_home.php')): ?>
			
				<h1 class="entry-title header-title " itemprop="name">
				
					<?php the_title(); ?>
					
				</h1>
				
			<?php endif; ?>
			
		<?php elseif(!is_page()): ?>
		
			<h2 class="entry-title header-title" itemprop="name">
			
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				
			</h2>
			
		
		<?php endif; ?> 
		
		<?php get_template_part( 'content', 'header-meta' ); ?>
		
	</header>
	
	<div class="entry-content content" itemprop="articleBody">
		
		<?php get_template_part( 'content', 'body' ); ?>

	</div>
	
	<footer class="footer">
	
		<?php get_template_part( 'content', 'footer-meta' ); ?>
		
	</footer>
	
</article>