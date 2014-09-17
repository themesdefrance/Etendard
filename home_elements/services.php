<?php 

$services = new WP_Query(array(
					'posts_per_page'=>apply_filters('etendard_home_services_nombre', 3),
					'post_type'=>'service',
					'orderby'=>'date'
					));
								
switch ($services->post_count){
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

<?php if ($services->have_posts()): ?>
<section class="services">
	<div class="wrapper">
		<ul class="services">
			<?php while ($services->have_posts()) : $services->the_post(); ?>
			<li class="service col-<?php echo $class; ?>">
				<figure class="entry-thumbnail">
					<a href="<?php the_permalink(); ?>">
					<?php if (has_post_thumbnail() && !post_password_required()): ?>
						<?php the_post_thumbnail('etendard-service-thumbnail'); ?>
					<?php endif; ?>
					</a>
				</figure>
				<h2>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<p>
					<?php 	
							if(has_excerpt())
								the_excerpt();
							else
								echo etendard_excerpt(30);
					?>
				</p>
				<a href="<?php the_permalink(); ?>" class="more-link">
					<?php _e('Read more', 'etendard'); ?>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
		
		<?php
		
		 if(wp_count_posts('service')->publish > 3) { ?>
		
			<div class="cta-wrapper">
				<a href="<?php echo etendard_service_page_link(); ?>" class="cta-button">
					<?php echo apply_filters('etendard_home_services_lien', __('Check all services', 'etendard')); ?>
				</a>
			</div>
			
		<?php } ?>
		
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>