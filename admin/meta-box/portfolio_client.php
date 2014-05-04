<?php

etendard_meta_migration('_etendard_Client', 'etendard_portfolio_client');
etendard_meta_migration('_etendard_URL', 'etendard_portfolio_url');

$fields = get_option('etendard_portfolio_fields');
if (!$fields) $fields = array();

$form = new Cocorico(false);
$form->startForm();

foreach ($fields as $field){
	if (trim($field) === '') continue;
	
	$form->setting(array('type'=>'text',
						 'name'=>'_'.$field,
						 'label'=>$field));
}

$form->endForm();
$form->render();