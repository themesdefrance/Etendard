<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">
		<h2 class="section-title">
			<?php single_tag_title(_e('Articles identifiés par ', TEXT_TRANSLATION_DOMAIN)); ?>
		</h2>
		
		<?php if (of_get_option('etendard_sidebar_position') === 'gauche'): ?>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
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
		
		<?php if (of_get_option('etendard_sidebar_position') !== 'gauche'): ?>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
		<?php endif; ?>	
		
	</div>
</section>
<?php get_footer(); ?>