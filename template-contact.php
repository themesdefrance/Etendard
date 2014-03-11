<?php 
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section class="grid">
	<div class="wrapper">
		
		<?php if (get_option('etendard_sidebar_position') === 'gauche'): ?>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
		<?php endif; ?>
		
		<div class="col-2-3">
			<?php /* The loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', get_post_format()); ?>
			<?php endwhile; ?>
			
			<?php get_template_part('formulaire_contact'); ?>
		</div>
		
		<?php if (get_option('etendard_sidebar_position') !== 'gauche'): ?>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
		<?php endif; ?>	
		
	</div>
</section>
<?php get_footer(); ?>