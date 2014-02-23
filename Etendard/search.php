<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">
		<h1 class="section-title">
			<?php printf( __( 'Résultats de recherche pour : %s', TEXT_TRANSLATION_DOMAIN ), get_search_query() ); ?>
		</h1>
		
		<?php get_template_part('main'); ?>
		
	</div>
</section>
<?php get_footer(); ?>