<?php $portfolio_custom = get_post_custom(); ?>
<?php get_header(); ?>
<?php while (have_posts()) : the_post();?>
<section class="grid realisation article">
	<div class="wrapper">
		<h2 class="section-title">
			<?php the_title(); ?>
		</h2>
	</div>
	
	<?php get_template_part('carousel'); ?>
	
	<div class="wrapper">
		<div class="col-1-3 meta">
			<?php if (!empty($portfolio_custom['etendard_portfolio_client'][0])): ?>
			<h3 class="realisation-client">
				Client : <?php echo $portfolio_custom['etendard_portfolio_client'][0]; ?>
			</h3>
			<?php endif; ?>
			
			<?php if (!empty($portfolio_custom['etendard_portfolio_date'][0])): ?>
			<div class="realisation-date">
				Date : <?php echo $portfolio_custom['etendard_portfolio_date'][0]; ?>
			</div>
			<?php endif; ?>
			
			<?php if (!empty($portfolio_custom['etendard_portfolio_role'][0])): ?>
			<div class="realisation-role">
				Rôle : <?php echo $portfolio_custom['etendard_portfolio_role'][0]; ?>
			</div>
			<?php endif; ?>
			
			<?php if (!empty($portfolio_custom['etendard_portfolio_url'][0])): ?>
			<a href="<?php echo $portfolio_custom['etendard_portfolio_url'][0]; ?>" class="realisation-site">
				voir le site
			</a>
			<?php endif; ?>
		</div>
		<div class="col-2-3 content">
			<?php the_content(); ?>
		</div>
	</div>
</section>

<?php if (!empty($portfolio_custom['etendard_portfolio_temoin_nom'][0])): ?>
<section class="grid">
	<div class="wrapper">
		<ul class="temoignages">
			<li class="temoignage col-2-3">
				<div class="temoignage-photo-wrapper">
					<?php if (!empty($portfolio_custom['etendard_portfolio_temoin_portrait'][0])): ?>
					<img src="<?php echo $portfolio_custom['etendard_portfolio_temoin_portrait'][0]; ?>" class="temoignage-photo" />
					<?php endif; ?>
				</div>
				<h3 class="temoignage-headline">
					<?php echo $portfolio_custom['etendard_portfolio_temoin_nom'][0]; ?>
				</h3>
				<div class="temoignage-content">
					<?php echo $portfolio_custom['etendard_portfolio_temoin_texte'][0]; ?>
				</div>
			</li>
		</ul>
	</div>
</section>
<?php endif; ?>
<?php endwhile; ?>

<?php get_template_part('call_to_action'); ?>

<?php get_footer(); ?>