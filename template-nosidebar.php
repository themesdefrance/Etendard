<?php 
/*
Template Name: Sans Barre Latérale
*/
?>
<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section class="blog">
	
	<div class="wrapper">
		
		<?php do_action('etendard_before_main'); ?>	

			<?php while (have_posts()) : the_post(); ?>
			
				<?php get_template_part('content'); ?>
				
			<?php endwhile; ?>
			
		<?php do_action('etendard_after_main'); ?>

	</div><!--END .wrapper-->
	
</section><!--END .blog-->

<?php get_footer(); ?>