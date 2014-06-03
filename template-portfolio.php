<?php 
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<?php 
$terms = get_terms('portfolio_categorie');
$currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); // Fix temporaire

global $wp_query;

if (!is_tax('portfolio_categorie') && !is_post_type_archive('portfolio')){
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
			'post_type'=>'portfolio',
			'orderby'=>'date',
			'order'=>'DESC',
			'posts_per_page'=> apply_filters('etendard_portfolio_pagination', 6),
			'paged'=>$paged
	);
	$wp_query = new WP_Query($args);
}

if (is_tax('portfolio_categorie')){ // Fix temporaire
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
			'post_type'=>'portfolio',
			'orderby'=>'date',
			'order'=>'DESC',
			'posts_per_page'=> apply_filters('etendard_portfolio_pagination', 6),
			'paged'=>$paged,
			'portfolio_categorie'=>$currentterm->slug
	);
	$wp_query = new WP_Query($args);
}


?>
<section class="portfolio">
	<div class="wrapper">
		<?php if (count($terms) > 0): ?> 
		<nav class="categories">
			<ul>
				<li>
					<a href="<?php echo etendard_portfolio_page_link(); ?>" class="<?php echo (!is_tax('portfolio_categorie')) ? 'active' : ''; ?>">
						<?php echo apply_filters('etendard_portfolio_tous', __('Tous', 'etendard')); ?>
					</a>
				</li>
				<?php foreach ($terms as $term){ ?>
				<li>
					<a href="<?php echo get_term_link($term); ?>" class="<?php echo (is_tax('portfolio_categorie', $term)) ? 'active' : ''; ?>">
						<?php echo $term->name; ?>
					</a>
				</li>
				<?php } ?>
			</ul>
		</nav>
		<?php endif; ?>
		
		<ul class="portfolio">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
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
			<li class="creation creation-list">
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
				
				<?php if(get_option('etendard_extraits_portfolio') != '0'){ ?>
					<p class="excerpt">
						<?php the_excerpt(); ?>
					</p>
				<?php } ?>
				
				<?php if(get_option('etendard_boutons_portfolio') != '0'){ ?>
					<div class="cta-wrapper">
						<a href="<?php the_permalink(); ?>" class="cta-button">
							<?php apply_filters('etendard_portfolio_label', _e('Decouvrir le projet', 'etendard')); ?>
						</a>
					</div>
				<?php } ?>
			</li>
			<?php endwhile; ?>
		</ul>
		
		<div class="pagination">
			<?php previous_posts_link(apply_filters('etendard_pagination_precedente', __('Page précédente', 'etendard'))); ?>
			<?php next_posts_link(apply_filters('etendard_pagination_suivante', __('Page suivante', 'etendard'))); ?> 
		</div>
	</div>
</section>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>