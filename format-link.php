<?php $link = get_post_meta($post->ID, 'etendard_link_meta', true); ?>

<div class="post-link">
		
	<?php if (is_single()): ?>
		
			<h1 class="header-title">
			
				<?php the_title(); ?>
				
			</h1>
		
	<?php else: ?>
	
		<h2 class="header-title">
		
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			
		</h2>
		
	<?php endif; ?>
	
	<span class="post-link-url">
		<a href="<?php echo $link; ?>" title="<?php the_title(); ?>" class="icon-newtab" target="_blank" rel="bookmark"><?php echo $link; ?></a>
	</span>

</div>