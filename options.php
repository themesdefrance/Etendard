<?php
function optionsframework_options() {
		
	$options = array();
		
	$options[] = array(	'name'=> __('Général', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'heading');
						
	$options[] = array(	'name'=> __("Page d'accueil", TEXT_TRANSLATION_DOMAIN),
						'desc'=> false,
						'type'=> 'info');
						
	$options[] = array(	'desc'=> __("Sélectionnez les éléments à faire figurer sur la page d'accueil", TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'id'=> 'etendard_blocks_presence',
						'type'=> 'multicheck',
						'options'=>array(
							'titre'=>__('Titre & description', TEXT_TRANSLATION_DOMAIN),
							'slider'=>__('Slider', TEXT_TRANSLATION_DOMAIN),
							'cta'=>__('Call to action', TEXT_TRANSLATION_DOMAIN),
							'portfolio'=>__('Portfolio', TEXT_TRANSLATION_DOMAIN),
							'articles'=>__('Articles', TEXT_TRANSLATION_DOMAIN),
						),
						'std'=>array(
							'titre'=>true,
							'slider'=>true,
							'cta'=>true,
							'portfolio'=>true,
							'articles'=>true,
						));
						
	$options[] = array(	'desc'=> __("Configurez l'ordre d'apparition des éléments", TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'desc'=> __("Titre & Description", TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_blocks_ordre_titre',
						'std'=>10,
						'type'=> 'text');
						
	$options[] = array( 'desc'=> __("Slider", TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_blocks_ordre_slider',
						'std'=>20,
						'type'=> 'text');
						
	$options[] = array( 'desc'=> __("Call to action", TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_blocks_ordre_cta',
						'std'=>30,
						'type'=> 'text');
						
	$options[] = array( 'desc'=> __("Portfolio", TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_blocks_ordre_portfolio',
						'std'=>40,
						'type'=> 'text');
						
	$options[] = array( 'desc'=> __("Articles de blog", TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_blocks_ordre_articles',
						'std'=>50,
						'type'=> 'text');
						
	$options[] = array(	'name'=> __('Call To Action', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __("Personnaliser le call to action de la page d'accueil", TEXT_TRANSLATION_DOMAIN),
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
						'desc'=> __("Personnaliser le contenu du pied de page", TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'desc'=> __('Partie gauche', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_footer_gauche',
						'type'=> 'textarea');
						
	$options[] = array( 'desc'=> __('Partie droite', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_footer_droite',
						'type'=> 'textarea');
						
	$options[] = array(	'name'=> __('Apparence', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'heading');
			
	$options[] = array(	'name'=> __('Couleur dominante', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __('Choisir la couleur dominante du thème', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
												
	$options[] = array( 'desc'=> __('Couleur', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_color',
						'type'=> 'color');
												
	$options[] = array(	'name'=> __('Position de la sidebar', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __('Choisir la position de la sidebar', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
											
	$options[] = array( 'options'=>array('droite'=>__('à droite', TEXT_TRANSLATION_DOMAIN), 
										 'gauche'=>__('à gauche', TEXT_TRANSLATION_DOMAIN)),
						'std'=>'droite',
						'id'=> 'etendard_sidebar_position',
						'type'=> 'radio');
						
	$options[] = array(	'name'=> __('CSS personnalisé', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __('Ce css sera injecté sur toute les pages du site.', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'desc'=> __('CSS', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_custom_css',
						'type'=> 'textarea');
	
	return $options;
}