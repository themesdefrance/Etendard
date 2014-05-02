<?php

etendard_meta_migration('_etendard_portfolio_temoin_nom', 'etendard_portfolio_temoin_nom');
etendard_meta_migration('_etendard_portfolio_temoin_texte', 'etendard_portfolio_temoin_texte');
etendard_meta_migration('_etendard_portfolio_temoin_portrait', 'etendard_portfolio_temoin_portrait');

$form = new Cocorico(false);
$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>'_portfolio_temoin_nom',
					 'label'=>__('Nom', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'_portfolio_temoin_texte',
					 'label'=>__('Témoignage', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'upload',
					 'name'=>'_portfolio_temoin_portrait',
					 'label'=>__('Portrait', TEXT_TRANSLATION_DOMAIN),
					 'description'=>__('Taille optimale de 160x110 pixels', TEXT_TRANSLATION_DOMAIN)));

$form->endForm();
$form->render();