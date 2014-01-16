<?php
function optionsframework_options() {
		
	$options = array();
		
	//Onglet Général
	$options[] = array(	'name'=> __('Général', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'heading');
						
	$options[] = array(	'name'=> __("Page d'accueil", TEXT_TRANSLATION_DOMAIN),
						'desc'=> __("Choisissez les éléments à afficher sur la page d'accueil :", TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'id'=> 'etendard_blocks_presence',
						'type'=> 'multicheck',
						'options'=>array(
							'titre'=>__('Titre et slogan', TEXT_TRANSLATION_DOMAIN),
							'slider'=>__('Slider', TEXT_TRANSLATION_DOMAIN),
							'cta'=>__('Appel à l\'action', TEXT_TRANSLATION_DOMAIN),
							'portfolio'=>__('Derniers éléments du portfolio', TEXT_TRANSLATION_DOMAIN),
							'articles'=>__('Derniers articles', TEXT_TRANSLATION_DOMAIN),
						),
						'std'=>array(
							'titre'=>true,
							'slider'=>true,
							'cta'=>true,
							'portfolio'=>true,
							'articles'=>true,
						),
						'desc'=>'Pour paramétrer le titre et le slogan rendez-vous dans <a href="'.home_url().'/wp-admin/options-general.php" target="_blank" >Réglages > Général</a>. Concernant le slider et l\'appel à l\'action, vous pourrez les paramétrer en éditant la page d\'accueil.');
						
						
//	$options[] = array(	'desc'=> __("Configurez l'ordre d'apparition des éléments", TEXT_TRANSLATION_DOMAIN),
//						'type'=> 'info');
//						
//	$options[] = array( 'desc'=> __("Titre & Description", TEXT_TRANSLATION_DOMAIN),
//						'id'=> 'etendard_blocks_ordre_titre',
//						'std'=>10,
//						'type'=> 'text');
//						
//	$options[] = array( 'desc'=> __("Slider", TEXT_TRANSLATION_DOMAIN),
//						'id'=> 'etendard_blocks_ordre_slider',
//						'std'=>20,
//						'type'=> 'text');
//						
//	$options[] = array( 'desc'=> __("Call to action", TEXT_TRANSLATION_DOMAIN),
//						'id'=> 'etendard_blocks_ordre_cta',
//						'std'=>30,
//						'type'=> 'text');
//						
//	$options[] = array( 'desc'=> __("Portfolio", TEXT_TRANSLATION_DOMAIN),
//						'id'=> 'etendard_blocks_ordre_portfolio',
//						'std'=>40,
//						'type'=> 'text');
//						
//	$options[] = array( 'desc'=> __("Articles de blog", TEXT_TRANSLATION_DOMAIN),
//						'id'=> 'etendard_blocks_ordre_articles',
//						'std'=>50,
//						'type'=> 'text');
						
						
	$options[] = array(	'name'=> __('Pied de page', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __("Personnalisez le contenu du pied de page :", TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'desc'=> __('Contenu de gauche (Exemple : Insérez des informations relative au droit d\'auteur). Laissez vide pour ne rien afficher.', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_footer_gauche',
						'type'=> 'textarea');
						
	$options[] = array( 'desc'=> __('Contenu de droite (Exemple : Pourquoi pas insérer un lien vers Thèmes de France ?). Laissez vide pour ne rien afficher.', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_footer_droite',
						'type'=> 'textarea');
						
						
						
	//Onglet Apparence					
	$options[] = array(	'name'=> __('Apparence', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'heading');
			
	$options[] = array(	'name'=> __('Couleur principale', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __('Choisissez la couleur principale :', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
												
	$options[] = array( 'desc'=> __('Cette couleur sera utilisée pour mettre en valeur les boutons, les liens et d\'autres d\'Étendard.', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_color',
						'type'=> 'color');
												
	$options[] = array(	'name'=> __('Logo', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __('Envoyez votre logo :', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
												
	$options[] = array( 'desc'=> __('Le fichier image doit être au format JPG ou PNG. Notez également que la taille optimale est de 200px par 75px.', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_logo',
						'type'=> 'upload');
												
	$options[] = array(	'name'=> __('Barre latérale', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __('Choisissez la position de la barre latérale :', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
											
	$options[] = array( 'options'=>array('droite'=>__('Droite', TEXT_TRANSLATION_DOMAIN), 
										 'gauche'=>__('Gauche', TEXT_TRANSLATION_DOMAIN)),
						'desc'=> __('La barre latérale (également appelée "sidebar") peut se positionner à droite ou à gauche du contenu principal. La plupart des sites la placent à droite mais vous pouvez faire l\'inverse :)', TEXT_TRANSLATION_DOMAIN),
						'std'=>'droite',
						'id'=> 'etendard_sidebar_position',
						'type'=> 'radio');
						
	$options[] = array(	'name'=> __('CSS Supplémentaire', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __('Personnalisez Étendard en ajoutant du code CSS :', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'desc'=> __('Les règles CSS entrées ci-contre seront ajoutées à votre site. Si les modifications sont trop importantes, songez plutôt à créer un thème enfant.', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_custom_css',
						'type'=> 'textarea');
						
						
	//Onglet Portfolio					
	$options[] = array(	'name'=> __('Portfolio', TEXT_TRANSLATION_DOMAIN),
						'type'=> 'heading');
						
	$options[] = array(	'name'=> __('Appel à l\'action', TEXT_TRANSLATION_DOMAIN),
						'desc'=> __("Définissez l'appel à l'action présent sur chaque page portfolio :", TEXT_TRANSLATION_DOMAIN),
						'type'=> 'info');
						
	$options[] = array( 'desc'=> __('Destination de l\'appel à l\'action (lien)', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_cta_url',
						'type'=> 'text');
						
	$options[] = array( 'desc'=> __("Texte accompagnant l'appel à l'action, soyez convaincant ;)", TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_cta_text',
						'type'=> 'textarea');
						
	$options[] = array( 'desc'=> __('Libellé du bouton (Exemple : "Contactez-moi").', TEXT_TRANSLATION_DOMAIN),
						'id'=> 'etendard_cta_bouton',
						'type'=> 'text');
	
	return $options;
}