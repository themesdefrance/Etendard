<?php 

// Bouton
if (!function_exists('etendard_button')){
	function etendard_button($atts, $content=null){
		$nouvellefenetre='';
		if(isset($atts['nouvellefenetre']) && $atts['nouvellefenetre']=='oui'){
			$nouvellefenetre='target="_blank"';
		}
		return '<a href="'.$atts['lien'].'" class="bouton" '.$nouvellefenetre.'>'.$content.'</a>';
	}
	add_shortcode('bouton', 'etendard_button');
}

// Colonnes
if (!function_exists('etendard_shortcode_colonne')){
	function etendard_shortcode_colonne($class, $atts, $content){
		$premier = (isset($atts[0]) && trim($atts[0]) == 'premier') ? ' premier' : '';
		$res = '<div class="'.$class.$premier.'">';
		$res .= do_shortcode(wpautop($content));
		$res .= '</div>';
		return $res;
	}
}

// 1/2
if (!function_exists('etendard_un_demi')){
	function etendard_un_demi($atts, $content=null){
		return etendard_shortcode_colonne('un_demi', $atts, $content);
	}
	add_shortcode('un_demi', 'etendard_un_demi');
}

// 1/3
if (!function_exists('etendard_un_tiers')){
	function etendard_un_tiers($atts, $content=null){
		return etendard_shortcode_colonne('un_tiers', $atts, $content);
	}
	add_shortcode('un_tiers', 'etendard_un_tiers');
}

// 1/4
if (!function_exists('etendard_un_quart')){
	function etendard_un_quart($atts, $content=null){
		return etendard_shortcode_colonne('un_quart', $atts, $content);
	}
	add_shortcode('un_quart', 'etendard_un_quart');
}

// 2/3
if (!function_exists('etendard_deux_tiers')){
	function etendard_deux_tiers($atts, $content=null){
		return etendard_shortcode_colonne('deux_tiers', $atts, $content);
	}
	add_shortcode('deux_tiers', 'etendard_deux_tiers');
}

// 3/4
if (!function_exists('etendard_trois_quarts')){
	function etendard_trois_quarts($atts, $content=null){
		return etendard_shortcode_colonne('trois_quarts', $atts, $content);
	}
	add_shortcode('trois_quarts', 'etendard_trois_quarts');
}

// Messages

// Message par défaut
if (!function_exists('etendard_message')){
	function etendard_message($class, $content){
		$res = '<div class="message '.$class.'">';
		$res .= do_shortcode(wpautop($content));
		$res .= '</div>';
		return $res;
	}
}

// Info
if (!function_exists('etendard_message_info')){
	function etendard_message_info($atts, $content=null){
		return etendard_message('info', $content);
	}
	add_shortcode( 'info', 'etendard_message_info' );
}

// Alerte
if (!function_exists('etendard_message_alerte')){
	function etendard_message_alerte($atts, $content=null){
		return etendard_message('alerte', $content);
	}
	add_shortcode('alerte', 'etendard_message_alerte');
}

// Erreur
if (!function_exists('etendard_message_erreur')){
	function etendard_message_erreur($atts, $content=null){
		return etendard_message('erreur', $content);
	}
	add_shortcode('erreur', 'etendard_message_erreur');
}

// Succès
if (!function_exists('etendard_message_succes')){
	function etendard_message_succes($atts, $content=null){
		return etendard_message('succes', $content);
	}
	add_shortcode('succes', 'etendard_message_succes');
}

// Appel à l'action
// En largeur
if (!function_exists('etendard_appel_action')){
	function etendard_appel_action($atts, $content=null){
	
		$nouvellefenetre='';
		if(isset($atts['nouvellefenetre']) && $atts['nouvellefenetre']=='oui'){
			$nouvellefenetre='target="_blank"';
		}
		
		return '<div class="embedcta">
						<p class="cta-text">
							'.$content.'
						</p>
						<div class="button-wrapper">
							<a href="'.$atts['lien'].'" class="cta-button" '.$nouvellefenetre.'>'.$atts['bouton'].'</a>
						</div>
				</div>';
	}
	add_shortcode('appel_action', 'etendard_appel_action');
}

// Toggle
if (!function_exists('etendard_toggle')){
	function etendard_toggle($atts, $content = null) {
	
		$title = $atts['titre'];
		
		$res = '<h3 class="toggle icon-toright"><a href="#">'.$title.'</a></h3>';
		$res .= '<div class="toggle-content" style="display: none;"><p>';
		$res .= do_shortcode($content);
		$res .= '</p></div>';
		
	   return $res;
	}
}

add_shortcode('toggle', 'etendard_toggle');


// Separateur
if (!function_exists('etendard_separateur')){
	function etendard_separateur($atts, $content = null) {

		$res = '<div class="separateur"><hr></div>';
		
	   return $res;
	}
}

add_shortcode('separateur', 'etendard_separateur');
