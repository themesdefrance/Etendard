<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">
		<h1 class="section-title">
			<?php single_cat_title(_e('Articles classés dans ', TEXT_TRANSLATION_DOMAIN)); ?>
		</h1>
		
		<?php get_template_part('main'); ?>
		
	</div>
</section>
<?php get_footer(); ?>