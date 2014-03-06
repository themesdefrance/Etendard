<?php
//raw text
function cocoricoRawComponent($component){
	return $component->getName();
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'raw', 'cocoricoRawComponent');

//description
function cocoricoDescriptionComponent($component){
	return '<p class="description">'.$component->getName().'</p>';
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'description', 'cocoricoDescriptionComponent');

//link
function cocoricoLinkComponent($component, $href, $options=array()){
	$output = '<a';
	
	$attrs = array(
		'href'=>$href,
	);
	$attrs['class'] = (is_array($options['class'])) ? implode($options['class'], ' ') : $options['class'];
	
	foreach ($attrs as $name=>$value){
		$output .= ' '.$name.'="'.esc_attr($value).'"';
	}
	
	$output .= '>'.$component->getName().'</a>';
	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'link', 'cocoricoLinkComponent');

//nonce
function cocoricoNonceComponent($component, $action){
	return wp_nonce_field($action, $component->getName(), true, false);
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'nonce', 'cocoricoNonceComponent');

//label
function cocoricoLabelComponent($component, $for){
	$output = '<label for="'.esc_attr($for).'">'.$component->getName().'</label>';
	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'label', 'cocoricoLabelComponent');

//single general input
function cocoricoInputComponent($component, $options=array()){
	$options = array_merge(array(
		'type'=>'text',
		'class'=>array(),
	), $options);
	
	if ($component->getValue()) $value = $component->getValue();
	else if (isset($options['default'])) $value = $options['default'];
	
	//core attributes
	$attrs = array(
		'name'=>$component->getName(),
		'id'=>$component->getName(),
	);
	if (isset($value)) $attrs['value'] = $value;
	
	//optionnal attributes
	foreach ($options as $attr=>$value){
		switch ($attr){
			case 'class':
				$attrs['class'] = (is_array($value)) ? implode($value, ' ') : $value;
				break;
			case 'default':
				break;
			default:
				$attrs[$attr] = $value;
				break;
		}
	}
	
	$output = '<input';
	foreach ($attrs as $name=>$value){
		$output .= ' '.$name.'="'.esc_attr($value).'"';
	}
	$output .= ' />';
	
	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'input', 'cocoricoInputComponent');

//text input
function cocoricoTextComponent($component, $options=array()){
	$options = array_merge(array(
		'type'=>'text',
	), $options);
	return cocoricoInputComponent($component, $options);
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'text', 'cocoricoTextComponent');

//url input
function cocoricoURLComponent($component, $options=array()){
	$options = array_merge(array(
		'type'=>'url',
	), $options);
	return cocoricoInputComponent($component, $options);
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'url', 'cocoricoURLComponent');

//submit button
function cocoricoSubmitComponent($component, $options=array()){
	$options = array_merge(array(
		'type'=>'submit',
		'class'=>array('button', 'button-primary'),
		'default'=>'Save'
	), $options);
	return cocoricoInputComponent($component, $options);
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'submit', 'cocoricoSubmitComponent');

//radio button set
function cocoricoRadioComponent($component, $radios, $options=array()){
	$options = array_merge(array(
		'before'=>'',
		'after'=>''
	), $options);
	
	$output = '';
	$selected = $component->getValue();

	foreach ($radios as $label=>$value){
		$output .= $options['before'];
		$output .= '
		<label>
			<input type="radio" name="'.$component->getName().'" value="'.$value.'" '.(($selected == $value) ? 'checked="checked"' : '').' />
			'.$label.'
		</label>
		';
		$output .= $options['after'];
	}

	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'radio', 'cocoricoRadioComponent');

//checkbox button set
function cocoricoCheckboxComponent($component, $checkboxes, $options=array()){
	$options = array_merge(array(
		'before'=>'',
		'after'=>''
	), $options);
	
	$output = '';
	$selected = $component->getValue();
	if ($selected === false) $selected = array();
	
	foreach ($checkboxes as $label=>$value){
		$output .= $options['before'];
		$output .= '
		<label>
			<input type="checkbox" name="'.$component->getName().'[]" value="'.$value.'" '.((in_array($value, $selected)) ? 'checked="checked"' : '').' />
			'.$label.'
		</label>
		';
		$output .= $options['after'];
	}

	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'checkbox', 'cocoricoCheckboxComponent');

//color picker
function cocoricoColorComponent($component, $options=array()){
	$options = array_merge(array(
		'type'=>'text',
		'class'=>array('cocorico-colorpicker'),
		'default'=>'#333',
	), $options);
	return cocoricoInputComponent($component, $options);
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'color', 'cocoricoColorComponent');

function cocoricoUploadComponent($component, $options=array()){
	$value = $component->getValue();
	
	$output = '';
	$output .= '<input type="text" name="'.$component->getName().'" value="'.$value.'" class="cocorico-upload" />';
	$output .= '<input type="button" class="button cocorico-upload-button" value="Selectionner" />';
	
	if ($value){
		$matches = array();
		preg_match('/\.[a-zA-Z]+$/', $value, $matches);
		$extension = $matches[0];
		$iconUrl = includes_url().'images/crystal/';

		switch ($extension){
			case '.jpg':
			case '.png':
			case '.jpeg':
			case '.gif':
			case '.ico':
				$src = $value;
				break;
			case '.txt':
			case '.md':
				$src = $iconUrl.'text.png';
				break;
			case '.js':
			case '.php':
			case '.html':
			case '.css':
				$src = $iconUrl.'code.png';
				break;
			case '.zip':
			case '.rar':
			case '.7z':
				$src = $iconUrl.'archive.png';
				break;
			default:
				$src = $iconUrl.'default.png';
				break;
		}
	}
	else{
		$src = '';
	}
	
	$output .= '
		<div class="cocorico-preview-wrapper attachment" style="float: none; '.(($value) ? '' : 'display: none;').'">		
			<div class="attachment-preview" style="width: 150px; height: 150px; cursor: auto;">
				<img src="'.$src.'" alt="'.$component->getName().'" class="cocorico-preview icon" style="max-width: 100%; max-height: 80%;">
				
				<div class="filename">
					<div class="submitbox">
						<a href="#" class="cocorico-remove submitdelete">Effacer</a>
					</div>
				</div>			
			</div>
		</div>
	';
	
	return $output;
}
CocoDictionary::register(CocoDictionary::COMPONENT, 'upload', 'cocoricoUploadComponent');