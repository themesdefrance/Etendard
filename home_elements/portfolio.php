<?php 

$portfolios = new WP_Query(array(
				'posts_per_page'=>apply_filters('etendard_home_portfolio_nombre', 3),
				'post_type'=>'portfolio'
				));
								
switch ($portfolios->post_count){
	case 1:
		$class = '1-2 centered';
		break;
	case 2:
		$class = '1-2';
		break;
	default:
		$class = '1-3';
		break;
}							
?>

<?php if ($portfolios->have_posts()): ?>
<section class="portfolio">
	<div class="wrapper">
		<h2 class="center">
			<?php echo apply_filters('etendard_home_portfolio', __('Latest Projects', 'etendard')); ?>
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
						<?php if (has_post_thumbnail() && !post_password_required()): 
							the_post_thumbnail('etendard-portfolio-thumbnail'); 
						else : ?>
						<span class="noimageportfolio"><?php _e('Please add a featured image to this project','etendard'); ?></span>
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
				<?php echo apply_filters('etendard_home_portfolio_lien', __('Check the portfolio', 'etendard')); ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>