<?php

$fields = get_option('etendard_portfolio_fields');

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