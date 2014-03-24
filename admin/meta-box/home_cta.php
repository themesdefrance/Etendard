<?php

$form = new Cocorico(false);
$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>'home_cta_url',
					 'label'=>__("Destination de l'appel à l'action (lien)", TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'home_cta_text',
					 'label'=>__("Texte d'accompagnement", TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'text',
					 'name'=>'home_cta_bouton',
					 'label'=>__('Texte du bouton', TEXT_TRANSLATION_DOMAIN)));

$form->endForm();
$form->render();