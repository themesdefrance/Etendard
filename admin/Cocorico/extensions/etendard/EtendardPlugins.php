<?php

function etendardDiaporamaShorthand($cocorico, $name){
	$images = CoCoRequest::request($name);
	if (!$images) $images = $cocorico->getStore()->get($name);
	
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
		)->filter('save');
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
		)->filter('save');
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
		)->filter('save');
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

//function etendardDiapramaComponent($component){
//	$saved = $component->getValue();
//	$liens = CocoRequest::request($component->getName().'_lien');
//	$liens = $component->getStore()->get($component->getName().'_lien');
//	
//	$output = '<table class="form-table etendard_diaporama_form">';
//	
//	foreach ($saved as $index=>$img){
//		$output .='
//		<tr class="etendard_diaporama_one">
//			<th scope="row">
//				<label>
//					<span>'.__('Image', TEXT_TRANSLATION_DOMAIN).'</span>:
//				</label>
//			</th>
//			<td>
//				<input type="text" name="'.$component->getName().'[]" value="'.esc_attr($img).'" />
//				<input type="button" class="button button-primary button-medium etendard_portfolio_upload_button" name="etendard_portfolio_diaporama_button" value="'.esc_attr(__('Charger', TEXT_TRANSLATION_DOMAIN)).'" />';
//				
//				
//		if ($index < count($saved)-1){
//			$output .= '<a href="#" class="delete">'.__('Supprimer', TEXT_TRANSLATION_DOMAIN).'</a>';
//		}
//				
//		$output .= '
//			</td>
//			<th scope="row">
//				<label>
//					<span>'.__('Lien (optionnel)', TEXT_TRANSLATION_DOMAIN).'</span>:
//				</label>
//			</th>
//			<td>
//				<input type="url" name="'.$component->getName().'_lien[]" value="'.((isset($liens[$index])) ?  $liens[$index] : '').'" />
//			</td>
//		</tr>
//		';
//	}
//	
//	$output.= '</table>';
//	
//	wp_register_script('etendard_cocorico', COCORICO_URI.'/frontend/etendard.js', array('jquery'), '1', true);
//	wp_enqueue_script('etendard_cocorico');
//	
//	return $output;
//}
//CocoDictionary::register(CocoDictionary::COMPONENT, 'etendard-diaporama', 'etendardDiapramaComponent');
//
//function etendardDiapramaFilter($value, $component){
//	$regularName = $component->getName();
//	$linkName = $regularName.'_lien';
//	$links = CocoRequest::request($linkName);
//	
//	$component->getStore()->set($regularName, $value);
//	$component->getStore()->set($linkName, $links);
//	return $value;
//}
//CocoDictionary::register(CocoDictionary::FILTER, 'diaporama-save', 'etendardDiapramaFilter');