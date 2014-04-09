<?php
$texte = $url = $bouton = '';
$template = basename(get_page_template());


//variables globales ou de page?
if ($template === 'template_home.php'){
	$custom = get_post_custom();
	
	$texte = (isset($custom['etendard_home_cta_text'])) ? $custom['etendard_home_cta_text'][0] : '';
	$url = (isset($custom['etendard_home_cta_url'])) ? $custom['etendard_home_cta_url'][0] : '';
	$bouton = (isset($custom['etendard_home_cta_bouton'])) ? $custom['etendard_home_cta_bouton'][0] : '';
}
else if (get_post_type() === 'portfolio'){
	$texte = get_option('etendard_cta_text');
	$url = get_option('etendard_cta_url');
	$bouton = get_option('etendard_cta_bouton');
}
?>
<?php if ($texte && $url): ?>
<section class="cta">
	<div class="wrapper">
		<p class="cta-text">
			<?php echo $texte; ?>
		</p>
		<div class="button-wrapper">
			<a href="<?php echo esc_attr($url); ?>" class="cta-button">
				<?php if ($bouton): ?>
					<?php echo esc_html($bouton); ?>
				<?php else: ?>
					<?php _e('Cliquez ici', TEXT_TRANSLATION_DOMAIN); ?>
				<?php endif; ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>