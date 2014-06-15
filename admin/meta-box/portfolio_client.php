<?php

etendard_meta_migration('_etendard_Client', 'etendard_portfolio_client');
etendard_meta_migration('_etendard_URL', 'etendard_portfolio_url');

$fields = get_option('etendard_portfolio_fields');
if (!$fields) $fields = array();

$form = new Cocorico(ETENDARD_COCORICO_PREFIX, false);
$form->startForm();

foreach ($fields as $field){
	if(count($fields)>1){

		if (trim($field) === '') continue;
		
		$form->setting(array('type'=>'text',
							 'name'=>'_'.$field,
							 'label'=>$field));
	}
	else{
		printf(__('Aucune information complémentaire n\'a été définie. Pour en ajouter, rendez-vous dans l\'onglet portfolio <a href="%s" >des options d\'Étendard</a>.','etendard') , admin_url('themes.php?page=etendard_options'));
	}
}

$form->endForm();
$form->render();