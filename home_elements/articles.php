<?php $articles = new WP_Query(array(
								'posts_per_page'=>apply_filters('etendard_home_articles_nombre', 4),
								'ignore_sticky_posts'=>true
								)); ?>
								
<?php if ($articles->have_posts()): ?>
<section class="blog">
	<div class="wrapper">
		<h2 class="center">
			<?php echo apply_filters('etendard_home_articles', __('Last Posts', 'etendard')); ?>
		</h2>
		<ul class="blog">
			<?php while ($articles->have_posts()) : $articles->the_post(); ?>
			<li class="col-1-4">
				<article <?php post_class('article teaser'); ?>>
					<header class="header">
						<?php $format = get_post_format();
					
							switch($format){
									case 'video':
										$video_link = get_post_meta($post->ID, '_etendard_video_meta', true); ?>
										<div class="entry-thumbnail post-video">
											<?php echo wp_oembed_get( $video_link, array( 'width' => 225, 'height' => 150) ); ?>
										</div><?php
									break;
									case 'quote':
										$quote = get_post_meta($post->ID, '_etendard_quote_meta', true);
										$author_quote = get_post_meta($post->ID, '_etendard_quote_author_meta', true); ?>
										<div class="entry-thumbnail post-quote">
											<blockquote><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">“<?php echo $quote; ?>”</a></blockquote>
											<span class="post-quote-author"><?php echo $author_quote; ?></span>
										</div><?php
									break;
									case 'link':
										$link = get_post_meta($post->ID, '_etendard_link_meta', true); ?>
										<div class="entry-thumbnail post-link">
											<h2 class="entry-title header-title "><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
											<span class="post-link-url"><a href="<?php echo $link; ?>" title="<?php the_title(); ?>" class="icon-newtab" target="_blank" rel="bookmark"></a></span>
										</div><?php
									break;
									default:
										if (has_post_thumbnail() && !post_password_required()): ?>
											<div class="entry-thumbnail">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_post_thumbnail('etendard-blog-thumbnail'); ?>
												</a>
											</div>
										<?php endif;
							}
							
						if($format=='' || $format=='video'){ ?>
							<h3 class="entry-title header-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
						<?php } ?>
					</header>
					<div class="entry-summary content">
						<?php echo etendard_excerpt(20); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="bookmark more-link">
						<?php _e('Read more', 'etendard'); ?>
					</a>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>
		<div class="cta-wrapper">
			<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="cta-button">
				<?php echo apply_filters('etendard_home_articles_lien', __('Read the blog', 'etendard')); ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>