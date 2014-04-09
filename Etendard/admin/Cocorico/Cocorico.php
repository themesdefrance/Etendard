<?php

if (!defined('COCORICO_PREFIX')) define('COCORICO_PREFIX', '');
define('COCORICO_PATH', dirname(__FILE__));

//Cocorico is supposed to be dropped in a plugin or a theme-get the url either way
if (strpos(COCORICO_PATH, get_theme_root()) >= 0){
	$rootlessPath = substr(COCORICO_PATH, strlen(get_theme_root()));
	define('COCORICO_URI', get_theme_root_uri().str_replace('\\', '/', $rootlessPath));
}
else{
	var_dump('Plugins are not supported yet');
	define('COCORICO_URI', '');
}


//autoload everything
foreach (array('core', 'plugins') as $dir){
	foreach (glob(COCORICO_PATH.'/'.$dir.'/*.php') as $file){
		require_once $file;
	}
}

foreach (glob(COCORICO_PATH.'/extensions/*', GLOB_ONLYDIR) as $extension){
	foreach (glob($extension.'/*.php') as $file){
		require_once $file;
	}
}

if (!function_exists('cocorico_enqueue')){
	function cocorico_enqueue(){
		wp_register_script('cocorico', COCORICO_URI.'/frontend/cocorico.js', array('jquery'), '1', true);
		wp_enqueue_script('cocorico');
		
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		
		wp_register_style( 'etendard_custom_admin_css', get_template_directory_uri() . '/admin/css/admin-style.css', false, EDD_SL_THEME_VERSION );
        wp_enqueue_style( 'etendard_custom_admin_css' );
		
		wp_enqueue_media();
	}
}
add_action('admin_enqueue_scripts', 'cocorico_enqueue');