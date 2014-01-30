<?php 
/*
Template Name: Page de vente
*/
?>
<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">		
		<div class="col-2-3 landing">
			<?php /* The loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', get_post_format()); ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>