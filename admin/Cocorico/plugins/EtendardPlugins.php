<?php
function etendardDiapramaComponent($component){
	$saved = $component->getValue();
	$liens = CocoRequest::request($component->getName().'_lien');
	$liens = $component->getStore()->get($component->getName().'_lien');
	
	$output = '<table class="form-table etendard_diaporama_form">';
	
	foreach ($saved as $index=>$img){
		$output .='
		<tr class="etendard_diaporama_one">
			<th scope="row">
				<label>
					<span>'.__('Image', TEXT_TRANSLATION_DOMAIN).'</span>:
				</label>
			</th>
			<td>
				<input type="text" name="'.$component->getName().'[]" value="'.esc_attr($img).'" />
				<input type="button" class="button button-primary button-medium etendard_portfolio_upload_button" name="etendard_portfolio_diaporama_button" value="'.esc_attr(__('Charger', TEXT_TRANSLATION_DOMAIN)).'" />';
				
				
		if ($index < count($saved)-1){
			$output .= '<a href="#" class="delete">'.__('Supprimer', TEXT_TRANSLATION_DOMAIN).'</a>';
		}
				
		$output .= '
			</td>
			<th scope="row">
				<label>
					<span>'.__('Lien (optionnel)', TEXT_TRANSLATION_DOMAIN).'</span>:
				</label>
			</th>
			<td>
				<input type="url" name="'.$component->getName().'_lien[]" value="'.((isset($liens[$index])) ?  $liens[$index] : '').'" />
			</td>
		</tr>
		';
	}
	
	$output.= '</table>';
	
	wp_register_script('etendard_cocorico', COCORICO_URI.'/frontend/etendard.js', array('jquery'), '1', true);
	wp_enqueue_script('etendard_cocorico');
	
	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'etendard-diaporama', 'etendardDiapramaComponent');

function etendardDiapramaFilter($value, $component){
	$regularName = $component->getName();
	$linkName = $regularName.'_lien';
	$links = CocoRequest::request($linkName);
	
	$component->getStore()->set($regularName, $value);
	$component->getStore()->set($linkName, $links);
	return $value;
}
CocoDictionary::register(CocoDictionary::FILTER, 'diaporama-save', 'etendardDiapramaFilter');