<?php $posts = new WP_Query(array('posts_per_page'=>4, 'ignore_sticky_posts'=>true)); ?>
<?php if ($posts->have_posts()): ?>
<section class="blog">
	<div class="wrapper">
		<h2 class="center">
			<?php _e('Derniers articles', TEXT_TRANSLATION_DOMAIN); ?>
		</h2>
		<ul class="blog">
			<?php while ($posts->have_posts()) : $posts->the_post(); ?>
			<li class="col-1-4">
				<article class="article teaser">
					<header class="header">
						<?php if (has_post_thumbnail() && !post_password_required()): ?>
						<div class="entry-thumbnail">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail('etendard-blog-thumbnail'); ?>
							</a>
						</div>
						<?php endif; ?>
						<h3 class="header-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
					</header>
					<div class="content">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="more-link">
						<?php _e('Lire la suite', TEXT_TRANSLATION_DOMAIN); ?>
					</a>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>
		<div class="cta-wrapper">
			<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="cta-button">
				<?php _e('Consulter les articles', TEXT_TRANSLATION_DOMAIN); ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>