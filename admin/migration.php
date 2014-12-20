<?php

////////////////////////////////////
// Migration from Etendard < 1.008
////////////////////////////////////

if (!get_option('etendard_import_OF')){
	$theme = get_option( 'stylesheet' );
	$theme = preg_replace("/\W/", "_", strtolower($theme) );
	$ofkey = 'optionsframework_' . $theme;
	$ofData = get_option($ofkey);
	
	if ($ofData){
		foreach ($ofData as $key=>$value){
			if ($key === 'etendard_blocks_presence'){
				$converted = array();
				
				foreach ($value as $str=>$bool){
					if ($bool) array_push($converted, $str);
				}
				
				$value = $converted;
			}
			
			update_option($key, $value);
		}
	}
	
	update_option('etendard_import_OF', true);
}

////////////////////////////////////
// Migration from Etendard < 1.010
////////////////////////////////////
if (!get_option('etendard_home_blocks') && get_option('etendard_blocks_presence')){
	$migrate = get_option('etendard_blocks_presence');
	$stored = array();
	$checkboxes = array('titre', 'diaporama', 'content', 'cta', 'services', 'portfolio', 'articles');
	
	foreach ($checkboxes as $index){
		$stored[$index] = in_array($index, $migrate);
	}
	update_option('etendard_home_blocks', $stored);
}

////////////////////////////////////
// Migration from Etendard < 1.011
////////////////////////////////////
if(!function_exists('etendard_meta_migration')){
	function etendard_meta_migration($newName, $oldName){
		$custom = get_post_custom();
		
		if (isset($custom[$newName])){
			return $custom[$newName];
		}
		else if (isset($custom[$oldName])){
			global $post;
			if ($post->ID){
				update_post_meta($post->ID, $newName, $custom[$oldName][0]);
				delete_post_meta($post->ID, $oldName);
			}
			return $custom[$oldName];
		}
		else return;
	}
}

if (!get_option('etendard_portfolio_fields') && get_option(ETENDARD_LICENSE_KEY)){
	update_option('etendard_portfolio_fields', array(__('Customer','etendard'), __('URL','etendard')));
	
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}

////////////////////////////////////
// Shortocode button for WordPress < 3.9
////////////////////////////////////

if(!function_exists('etendard_add_tinymce')){
	function etendard_add_tinymce() {
		add_filter('mce_external_plugins', 'etendard_add_tinymce_plugin');
		add_filter('mce_buttons', 'etendard_add_tinymce_button');
	}
}
add_action('admin_head', 'etendard_add_tinymce');

// Load TinyMCE plugin
if(!function_exists('etendard_add_tinymce_plugin')){
	function etendard_add_tinymce_plugin($plugin_array) {
		$plugin_array['drop'] =	get_template_directory_uri() . '/admin/js/tmcedrop.js';
		return $plugin_array;
	}
}

// Create shortcode button
if(!function_exists('etendard_add_tinymce_button')){
	function etendard_add_tinymce_button($buttons) {
	
		array_push($buttons, 'drop');
		return $buttons;
	}
}
