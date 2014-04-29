<?php
$form = new Cocorico();

$form->startWrapper('titre');
$form->component('raw', __('Options Étendard', TEXT_TRANSLATION_DOMAIN));
$form->endWrapper('titre');

$form->groupHeader(array('general'=>__('Général', TEXT_TRANSLATION_DOMAIN), 
						 'apparence'=>__('Apparence', TEXT_TRANSLATION_DOMAIN), 
						 'portfolio'=>__('Portfolio', TEXT_TRANSLATION_DOMAIN)));

//Tab general
$form->startWrapper('tab', 'general');

$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>substr(EDD_SL_LICENSE_KEY, strlen(COCORICO_PREFIX)),
					 'label'=>__("Licence", TEXT_TRANSLATION_DOMAIN),
					 'description'=>__("Entrez la licence pour qu'Étendard puisse recevoir les mises à jour. Vous pourrez la trouver dans l'email que nous vous avons envoyé suite à votre commande.", TEXT_TRANSLATION_DOMAIN)));

$form->setting(array('type'=>'text',
					 'name'=> 'title',
					 'label'=>__("Titre", TEXT_TRANSLATION_DOMAIN),
					 'description'=>__("Titre dans le bandeau de la page d'accueil.", TEXT_TRANSLATION_DOMAIN),
					 'options'=>array(
					 	'default'=>get_bloginfo('name')
					 	)
					 ));

$form->setting(array('type'=>'text',
					 'name'=>'subtitle',
					 'label'=>__("Sous-titre", TEXT_TRANSLATION_DOMAIN),
					 'description'=>__("Sous-titre dans le bandeau.", TEXT_TRANSLATION_DOMAIN),
					 'options'=>array(
					 	'default'=>get_bloginfo('description')
					 	)
					 ));

$form->ordre('home_blocks',
				__("Choisissez les éléments à afficher sur la page d'accueil et réorganisez-les avec des glisser déposer:", TEXT_TRANSLATION_DOMAIN),
				array(  'titre'=>__('Titre et slogan', TEXT_TRANSLATION_DOMAIN),
						'diaporama'=>__('Diaporama', TEXT_TRANSLATION_DOMAIN),
						'content'=>__('Contenu', TEXT_TRANSLATION_DOMAIN),
						'cta'=>__("Appel à l'action", TEXT_TRANSLATION_DOMAIN),
						'services'=>__('Liste de vos services', TEXT_TRANSLATION_DOMAIN),
						'portfolio'=>__('Derniers éléments du portfolio', TEXT_TRANSLATION_DOMAIN),
						'articles'=>__('Derniers articles', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'footer_gauche',
					 'label'=>__("Pied de page", TEXT_TRANSLATION_DOMAIN),
					 'description'=>__('Contenu de la partie gauche du pied de page. Les balises HTML de lien (&lt;a href=&quot;LIEN&quot;&gt;TEXTE_LIEN&lt;/a&gt;), de mise en gras (&lt;strong&gt;TEXTE_GRAS&lt;/strong&gt;), de mise en italique(&lt;em&gt;TEXTE_ITALIQUE&lt;/em&gt;) et d\'image (&lt;img src=&quot;ADRESSE_IMAGE&quot;&gt;) sont autoris&eacute;es. Laissez vide pour ne rien afficher.', TEXT_TRANSLATION_DOMAIN),
					 'options'=>array(
					 	'default'=>__('<strong>2014</strong> - Étendard par <a href="https://www.themesdefrance.fr" target="_blank">Thèmes de France</a>', TEXT_TRANSLATION_DOMAIN)
					 	)
					 ));

$form->endForm();
$form->endWrapper('tab');

//Tab apparence
$form->startWrapper('tab', 'apparence');

$form->startForm();

$form->setting(array('type'=>'color',
					 'name'=>'color',
					 'label'=>__("Couleur principale", TEXT_TRANSLATION_DOMAIN),
					 'description'=>__("Cette couleur sera utilisée pour mettre en valeur les boutons, les liens et d'autres d'Étendard.", TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'upload',
					 'name'=>'logo',
					 'label'=>__('Logo', TEXT_TRANSLATION_DOMAIN),
					 'description'=>__('Le fichier image doit être au format JPG ou PNG. Notez également que la taille optimale est de 280px par 60px.', TEXT_TRANSLATION_DOMAIN)));
					
$form->setting(array('type'=>'radio',
					 'label'=>__('Largeur des diaporamas', TEXT_TRANSLATION_DOMAIN),
					 'name'=>'diaporama_width',
					 'radios'=>array(
						 'auto'=>__('Cadré', TEXT_TRANSLATION_DOMAIN),
						 'full'=>__('Plein écran', TEXT_TRANSLATION_DOMAIN)
					 ),
					 'options'=>array(
					 	'after'=>'<br/>',
					 	'default'=>'auto'
					 )));					 
 
$form->setting(array('type'=>'text',
					 'name'=>'diaporama_height',
					 'label'=>__("Hauteur des diaporamas (en pixels)", TEXT_TRANSLATION_DOMAIN),
					 'options'=>array(
					 	'default'=>500,
					 )));
					 
$form->setting(array('type'=>'radio',
					 'label'=>__('Barre latérale', TEXT_TRANSLATION_DOMAIN),
					 'name'=>'sidebar_position',
					 'radios'=>array(
						 'droite'=>__('Droite', TEXT_TRANSLATION_DOMAIN),
						 'gauche'=>__('Gauche', TEXT_TRANSLATION_DOMAIN)
					 ),
					 'options'=>array('after'=>'<br/>'),
					 'description'=>__('La barre latérale (également appelée "sidebar") peut se positionner à droite ou à gauche du contenu principal. La plupart des sites la placent à droite mais vous pouvez faire l\'inverse :)', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'custom_css',
					 'label'=>__('CSS Supplémentaire', TEXT_TRANSLATION_DOMAIN),
					 'description'=>__('Les règles CSS entrées ci-contre seront ajoutées à votre site. Si les modifications sont trop importantes, songez plutôt à créer un thème enfant.', TEXT_TRANSLATION_DOMAIN)));

$form->endForm();
$form->endWrapper('tab');

//Tab portfolio
$form->startWrapper('tab', 'portfolio');

$form->startForm();

$form->setting(array('type'=>'boolean',
					 'label'=>__('Afficher les extraits', TEXT_TRANSLATION_DOMAIN),
					 'name'=>'extraits_portfolio',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'description'=>__('Affichez ou non les extraits des éléments portfolios sur la page des projets', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'boolean',
					 'label'=>__('Afficher les boutons', TEXT_TRANSLATION_DOMAIN),
					 'name'=>'boutons_portfolio',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'description'=>__('Affichez ou non les boutons des éléments portfolio sur la page des projets', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'text',
					 'name'=>'cta_url',
					 'label'=>__("Destination de l'appel à l'action (lien)", TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'cta_text',
					 'label'=>__("Texte accompagnant l'appel à l'action, soyez convaincant ;)", TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'text',
					 'name'=>'cta_bouton',
					 'label'=>__('Libellé du bouton (Exemple : "Contactez-moi").', TEXT_TRANSLATION_DOMAIN)));

$form->endForm();
$form->endWrapper('tab');

$form->component('submit', 'submit', array('value'=>__('Sauvegarder les réglages', TEXT_TRANSLATION_DOMAIN)));

$form->render();