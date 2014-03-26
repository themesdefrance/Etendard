<?php

function etendardDiaporamaShorthand($cocorico, $name){
	$images = CoCoRequest::request($name);
	if (!$images) $images = $cocorico->getStore()->get($name);
	if (!$images) $images = array();
	
	$liens = CoCoRequest::request($name.'_lien');
	if (!$liens) $liens = $cocorico->getStore()->get($name.'_lien');
	
	$titres = CoCoRequest::request($name.'_titre');
	if (!$titres) $titres = $cocorico->getStore()->get($name.'_titre');
	
	$cocorico->startForm();
	
	foreach ($images as $index=>$img){
		$cocorico->startWrapper('tr');
		$cocorico->startWrapper('th');
		$cocorico->component('raw', __('Diaporama', TEXT_TRANSLATION_DOMAIN).' #'.($index+1));
		$cocorico->endWrapper('th');
		$cocorico->endWrapper('tr');
		
		$cocorico->startWrapper('tr');
		
		$cocorico->startWrapper('th');
		//THIS MAKES NO SENSE, INVERTARGS
		$cocorico->component('label', $name.'-upload-'.$index, __('Image', TEXT_TRANSLATION_DOMAIN));
		$cocorico->endWrapper('th');
		
		$cocorico->startWrapper('td');
		$cocorico->component(
			'upload', 
			$name,
			array(
				'value'=>$img,
				'id'=>$name.'-upload-'.$index,
				'name'=>$name.'[]',
			)
		)->filter('stripslashes')->filter('save');
		$cocorico->endWrapper('td');
		
		$cocorico->endWrapper('tr');
		
		$cocorico->startWrapper('tr');
		
		$cocorico->startWrapper('th');
		//THIS MAKES NO SENSE, INVERTARGS
		$cocorico->component('label', $name.'-link-'.$index, __('Lien', TEXT_TRANSLATION_DOMAIN));
		$cocorico->endWrapper('th');
		
		$cocorico->startWrapper('td');
		$cocorico->component(
			'text', 
			$name.'_lien',
			array(
				'name'=>$name.'_lien[]',
				'value'=>$liens[$index],
				'id'=>$name.'-link-'.$index,
			)
		)->filter('stripslashes')->filter('save');
		$cocorico->endWrapper('td');
		
		$cocorico->startWrapper('th');
		//THIS MAKES NO SENSE, INVERTARGS
		$cocorico->component('label', $name.'-title-'.$index, __('Titre', TEXT_TRANSLATION_DOMAIN));
		$cocorico->endWrapper('th');
		
		$cocorico->startWrapper('td');
		$cocorico->component(
			'text', 
			$name.'_titre',
			array(
				'name'=>$name.'_titre[]',
				'value'=>$titres[$index],
				'id'=>$name.'-title-'.$index,
			)
		)->filter('stripslashes')->filter('save');
		$cocorico->endWrapper('td');
		
		$cocorico->startWrapper('td');
		$cocorico->component('link', '#', __('Supprimer', TEXT_TRANSLATION_DOMAIN), array(
			'class'=>'submitdelete etendard-delete-diaporama',
			'style'=>'color: #A00;'
		));
		$cocorico->endWrapper('td');
		
		$cocorico->endWrapper('tr');
	}
	
	$cocorico->endForm();
	
	$cocorico->component('input', 'upload-add', array(
		'type'=>'button',
		'class'=>array('button', 'button-primary', 'etendard-diaporama-add'),
		'value'=>__('Ajouter', TEXT_TRANSLATION_DOMAIN)
	));
	
	wp_register_script('etendard_cocorico', COCORICO_URI.'/extensions/etendard/etendard.js', array('jquery'), '1', true);
	wp_enqueue_script('etendard_cocorico');
}
CocoDictionary::register(CocoDictionary::SHORTHAND, 'diaporama', 'etendardDiaporamaShorthand');

function etendardTitreWrapper($content){
	$output = '<h2 style="font-size: 23px;font-weight: 400;padding: 9px 15px 4px 0px;line-height: 29px;">';
	$output .= $content;
	$output .= '</h2>';
	return $output;
}
CocoDictionary::register(CocoDictionary::WRAPPER, 'titre', 'etendardTitreWrapper');