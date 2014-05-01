<?php get_header(); ?>

<section class="blog grid">
	<div class="wrapper">
		
		<div class="col-2-3 landing">

			<?php while (have_posts()) : the_post(); ?>
				
				<article <?php post_class('article'); ?>>

					<header class="header">
							
						<h1 class="header-title">
						
							<?php the_title(); ?>
							
						</h1>
						
					</header>
					
					<div class="content">
					
						<?php the_content(); ?>

					</div>
					
					<footer class="footer">
						
					</footer>
					
				</article>
				
			<?php endwhile; ?>
			
		</div><!--END .col-2-3 .landing-->
		
	</div><!--END .wrapper-->
</section>
<?php get_footer(); ?>