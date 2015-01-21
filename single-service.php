<?php get_header(); ?>

<section class="blog">

	<div class="wrapper">
		
		<?php do_action('etendard_before_main'); ?>
		
		<div class="landing">
			
			<?php do_action('etendard_top_main'); ?>
			
			<?php while (have_posts()) : the_post(); ?>
				
				<article <?php post_class('article'); ?> role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

					<header class="entry-header header">
						
						<?php do_action('etendard_top_header_post'); ?>
						
						<h1 class="entry-title header-title"><?php the_title(); ?></h1>
						
						<?php do_action('etendard_bottom_header_post'); ?>
						
					</header><!--END .entry-header-->
	
					<div class="entry-content content">
						
						<?php do_action('etendard_top_content'); ?>
						
						<?php the_content(); ?>
						
						<?php do_action('etendard_bottom_content'); ?>
						
					</div><!--END .entry-content-->
					
				</article>
				
			<?php endwhile; ?>
			
			<?php do_action('etendard_bottom_main'); ?>
			
		</div><!--END .landing-->
		
		<?php do_action('etendard_after_main'); ?>
		
	</div><!--END .wrapper-->
	
</section><!--END .blog-->

<?php get_footer(); ?>