<?php
define('TEXT_TRANSLATION_DOMAIN', 'etendard');
				
register_sidebar(array(
		'name'          => __('Widgets de pied de page', TEXT_TRANSLATION_DOMAIN),
		'id'            => 'footer',
		'description'   => __('Section apparaissant en bas de toutes les pages.', TEXT_TRANSLATION_DOMAIN),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	
register_sidebar(array(
		'name'          => __('Widgets de blog', TEXT_TRANSLATION_DOMAIN),
		'id'            => 'blog',
		'description'   => __('Barre latérale sur les pages du blog.', TEXT_TRANSLATION_DOMAIN),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	
add_theme_support('post-thumbnails');