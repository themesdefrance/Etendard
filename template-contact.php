<?php 
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section>
	<div class="wrapper">
		<div class="layout-grid">
			<?php if (get_option('etendard_sidebar_position') === 'gauche'): ?>
			<sidebar class="sidebar col-1-3">
				<?php get_sidebar('blog'); ?>
			</sidebar>
			<?php endif; ?>

			<div class="col-2-3 <?php if (get_option('etendard_sidebar_position') === 'sans') echo 'landing' ?>">
				<?php /* The loop */ ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('content', get_post_format()); ?>
				<?php endwhile; ?>

				<?php get_template_part('formulaire_contact'); ?>
			</div>

			<?php if (get_option('etendard_sidebar_position') === 'droite' || !get_option('etendard_sidebar_position')): ?>
			<div class="sidebar col-1-3">
				<?php get_sidebar('blog'); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>