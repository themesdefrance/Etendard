<?php

etendard_meta_migration('_etendard_home_cta_url', 'etendard_home_cta_url');
etendard_meta_migration('_etendard_home_cta_text', 'etendard_home_cta_text');
etendard_meta_migration('_etendard_home_cta_bouton', 'etendard_home_cta_bouton');

$form = new Cocorico(false);
$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>'_home_cta_url',
					 'label'=>__("Destination de l'appel à l'action (lien)", TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'_home_cta_text',
					 'label'=>__("Texte d'accompagnement", TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'text',
					 'name'=>'_home_cta_bouton',
					 'label'=>__('Texte du bouton', TEXT_TRANSLATION_DOMAIN)));

$form->endForm();
$form->render();