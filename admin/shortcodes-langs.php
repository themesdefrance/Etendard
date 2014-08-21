<?php

if ( ! defined( 'ABSPATH' ) )
    exit;

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

function etendard_tinymce_shortcodes_translation() {
    $strings = array(
        'tooltip' => __('Etendard Shortcodes', 'etendard'),
        'buttons' => __('Buttons', 'etendard')
    );

    $locale = _WP_Editors::$mce_locale;
    
    $translated = 'tinyMCE.addI18n("' . $locale . '.etendard_i18n_shortcodes", ' . json_encode( $strings ) . ");\n";
	
	
	/*$translated =
	  'tinyMCE.addI18n( 
	    "' . $locale .'.etendard_i18n_shortcodes", 
	    {
	      tooltip : "' . esc_js( __('Etendard Shortcodes', 'etendard') ) . '",
	      buttons  : "' . esc_js( __('Buttons', 'etendard') ) . '",
	    } 
	  );';*/
	
	
    return $translated;
}

//$strings = etendard_tinymce_shortcodes_translation();


