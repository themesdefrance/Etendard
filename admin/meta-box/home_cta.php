<?php

etendard_meta_migration('_etendard_home_cta_url', 'etendard_home_cta_url');
etendard_meta_migration('_etendard_home_cta_text', 'etendard_home_cta_text');
etendard_meta_migration('_etendard_home_cta_bouton', 'etendard_home_cta_bouton');

$form = new Cocorico(ETENDARD_COCORICO_PREFIX, false);
$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>'_home_cta_url',
					 'label'=>__("Destination de l'appel à l'action (lien)", 'etendard')));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'_home_cta_text',
					 'label'=>__("Texte d'accompagnement", 'etendard')));
					 
$form->setting(array('type'=>'text',
					 'name'=>'_home_cta_bouton',
					 'label'=>__('Texte du bouton', 'etendard')));

$form->endForm();
$form->render();