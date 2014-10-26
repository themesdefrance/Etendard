<?php $position = get_option('etendard_sidebar_position'); ?>

<div <?php if ($position !== 'sans') echo 'class="layout-grid"' ?>>

	<?php if ($position === 'gauche'): ?>
	<sidebar class="sidebar col-1-3">
		<?php get_sidebar('blog'); ?>
	</sidebar>
	<?php endif; ?>

	<div class="col-2-3 <?php if ($position === 'sans') echo 'landing' ?>">
		<ul class="articles">
			<?php if(have_posts()) : ?>
			
				<?php while (have_posts()) : the_post(); ?>
				<li>
					<?php get_template_part('content', get_post_format()); ?>
				</li>
				<?php endwhile; ?>
			
			<?php else : ?>
			
				<p><?php echo apply_filters('etendard_nopostfound', __('Sorry but no post match what you are looking for.','etendard')); ?></p>
				
			<?php endif; ?>
		</ul>
		<div class="pagination">
			<?php etendard_posts_nav(false); ?>
		</div>
	</div><!--END .col-2-3-->

	<?php if ($position === 'droite' || !$position): ?>
	<sidebar class="sidebar col-1-3">
		<?php get_sidebar('blog'); ?>
	</sidebar>
	<?php endif; ?>	
	
</div>