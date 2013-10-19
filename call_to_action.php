<?php if (get_option("etendard_cta_texte") && get_option("etendard_cta_url")): ?>
<section class="cta">
	<div class="wrapper">
		<p class="cta-text">
			<?php echo get_option("etendard_cta_texte"); ?>
		</p>
		<div class="button-wrapper">
			<a href="<?php echo esc_attr(get_option('etendard_cta_url'))?>" class="cta-button">
				<?php if (get_option("etendard_cta_bouton")){ ?>
					<?php echo esc_html(get_option("etendard_cta_bouton")); ?>
				<?php } else { ?>
					<?php _e('Cliquez ici', TEXT_TRANSLATION_DOMAIN); ?>
				<?php } ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>