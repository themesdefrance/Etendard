<?php $position = get_option('etendard_sidebar_position'); ?>

<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section class="blog">
	
	<div class="wrapper">
		
		<?php do_action('etendard_before_main'); ?>	
		
		<div class="layout-grid">
			
			<?php do_action('etendard_top_main'); ?>
			
			<?php if ($position === 'gauche')get_sidebar('blog'); ?>

			<div class="col-2-3 <?php if (get_option('etendard_sidebar_position') === 'sans') echo 'landing' ?>" role="main" itemprop="mainContentOfPage">
				
				<?php do_action('etendard_top_main'); ?>
				
				<ul class="articles">
					<?php while (have_posts()) : the_post(); ?>
					<li>
						<?php 
							get_template_part('content', get_post_format());
							
							etendard_single_post_nav();
							
							comments_template();
						?>
					</li>
					<?php endwhile; ?>
				</ul>
				
			</div><!--END .col-2-3-->

			<?php if ($position === 'droite' || !$position)get_sidebar('blog'); ?>
			
			<?php do_action('etendard_bottom_main'); ?>
			
		</div><!--END .layout-grid-->
		
		<?php do_action('etendard_after_main'); ?>
		
	</div><!--END .wrapper-->
	
</section><!--END .blog-->

<?php get_footer(); ?>