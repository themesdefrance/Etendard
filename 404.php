<?php 
// On sort si on accède directement au fichier

if ( ! defined( 'ABSPATH' ) ) exit;
	
?>

<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">
		<h1 class="header-title">
			<?php _e('Oups, vous voici dans une impasse...', TEXT_TRANSLATION_DOMAIN); ?>
		</h1>
		<div>
			<p><img src="<?php echo get_stylesheet_directory_uri()."/img/triste.png" ?>" alt="<?php _e('Erreur 404', TEXT_TRANSLATION_DOMAIN); ?>"></p>
			<p>
				<?php printf(__("La page demandée n'a pas été trouvée. <a href=\"%s\">Cliquez ici</a> retourner sur la page d'accueil.", TEXT_TRANSLATION_DOMAIN), home_url()); ?>
			</p>
		</div>
	</div>
</section>
<?php get_footer(); ?>