<?php $services = new WP_Query(array('posts_per_page'=>3, 'post_type'=>'service')); ?>
<?php if ($services->have_posts()): ?>
<section class="services">
	<div class="wrapper">
		<ul class="services">
			<?php while ($services->have_posts()) : $services->the_post(); ?>
			<li class="service col-1-3">
				<figure class="entry-thumbnail">
					<a href="<?php the_permalink(); ?>">
					<?php if (has_post_thumbnail() && !post_password_required()): ?>
						<?php the_post_thumbnail('etendard-portfolio-thumbnail'); ?>
					<?php endif; ?>
					</a>
				</figure>
				<h2>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<p>
					<?php the_excerpt(); ?>
				</p>
				<a href="<?php the_permalink(); ?>" class="more-link">
					<?php _e('Lire la suite', TEXT_TRANSLATION_DOMAIN); ?>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>