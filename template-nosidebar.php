<?php 
/*
Template Name: Sans Barre Latérale
*/
?>
<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section class="blog">
	<div class="wrapper">		

			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content'); ?>
			<?php endwhile; ?>

	</div>
</section>
<?php get_footer(); ?>