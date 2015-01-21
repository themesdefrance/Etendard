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
			'posts_per_page'=> apply_filters('etendard_portfolio_pagination', 9),
			'paged'=>$paged
	);
	$wp_query = new WP_Query($args);
}
else if (is_tax('portfolio_categorie')){
	$wp_query->set('post_type', 'portfolio');
	$wp_query->get_posts();
}

?>
<section class="portfolio">
	<div class="wrapper">
		
		<?php do_action('etendard_before_main'); ?>
		
		<?php if (count($terms) > 0): ?> 
		<nav class="categories">
			<ul>
				<li>
					<a href="<?php echo etendard_portfolio_page_link(); ?>" class="<?php echo (!is_tax('portfolio_categorie')) ? 'active' : ''; ?>">
						<?php echo apply_filters('etendard_portfolio_tous', __('All', 'etendard')); ?>
					</a>
				</li>
				<?php foreach ($terms as $term){ ?>
				<li>
					<a href="<?php echo get_term_link($term); ?>" class="<?php echo (is_tax('portfolio_categorie', $term->name)) ? 'active' : ''; ?>">
						<?php echo $term->name; ?>
					</a>
				</li>
				<?php } ?>
			</ul>
		</nav><!--END .categories-->
		<?php endif; ?>
		
		<ul class="portfolio" role="main" itemprop="mainContentOfPage" >
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
			
			<li class="creation creation-list" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
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
				
				<?php if(get_option('etendard_extraits_portfolio') != '0'){ ?>
					<p class="excerpt">
						<?php echo get_the_excerpt(); ?>
					</p>
				<?php } ?>
				
				<?php if(get_option('etendard_boutons_portfolio') != '0'){ ?>
					<div class="cta-wrapper">
						<a href="<?php the_permalink(); ?>" class="cta-button">
							<?php echo apply_filters('etendard_portfolio_label', __('Read more', 'etendard')); ?>
						</a>
					</div>
				<?php } ?>
			</li>
			<?php endwhile; ?>
		</ul><!--END .portfolio-->
		
		<div class="pagination">
			<?php previous_posts_link(apply_filters('etendard_pagination_precedente', __('Previous Page', 'etendard'))); ?>
			<?php next_posts_link(apply_filters('etendard_pagination_suivante', __('Next Page', 'etendard'))); ?> 
		</div>
		
		<?php do_action('etendard_after_main'); ?>
		
	</div><!--END .wrapper-->
	
</section><!--END .portfolio-->

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>