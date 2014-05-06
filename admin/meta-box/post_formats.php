<?php

// Post metaboxes
if(!function_exists('etendard_add_meta_boxes')){
	function etendard_add_meta_boxes(){
		add_meta_box(
					'etendard_link',
					__('Lien', 'etendard'),
					'etendard_link_callback',
					 'post',
					 'normal',
					 'high'
					 );
					 
		add_meta_box(
					'etendard_quote',
					__('Citation', 'etendard'),
					'etendard_quote_callback',
					 'post',
					 'normal',
					 'high'
					 );
		
		add_meta_box(
					'etendard_video',
					__('Vidéo', 'etendard'),
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
					__('Vidéo', 'etendard'),
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

	$form = new Cocorico(false);
	$form->startForm();
	
	$form->setting(array('type'=>'url',
					 'name'=>'_link_meta',
					 'label'=>__('Lien à mettre en avant', 'etendard'),
					 'description' => __('Insérez un lien à mettre en avant pour votre article. Libre à vous de le commenter dans le corps de l\'article.','etendard')
					 )
				  );
	
	$form->endForm();
	$form->render();
}

function etendard_quote_callback( $post ) {
	
	$form = new Cocorico(false);
	$form->startForm();
	
	$form->setting(array('type'=>'text',
					 'name'=>'_quote_meta',
					 'label'=>__('Citation à mettre en avant', 'etendard'),
					 'description' => __('Insérez de sages paroles et commentez-les éventuellement dans le corps de l\'article.','etendard')
					 )
				  );
	
	$form->setting(array('type'=>'text',
					 'name'=>'_quote_author_meta',
					 'label'=>__('Auteur de la citation (facultatif)', 'etendard'),
					 'description' => __('N\'oubliez pas de créditer l\'auteur de la citation.','etendard')
					 )
				  );
	
	$form->endForm();
	$form->render();
	
}

function etendard_video_callback( $post ) {

	$form = new Cocorico(false);
	$form->startForm();
	
	$form->setting(array('type'=>'url',
					 'name'=>'_video_meta',
					 'label'=>__('Vidéo à mettre en avant', 'etendard'),
					 'description' => __('Insérez le lien d\'une vidéo Youtube, Dailymotion ou Vimeo à mettre en avant.','etendard')
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