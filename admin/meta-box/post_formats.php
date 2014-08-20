<?php

// Post metaboxes
if(!function_exists('etendard_add_meta_boxes')){
	function etendard_add_meta_boxes(){
		add_meta_box(
					'etendard_link',
					__('Link', 'etendard'),
					'etendard_link_callback',
					 'post',
					 'normal',
					 'high'
					 );
					 
		add_meta_box(
					'etendard_quote',
					__('Quote', 'etendard'),
					'etendard_quote_callback',
					 'post',
					 'normal',
					 'high'
					 );
		
		add_meta_box(
					'etendard_video',
					__('Video', 'etendard'),
					'etendard_video_callback',
					 'post',
					 'normal',
					 'high'
					 );
	}
}
add_action('add_meta_boxes_post', 'etendard_add_meta_boxes');

// Portfolio Metaboxes
if(!function_exists('etendard_add_portfolio_meta_boxes')){
	function etendard_add_portfolio_meta_boxes(){
		
		add_meta_box(
					'etendard_video',
					__('Video', 'etendard'),
					'etendard_video_callback',
					 'portfolio',
					 'normal',
					 'high'
					 );
	}
}
add_action('add_meta_boxes_portfolio', 'etendard_add_portfolio_meta_boxes');

// Callback functions

function etendard_link_callback( $post ) {

	$form = new Cocorico(ETENDARD_COCORICO_PREFIX, false);
	$form->startForm();
	
	$form->setting(array('type'=>'url',
					 'name'=>'_link_meta',
					 'label'=>__('Link to feature', 'etendard'),
					 'description' => __('Add a link to feature for this post. You\'re free to talk about it in the post content.','etendard')
					 )
				  );
	
	$form->endForm();
	$form->render();
}

function etendard_quote_callback( $post ) {
	
	$form = new Cocorico(ETENDARD_COCORICO_PREFIX, false);
	$form->startForm();
	
	$form->setting(array('type'=>'text',
					 'name'=>'_quote_meta',
					 'label'=>__('Quote to feature', 'etendard'),
					 'description' => __('Add some wise words and talk about it in the post content.','etendard')
					 )
				  );
	
	$form->setting(array('type'=>'text',
					 'name'=>'_quote_author_meta',
					 'label'=>__('Quote author (optional)', 'etendard'),
					 'description' => __('Be nice and don\'t forget to credit the quote author.','etendard')
					 )
				  );
	
	$form->endForm();
	$form->render();
	
}

function etendard_video_callback( $post ) {

	$form = new Cocorico(ETENDARD_COCORICO_PREFIX, false);
	$form->startForm();
	
	$form->setting(array('type'=>'url',
					 'name'=>'_video_meta',
					 'label'=>__('Video to feature', 'etendard'),
					 'description' => __('Add a video link from Youtube, Dailymotion or Vimeo.','etendard')
					 )
				  );
	
	$form->endForm();
	$form->render();
	
}


// Show the right metabox for each format

function etendard_display_metaboxes() {

    if ( get_post_type() == "post" ){ ?>
    
        <script>
            jQuery(document).ready(function($) {
            
	            // Set variables
	            var link_radio = $('#post-format-link'),
	            	quote_radio = $('#post-format-quote'),
	            	video_radio = $('#post-format-video'),
	            	link_metabox = $('#etendard_link'),
	            	quote_metabox = $('#etendard_quote'),
	            	video_metabox = $('#etendard_video'),
	            	all_formats = $('#post-formats-select input');
		            
	            hideAllMetaBoxes();
	            
	            all_formats.change( function() {
				    
			        hideAllMetaBoxes();
			
			        if( $(this).val() == 'link' ) {
						link_metabox.show();
					}
					else if( $(this).val() == 'quote' ) {
					    quote_metabox.show();
					} 
					else if( $(this).val() == 'video' ) {
						video_metabox.show();
					} 
			
				});
			
			    if(link_radio.is(':checked'))
			        link_metabox.show();
			
			    if(quote_radio.is(':checked'))
			        quote_metabox.show();
			        
			    if(video_radio.is(':checked'))
					video_metabox.show();
	            
	            
	            function hideAllMetaBoxes(){
		            link_metabox.hide();
		            quote_metabox.hide();
		            video_metabox.hide();
	            }
            });
        </script>
        
        <?php
    }
	else if(get_post_type() == "portfolio"){ ?>
	    
    <script>
            jQuery(document).ready(function($) {
            
	            // Set variables
	            var video_radio = $('#post-format-video'),
	            	video_metabox = $('#etendard_video'),
	            	diaporama_metabox = $('#etendard_portfolio_diaporama'),
	            	all_formats = $('#post-formats-select input');
		            
	            hideAllMetaBoxes();
	            
	            all_formats.change( function() {
				    
			        hideAllMetaBoxes();
			
			        if( $(this).val() == 'video' ) {
						video_metabox.show();
					} 
			
				});
			        
			    if(video_radio.is(':checked'))
					video_metabox.show();
				else
					diaporama_metabox.show();
	            
	            
	            function hideAllMetaBoxes(){
		            diaporama_metabox.hide();
		            video_metabox.hide();
	            }
            });
        </script>
    
    <?php }
}
// Add inline js in admin
add_action( 'admin_print_scripts', 'etendard_display_metaboxes',1000);