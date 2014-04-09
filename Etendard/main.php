<?php if (get_option('etendard_sidebar_position') === 'gauche'): ?>
<sidebar class="sidebar col-1-3">
	<?php get_sidebar('blog'); ?>
</sidebar>
<?php endif; ?>

<div class="col-2-3">
	<ul class="articles">
		<?php while (have_posts()) : the_post(); ?>
		<li>
			<?php get_template_part('content', get_post_format()); ?>
		</li>
		<?php endwhile; ?>
	</ul>
	<div class="pagination">
		<?php etendard_posts_nav(false); ?>
	</div>
</div>

<?php if (get_option('etendard_sidebar_position') !== 'gauche'): ?>
<sidebar class="sidebar col-1-3">
	<?php get_sidebar('blog'); ?>
</sidebar>
<?php endif; ?>	