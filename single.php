<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section class="blog grid">
	<div class="wrapper">
		
		<?php if (get_option('etendard_sidebar_position') === 'gauche'): ?>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
		<?php endif; ?>

		<div class="col-2-3">
			<ul class="articles">
				<?php while (have_posts()) : the_post(); ?>
				<li>
					<?php get_template_part('content', get_post_format()); ?>
					<?php comments_template(); ?>
				</li>
				<?php endwhile; ?>
			</ul>
			<div class="pagination">
				<?php etendard_posts_nav(false); ?>
			</div>
		</div>

		<?php if (get_option('etendard_sidebar_position') !== 'gauche'): ?>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
		<?php endif; ?>	
		
	</div>
</section>
<?php get_footer(); ?>