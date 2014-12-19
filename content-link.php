<?php $link = get_post_meta($post->ID, '_etendard_link_meta', true); ?>

<?php do_action('etendard_before_post'); ?>

<article <?php post_class('article'); ?> itemscope itemtype="http://schema.org/Article">
	
	<?php do_action('etendard_top_post'); ?>

	<header class="header">
		
		<?php do_action('etendard_top_header_post'); ?>
	
		<div class="post-link">
		
			<?php if (is_single()): ?>
				
					<h1 class="entry-title header-title" itemprop="headline">
					
						<?php the_title(); ?>
						
					</h1>
				
			<?php else: ?>
			
				<h2 class="entry-title header-title" itemprop="headline">
				
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					
				</h2>
				
			<?php endif; ?>
			
			<span class="post-link-url">
				<a href="<?php echo esc_url($link); ?>" title="<?php the_title(); ?>" class="icon-newtab" target="_blank" rel="bookmark"><?php echo esc_url($link); ?></a>
			</span>
		
		</div>
		
		<?php get_template_part( 'content', 'header-meta' ); ?>
		
		<?php do_action('etendard_bottom_header_post'); ?>
		
	</header>
		
	<?php get_template_part( 'content', 'body' ); ?>	
	
	<?php get_template_part( 'content', 'footer-meta' ); ?>
	
	<?php do_action('etendard_bottom_post'); ?>
	
</article>

<?php do_action('etendard_after_post'); ?>