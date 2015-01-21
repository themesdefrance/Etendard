<?php $link = esc_url(get_post_meta($post->ID, '_etendard_link_meta', true)); ?>

<?php do_action('etendard_before_post'); ?>

<article <?php post_class('article'); ?> itemscope itemtype="http://schema.org/Article">
	
	<?php do_action('etendard_top_post'); ?>

	<header class="entry-header header">
		
		<?php do_action('etendard_top_header_post'); ?>
	
		<div class="entry-link post-link">
		
			<?php if (is_single()): ?>
				
				<h1 class="entry-title header-title" itemprop="headline">
				
					<?php the_title(); ?>
					
				</h1>
				
			<?php else: ?>
			
				<h2 class="entry-title header-title" itemprop="headline">
				
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" itemprop="url"><?php the_title(); ?></a>
					
				</h2>
				
			<?php endif; ?>
			
			<span class="post-link-url">
				<a href="<?php echo esc_url($link); ?>" title="<?php the_title_attribute(); ?>" class="icon-newtab" target="_blank" rel="bookmark" itemprop="url"><?php echo esc_url($link); ?></a>
			</span>
		
		</div><!--END .entry-link-->
		
		<?php get_template_part( 'content', 'header-meta' ); ?>
		
		<?php do_action('etendard_bottom_header_post'); ?>
		
	</header><!--END .entry-header-->
		
	<?php get_template_part( 'content', 'body' ); ?>	
	
	<?php get_template_part( 'content', 'footer-meta' ); ?>
	
	<?php do_action('etendard_bottom_post'); ?>
	
</article><!--END .article-->

<?php do_action('etendard_after_post'); ?>