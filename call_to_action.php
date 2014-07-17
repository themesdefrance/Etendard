<?php
$text = $url = $bouton = '';
$template = basename(get_page_template());


//variables globales ou de page?
if ($template === 'template_home.php'){
	$text = etendard_meta_migration('_etendard_home_cta_text', 'etendard_home_cta_text');
	$url = etendard_meta_migration('_etendard_home_cta_url', 'etendard_home_cta_url');
	$bouton = etendard_meta_migration('_etendard_home_cta_bouton', 'etendard_home_cta_bouton');
	
	$text = ($text) ? $text[0] : '';
	$url = ($url) ? $url[0] : '';
	$bouton = ($bouton) ? $bouton[0] : '';
}
else if (get_post_type() === 'portfolio'){
	$text = get_option('etendard_cta_text');
	$url = get_option('etendard_cta_url');
	$bouton = get_option('etendard_cta_bouton');
}
?>
<?php if ($text && $url): ?>
<section class="cta">
	<div class="wrapper">
		<p class="cta-text">
			<?php echo $text; ?>
		</p>
		<div class="button-wrapper">
			<a href="<?php echo esc_attr($url); ?>" class="cta-button">
				<?php if ($bouton): ?>
					<?php echo esc_html($bouton); ?>
				<?php else: ?>
					<?php echo apply_filters('etendard_cta_button', __('Click here', 'etendard')); ?>
				<?php endif; ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>