<?php $video_link = esc_url(get_post_meta($post->ID, '_etendard_video_meta', true)); ?>

<div class="wrapper">
	<div class="video_portfolio">
		
		<?php echo wp_oembed_get( $video_link, array( 'width' => 960) ); ?>
		
	</div><!--END .video_portfolio-->							
	
</div><!--END .wrapper-->