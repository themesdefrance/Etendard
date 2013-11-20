<?php
function optionsframework_options() {
		
	$options = array();
		
	$options[] = array(	'name'=> __('Général', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'heading');
						
	$options[] = array(	'name'=> __('Call To Action', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'desc'=> __('Destination du call to action (url)', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_cta_url',
						'type'=> 'text');
						
	$options[] = array( 'desc'=> __("Texte d'accompagnement", TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_cta_text',
						'type'=> 'etendard_cta_texte');
						
	$options[] = array( 'desc'=> __('Texte du bouton', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_cta_bouton',
						'type'=> 'text');
						
	$options[] = array(	'name'=> __('Footer', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'desc'=> __('Partie gauche', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_footer_gauche',
						'type'=> 'textarea');
						
	$options[] = array( 'desc'=> __('Partie droite', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_footer_droite',
						'type'=> 'textarea');
						
	$options[] = array(	'name'=> __('Apparence', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'heading');
						
	$options[] = array(	'name'=> __('Position de la sidebar', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
											
	$options[] = array( 'options'=>array('droite'=>__('à droite', TEXT_TRANSLATION_DOMAIN), 
										 'gauche'=>__('à gauche', TEXT_TRANSLATION_DOMAIN)),
						'std'=>'droite',
						'id'=> 'etendard_sidebar_position',
						'type'=> 'radio');
						
	$options[] = array(	'name'=> __('CSS personnalisé', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'desc'=> __('CSS', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_custom_css',
						'type'=> 'textarea');
	
	return $options;
}