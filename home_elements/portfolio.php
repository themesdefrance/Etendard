<?php $portfolios = new WP_Query(array('posts_per_page'=>3, 'post_type'=>'portfolio')); ?>
<?php if ($portfolios->have_posts()): ?>
<section class="portfolio">
	<div class="wrapper">
		<h2 class="center">
			<?php _e('Derniers travaux', TEXT_TRANSLATION_DOMAIN); ?>
		</h2>
		<ul class="portfolio">
			<?php while ($portfolios->have_posts()) : $portfolios->the_post(); ?>
			<?php
			$icon = '';
			switch (get_post_format()){
				case 'video':
					$icon = 'icon-play';
					break;
				default:
					$icon = 'icon-search';
					break;
			}
			?>
			<li class="creation col-1-3">
				<a href="<?php the_permalink(); ?>">
					<figure class="<?php echo $icon; ?>">
						<div class="entry-thumbnail">
						<?php if (has_post_thumbnail() && !post_password_required()): ?>
							<?php the_post_thumbnail('etendard-portfolio-thumbnail'); ?>
						<?php endif; ?>
						</div>
						<figcaption>
							<?php the_title(); ?>
						</figcaption>
					</figure>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
		<div class="cta-wrapper">
			<a href="<?php echo etendard_portfolio_page_link(); ?>" class="cta-button">
				<?php _e('Consulter le portfolio', TEXT_TRANSLATION_DOMAIN); ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>