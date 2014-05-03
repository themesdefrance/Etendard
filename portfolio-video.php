<?php $video_link = get_post_meta($post->ID, 'etendard_video_meta', true); ?>
<?php $videoheight = get_option('etendard_diaporama_height'); ?>

<div class="wrapper">
	<div class="video_portfolio">
		
		<?php echo wp_oembed_get( $video_link, array( 'width' => 960) ); ?>
		
	</div>									
	
</div>