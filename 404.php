<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">
		<h2 class="section-title">
			<?php _e('Oups', TEXT_TRANSLATION_DOMAIN); ?>
		</h2>
		<div>
			<p>
				<?php printf(__("La page demandée n'à pas été trouvée. Essayez de lancer une recherche ou <a href=\"%s\">retourner à l'accueil</a> ?", TEXT_TRANSLATION_DOMAIN), home_url()); ?>
			</p>
		</div>
	</div>
</section>
<?php get_footer(); ?>