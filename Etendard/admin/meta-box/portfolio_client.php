<?php

$form = new Cocorico(false);
$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>'portfolio_client',
					 'label'=>__('Client', TEXT_TRANSLATION_DOMAIN)));
$form->setting(array('type'=>'url',
					 'name'=>'portfolio_url',
					 'label'=>__('URL', TEXT_TRANSLATION_DOMAIN)));

$form->endForm();
$form->render();