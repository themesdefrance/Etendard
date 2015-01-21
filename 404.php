<?php get_header(); ?>

<section class="blog">
	
	<div class="wrapper">
	
		<?php do_action('etendard_before_main'); ?>	
		
		<div class="col-1-1" role="main" itemprop="mainContentOfPage">
			
			<?php do_action('etendard_top_main'); ?>
			
			<h1 class="entry-title header-title" itemprop="headline">
				<?php _e('Oops, there is nothing here...', 'etendard'); ?>
			</h1>
			
			<?php do_action('etendard_before_content'); ?>
			
				<div class="entry-content content" itemprop="articleBody">
					
					<?php do_action('etendard_top_content'); ?>
					
					<img src="<?php echo get_template_directory_uri()."/img/triste.png" ?>" alt="<?php _e('Error 404', 'etendard'); ?>" class="smiley-404">
					<p>
						<?php printf(__("The page you requested does not seem to exist. <a href=\"%s\">Click here</a> to get back to the home page.", 'etendard'), home_url()); ?>
					</p>
					
					<?php do_action('etendard_bottom_content'); ?>
					
				</div><!--END .content-->
			
			<?php do_action('etendard_after_content'); ?>
			
			<?php do_action('etendard_bottom_main'); ?>
			
		</div>
		
		<?php do_action('etendard_after_main'); ?>
		
	</div><!--END .wrapper -->
	
</section><!--END .blog-->

<?php get_footer(); ?>