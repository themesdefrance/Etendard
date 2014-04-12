<?php 
/*
Template Name: Sans Barre Latérale
*/
?>
<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section class="blog">
	<div class="wrapper">		
		<div>
			<?php /* The loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', get_post_format()); ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>