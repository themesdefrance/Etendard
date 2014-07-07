<?php $portfolios = new WP_Query(array(
								'posts_per_page'=>apply_filters('etendard_home_portfolio_nombre', 3),
								'post_type'=>'portfolio'
								));
if ($portfolios->post_count == 1) $class = '1-1';
else if ($portfolios->post_count % 2 == 0) $class = '1-2';
else $class = '1-3';								
?>

<?php if ($portfolios->have_posts()): ?>
<section class="portfolio">
	<div class="wrapper">
		<h2 class="center">
			<?php apply_filters('etendard_home_portfolio', __('Derniers travaux', 'etendard')); ?>
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
					$icon = 'icon-ellipsis';
					break;
			}
			?>
			<li class="creation col-<?php echo $class; ?>">
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
				<?php echo apply_filters('etendard_home_portfolio_lien', __('Consulter le portfolio', 'etendard')); ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>