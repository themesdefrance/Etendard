<?php
$form = new Cocorico();

$form->groupHeader(array('general', 'apparence', 'portfolio'));

//Tab general
$form->startWrapper('tab', 'general');
$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>EDD_SL_LICENSE_KEY,
					 'label'=>__("Licence", TEXT_TRANSLATION_DOMAIN),
					 'description'=>__("Entrez la licence pour qu'Étendard puisse recevoir les mises à jour. Vous pourrez la trouver dans l'email que nous vous avons envoyé suite à votre commande.", TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'checkbox',
					 'label'=>__("Choisissez les éléments à afficher sur la page d'accueil :", TEXT_TRANSLATION_DOMAIN),
					 'name'=>'blocks_presence',
					 'checkboxes'=>array(
					 	__('Titre et slogan', TEXT_TRANSLATION_DOMAIN)=>'titre',
						__('Diaporama', TEXT_TRANSLATION_DOMAIN)=>'diaporama',
						__('Contenu', TEXT_TRANSLATION_DOMAIN)=>'content',
						__("Appel à l'action", TEXT_TRANSLATION_DOMAIN)=>'cta',
						__('Liste de vos services', TEXT_TRANSLATION_DOMAIN)=>'services',
						__('Derniers éléments du portfolio', TEXT_TRANSLATION_DOMAIN)=>'portfolio',
						__('Derniers articles', TEXT_TRANSLATION_DOMAIN)=>'articles',
					 ),
					 'options'=>array('after'=>'<br/>')));
					 
//$form->setting(array('type'=>'textarea',
//					 'name'=>'etendard_footer_gauche',
//					 'label'=>__("Pied de page", TEXT_TRANSLATION_DOMAIN),
//					 'description'=>__('Contenu de la partie gauche du pied de page. Les balises HTML de lien (&lt;a href=&quot;LIEN&quot;&gt;TEXTE_LIEN&lt;/a&gt;), de mise en gras (&lt;strong&gt;TEXTE_GRAS&lt;/strong&gt;), de mise en italique(&lt;em&gt;TEXTE_ITALIQUE&lt;/em&gt;) et d\'image (&lt;img src=&quot;ADRESSE_IMAGE&quot;&gt;) sont autoris&eacute;es. Laissez vide pour ne rien afficher.', TEXT_TRANSLATION_DOMAIN)));

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
					 'description'=>__('Le fichier image doit être au format JPG ou PNG. Notez également que la taille optimale est de 280px par 72px.', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'radio',
					 'label'=>__('Barre latérale', TEXT_TRANSLATION_DOMAIN),
					 'name'=>'sidebar_position',
					 'radios'=>array(
						 __('Droite', TEXT_TRANSLATION_DOMAIN)=>'droite', 
						 __('Gauche', TEXT_TRANSLATION_DOMAIN)=>'gauche'
					 ),
					 'options'=>array('after'=>'<br/>'),
					 'description'=>__('La barre latérale (également appelée "sidebar") peut se positionner à droite ou à gauche du contenu principal. La plupart des sites la placent à droite mais vous pouvez faire l\'inverse :)', TEXT_TRANSLATION_DOMAIN)));
					 
//$form->setting(array('type'=>'textarea',
//					 'name'=>'custom_css',
//					 'label'=>__('CSS Supplémentaire', TEXT_TRANSLATION_DOMAIN),
//					 'description'=>__('Les règles CSS entrées ci-contre seront ajoutées à votre site. Si les modifications sont trop importantes, songez plutôt à créer un thème enfant.', TEXT_TRANSLATION_DOMAIN)));

$form->endForm();
$form->endWrapper('tab');

//Tab portfolio
$form->startWrapper('tab', 'portfolio');
$form->startForm();

$form->setting(array('type'=>'radio',
					 'label'=>__('Afficher les extraits', TEXT_TRANSLATION_DOMAIN),
					 'name'=>'extraits_portfolio',
					 'radios'=>array(
						 __('Oui', TEXT_TRANSLATION_DOMAIN)=>'oui', 
						 __('Non', TEXT_TRANSLATION_DOMAIN)=>'non'
					 ),
					 'options'=>array('after'=>'<br/>'),
					 'description'=>__('Affichez ou non les extraits des éléments portfolios sur la page des projets', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'radio',
					 'label'=>__('Afficher les boutons', TEXT_TRANSLATION_DOMAIN),
					 'name'=>'boutons_portfolio',
					 'radios'=>array(
						 __('Oui', TEXT_TRANSLATION_DOMAIN)=>'oui', 
						 __('Non', TEXT_TRANSLATION_DOMAIN)=>'non'
					 ),
					 'options'=>array('after'=>'<br/>'),
					 'description'=>__('Affichez ou non les boutons des éléments portfolio sur la page des projets', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'text',
					 'name'=>'cta_url',
					 'label'=>__("Destination de l'appel à l'action (lien)", TEXT_TRANSLATION_DOMAIN)));
					 
//$form->setting(array('type'=>'textarea',
//					 'name'=>'cta_text',
//					 'label'=>__("Texte accompagnant l'appel à l'action, soyez convaincant ;)", TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'text',
					 'name'=>'cta_bouton',
					 'label'=>__('Libellé du bouton (Exemple : "Contactez-moi").', TEXT_TRANSLATION_DOMAIN)));

$form->endForm();
$form->endWrapper('tab');

$form->component('submit', 'submit', array('value'=>__('Sauvegarder les réglages', TEXT_TRANSLATION_DOMAIN)));

$form->render();