<?php $video_link = get_post_meta($post->ID, 'etendard_video_meta', true); ?>

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