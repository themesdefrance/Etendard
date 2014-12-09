<?php 
/*
Template Name: Contact
*/
?>

<?php $position = get_option('etendard_sidebar_position'); ?>
<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section>
	
	<div class="wrapper">
		
		<?php do_action('etendard_before_main'); ?>
		
		<div class="layout-grid">
			
			<?php if ($position === 'gauche')get_sidebar('blog'); ?>

			<div class="col-2-3 <?php if ($position === 'sans') echo 'landing' ?>" role="main" itemprop="mainContentOfPage">
				
				<?php do_action('etendard_top_main'); ?>
				
				<?php while (have_posts()) : the_post(); ?>
				
					<?php get_template_part('content'); ?>
					
				<?php endwhile; ?>

				<?php get_template_part('formulaire_contact'); ?>
				
				<?php do_action('etendard_bottom_main'); ?>
				
			</div>

			<?php if ($position === 'droite' || !$position)get_sidebar('blog'); ?>
			
		</div><!--END .layout-grid-->
		
		<?php do_action('etendard_after_main'); ?>
		
	</div><!--END .wrapper-->
	
</section>

<?php get_footer(); ?>