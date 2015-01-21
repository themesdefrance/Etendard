<?php 
/*
Template Name: Services
*/
?>
<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<?php
	global $wp_query;
	
	if (!is_post_type_archive('service')){
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
				'post_type'=>'service',
				'orderby'=>'date',
				'order'=>'DESC',
				'posts_per_page'=> apply_filters('etendard_service_pagination', 6),
				'paged'=>$paged
		);
		$wp_query = new WP_Query($args);
	}
?>

<section class="services">
	<div class="wrapper">
		
		<ul class="services">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			
			<li class="service col-1-3">
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
					<?php the_excerpt(); ?>
				</p>
				<a href="<?php the_permalink(); ?>" class="more-link">
					<?php _e('Read more', 'etendard'); ?>
				</a>
			</li>
			
			<?php endwhile; ?>
		</ul><!--END .services-->
		
		<div class="pagination">
			<?php previous_posts_link(apply_filters('etendard_pagination_precedente', __('Previous Page', 'etendard'))); ?>
			<?php next_posts_link(apply_filters('etendard_pagination_suivante', __('Next Page', 'etendard'))); ?> 
		</div>
		
	</div><!--END .wrapper-->
	
</section><!--END .services-->

<?php get_footer(); ?>