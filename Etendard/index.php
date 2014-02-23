<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">
		<h2 class="section-title">
			<?php _e('Blog', TEXT_TRANSLATION_DOMAIN); ?>
		</h2>
		
		<?php get_template_part('main'); ?>
		
	</div>
</section>
<?php get_footer(); ?>