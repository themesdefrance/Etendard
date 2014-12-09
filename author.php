<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>

<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<section class="blog">
	<div class="wrapper">
		
		<?php $position = get_option('etendard_sidebar_position'); ?>

		<div <?php if ($position !== 'sans') echo 'class="layout-grid"' ?>>
		
			<?php if ($position === 'gauche'): ?>
			<sidebar class="sidebar col-1-3">
				<?php get_sidebar('blog'); ?>
			</sidebar>
			<?php endif; ?>
		
			<div class="col-2-3 <?php if ($position === 'sans') echo 'landing' ?>">
				
				<div class="auteur-box">
					
					<?php echo get_avatar( $curauth->user_email, '100', '', $curauth->display_name); ?>
					
					<?php if($curauth->description != '')
						 	echo '<p>' . $curauth->description . '</p>';
					?>
					
					
					<?php if($curauth->user_url != ''){ ?>
							<p>
								<strong><?php _e('Website', 'etendard'); ?> : </strong><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
							</p>
					<?php } ?>
					
				</div>
				
				<h2><?php printf(__('Last posts by %s', 'etendard'),$curauth->display_name); ?></h2>
				
				<ul class="articles">
					<?php if(have_posts()) : ?>
					
						<?php while (have_posts()) : the_post(); ?>
						
						<li>
							<article <?php post_class('article'); ?> itemscope itemtype="http://schema.org/Article">

								<header class="header">
									
										<h3 class="entry-title header-title" itemprop="headline">
										
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
											
										</h3>
									
									<?php get_template_part( 'content', 'header-meta' ); ?>
									
								</header>
									
								<?php get_template_part( 'content', 'body' ); ?>
								
							</article>
							
						</li>
						
						<?php endwhile; ?>
					
					<?php else : ?>
					
						<p><?php echo apply_filters('etendard_nopostfound', __('Sorry but no post match what you are looking for.','etendard')); ?></p>
						
					<?php endif; ?>
				</ul>
				<div class="pagination">
					<?php etendard_posts_nav(false); ?>
				</div>
			</div><!--END .col-2-3-->
		
			<?php if ($position === 'droite' || !$position): ?>
			<sidebar class="sidebar col-1-3">
				<?php get_sidebar('blog'); ?>
			</sidebar>
			<?php endif; ?>	
			
		</div>
		
	</div>
</section>
<?php get_footer(); ?>