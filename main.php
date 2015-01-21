<?php $position = get_option('etendard_sidebar_position'); ?>

<div <?php if ($position !== 'sans') echo 'class="layout-grid"' ?>>

	<?php if ($position === 'gauche')get_sidebar('blog'); ?>

	<div class="col-2-3 <?php if ($position === 'sans') echo 'landing' ?>" role="main" itemprop="mainContentOfPage" >
		
		<?php do_action('etendard_top_main'); ?>
		
		<ul class="articles">
			<?php if(have_posts()) : ?>
			
				<?php while (have_posts()) : the_post(); ?>
				
				<li>
					<?php get_template_part('content', get_post_format()); ?>
				</li>
				<?php endwhile; ?>
			
			<?php else : ?>
			
				<?php get_template_part('content', 'none'); ?>
				
			<?php endif; ?>
		</ul>
		<div class="pagination">
			<?php etendard_posts_nav(false); ?>
		</div>
		
		<?php do_action('etendard_bottom_main'); ?>
		
	</div><!--END .col-2-3-->

	<?php if ($position === 'droite' || !$position)get_sidebar('blog'); ?>
	
</div><!--END .layout-grid-->