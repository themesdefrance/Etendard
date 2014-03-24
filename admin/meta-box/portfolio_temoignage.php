<?php

$form = new Cocorico(false);
$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>'portfolio_temoin_nom',
					 'label'=>__('Nom', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'portfolio_temoin_texte',
					 'label'=>__('Témoignage', TEXT_TRANSLATION_DOMAIN)));
					 
$form->setting(array('type'=>'upload',
					 'name'=>'portfolio_temoin_portrait',
					 'label'=>__('Portrait', TEXT_TRANSLATION_DOMAIN),
					 'description'=>__('Taille optimale de 172x115 pixels', TEXT_TRANSLATION_DOMAIN)));

$form->endForm();
$form->render();