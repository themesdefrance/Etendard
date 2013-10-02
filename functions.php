<?php
define('TEXT_DOMAIN', 'etendard');
				
register_sidebar(array(
		'name'          => __('Widgets de pied de page', TEXT_DOMAIN),
		'id'            => 'footer',
		'description'   => __('Section apparaissant en bas de toutes les pages.', TEXT_DOMAIN),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	
register_sidebar(array(
		'name'          => __('Widgets de blog', TEXT_DOMAIN),
		'id'            => 'blog',
		'description'   => __('Barre latérale sur les pages du blog.', TEXT_DOMAIN),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));