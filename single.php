<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">
		<h2 class="section-title">
			<?php _e('Blog', TEXT_TRANSLATION_DOMAIN); ?>
		</h2>
		<div class="col-2-3">
			<?php /* The loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', get_post_format()); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>