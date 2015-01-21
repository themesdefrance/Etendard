<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section class="blog">
	<div class="wrapper">
		
		<?php do_action('etendard_before_main'); ?>
		
		<?php get_template_part('main'); ?>
		
		<?php do_action('etendard_after_main'); ?>

	</div><!--END .wrapper-->

</section><!--END .blog-->

<?php get_footer(); ?>