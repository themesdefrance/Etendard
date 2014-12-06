<?php $video_link = get_post_meta($post->ID, '_etendard_video_meta', true); ?>

<article <?php post_class('article'); ?> itemscope itemtype="http://schema.org/Article">

	<header class="header">
	
		<div class="post-video">
									
			<?php echo wp_oembed_get( $video_link, array( 'width' => 660, 'height' => 349) ); ?>
			
		</div>
		
		<?php if (is_single()): ?>
			
			<h1 class="header-title"><?php the_title(); ?></h1>
			
		<?php else: ?>
		
			<h2 class="header-title">
			
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				
			</h2>
			
		<?php endif; ?>
		
		<?php get_template_part( 'content', 'header-meta' ); ?>
		
	</header>
	
	<div class="content">
		
		<?php get_template_part( 'content', 'body' ); ?>	

	</div>
	
	<footer class="footer">
	
		<?php get_template_part( 'content', 'footer-meta' ); ?>
		
	</footer>
	
</article>