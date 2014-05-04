<?php get_header(); ?>

<section class="blog">
	<div class="wrapper">
		<h1 class="header-title">
			<?php _e('Oups, vous voici dans une impasse…', 'etendard'); ?>
		</h1>
		<div class="content">
			<img src="<?php echo get_stylesheet_directory_uri()."/img/triste.png" ?>" alt="<?php _e('Erreur 404', 'etendard'); ?>" class="smiley-404">
			<p>
				<?php printf(__("La page demandée n'a pas été trouvée. <a href=\"%s\">Cliquez ici</a> retourner sur la page d'accueil.", 'etendard'), home_url()); ?>
			</p>
		</div>
	</div>
</section>
<?php get_footer(); ?>