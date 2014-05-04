<?php
$form = new Cocorico();

$form->startWrapper('titre');
$form->component('raw', __('Options Étendard', 'etendard'));
$form->endWrapper('titre');

$form->groupHeader(array('general'=>__('Général', 'etendard'), 
						 'apparence'=>__('Apparence', 'etendard'), 
						 'portfolio'=>__('Portfolio', 'etendard')));

//Tab general
$form->startWrapper('tab', 'general');

$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>substr(EDD_SL_LICENSE_KEY, strlen(COCORICO_PREFIX)),
					 'label'=>__("Licence", 'etendard'),
					 'description'=>__("Entrez la licence pour qu'Étendard puisse recevoir les mises à jour. Vous pourrez la trouver dans l'email que nous vous avons envoyé suite à votre commande.", 'etendard')));

$form->setting(array('type'=>'text',
					 'name'=> 'title',
					 'label'=>__("Titre", 'etendard'),
					 'description'=>__("Titre dans le bandeau de la page d'accueil.", 'etendard'),
					 'options'=>array(
					 	'default'=>get_bloginfo('name')
					 	)
					 ));

$form->setting(array('type'=>'text',
					 'name'=>'subtitle',
					 'label'=>__("Sous-titre", 'etendard'),
					 'description'=>__("Sous-titre dans le bandeau.", 'etendard'),
					 'options'=>array(
					 	'default'=>get_bloginfo('description')
					 	)
					 ));

$form->ordre('home_blocks',
				__("Choisissez les éléments à afficher sur la page d'accueil et réorganisez-les avec des glisser déposer:", 'etendard'),
				array(  'titre'=>__('Titre et slogan', 'etendard'),
						'diaporama'=>__('Diaporama', 'etendard'),
						'content'=>__('Contenu', 'etendard'),
						'cta'=>__("Appel à l'action", 'etendard'),
						'services'=>__('Liste de vos services', 'etendard'),
						'portfolio'=>__('Derniers éléments du portfolio', 'etendard'),
						'articles'=>__('Derniers articles', 'etendard')));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'footer_gauche',
					 'label'=>__("Pied de page", 'etendard'),
					 'description'=>__('Contenu de la partie gauche du pied de page. Les balises HTML de lien (&lt;a href=&quot;LIEN&quot;&gt;TEXTE_LIEN&lt;/a&gt;), de mise en gras (&lt;strong&gt;TEXTE_GRAS&lt;/strong&gt;), de mise en italique(&lt;em&gt;TEXTE_ITALIQUE&lt;/em&gt;) et d\'image (&lt;img src=&quot;ADRESSE_IMAGE&quot;&gt;) sont autoris&eacute;es. Laissez vide pour ne rien afficher.', 'etendard'),
					 'options'=>array(
					 	'default'=>__('<strong>2014</strong> - Étendard par <a href="https://www.themesdefrance.fr" target="_blank">Thèmes de France</a>', 'etendard')
					 	)
					 ));

$form->endForm();
$form->endWrapper('tab');

//Tab apparence
$form->startWrapper('tab', 'apparence');

$form->startForm();

$form->setting(array('type'=>'color',
					 'name'=>'color',
					 'label'=>__("Couleur principale", 'etendard'),
					 'description'=>__("Cette couleur sera utilisée pour mettre en valeur les boutons, les liens et d'autres d'Étendard.", 'etendard')));
					 
$form->setting(array('type'=>'upload',
					 'name'=>'logo',
					 'label'=>__('Logo', 'etendard'),
					 'description'=>__('Le fichier image doit être au format JPG ou PNG. Notez également que la taille optimale est de 280px par 60px.', 'etendard')));
					
$form->setting(array('type'=>'radio',
					 'label'=>__('Largeur des diaporamas', 'etendard'),
					 'name'=>'diaporama_width',
					 'radios'=>array(
						 'auto'=>__('Cadré', 'etendard'),
						 'full'=>__('Plein écran', 'etendard')
					 ),
					 'options'=>array(
					 	'after'=>'<br/>',
					 	'default'=>'auto'
					 )));					 
 
$form->setting(array('type'=>'text',
					 'name'=>'diaporama_height',
					 'label'=>__("Hauteur des diaporamas (en pixels)", 'etendard'),
					 'options'=>array(
					 	'default'=>500,
					 )));
					 
$form->setting(array('type'=>'radio',
					 'label'=>__('Barre latérale', 'etendard'),
					 'name'=>'sidebar_position',
					 'radios'=>array(
						 'droite'=>__('Droite', 'etendard'),
						 'gauche'=>__('Gauche', 'etendard')
					 ),
					 'options'=>array('after'=>'<br/>'),
					 'description'=>__('La barre latérale (également appelée "sidebar") peut se positionner à droite ou à gauche du contenu principal. La plupart des sites la placent à droite mais vous pouvez faire l\'inverse :)', 'etendard')));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'custom_css',
					 'label'=>__('CSS Supplémentaire', 'etendard'),
					 'description'=>__('Les règles CSS entrées ci-contre seront ajoutées à votre site. Si les modifications sont trop importantes, songez plutôt à créer un thème enfant.', 'etendard')));

$form->endForm();
$form->endWrapper('tab');

//Tab portfolio
$form->startWrapper('tab', 'portfolio');

$form->startForm();

$form->setting(array('type'=>'boolean',
					 'label'=>__('Afficher les extraits', 'etendard'),
					 'name'=>'extraits_portfolio',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'description'=>__('Affichez ou non les extraits des éléments portfolios sur la page des projets', 'etendard')));
					 
$form->setting(array('type'=>'boolean',
					 'label'=>__('Afficher les boutons', 'etendard'),
					 'name'=>'boutons_portfolio',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'description'=>__('Affichez ou non les boutons des éléments portfolio sur la page des projets', 'etendard')));
					 
$form->setting(array('type'=>'text',
					 'name'=>'cta_url',
					 'label'=>__("Destination de l'appel à l'action (lien)", 'etendard')));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'cta_text',
					 'label'=>__("Texte accompagnant l'appel à l'action, soyez convaincant ;)", 'etendard')));
					 
$form->setting(array('type'=>'text',
					 'name'=>'cta_bouton',
					 'label'=>__('Libellé du bouton (Exemple : "Contactez-moi").', 'etendard')));

$form->endForm();
$form->endWrapper('tab');

$form->component('submit', 'submit', array('value'=>__('Sauvegarder les réglages', 'etendard')));

$form->render();