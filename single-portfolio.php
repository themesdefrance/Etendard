<?php get_header(); ?>
<?php while (have_posts()) : the_post();?>
<?php $portfolio_custom = get_post_custom();  ?>
<section class="grid realisation article">
	<div class="wrapper">
		<h2 class="section-title">
			<?php the_title(); ?>
		</h2>
	</div>
	<?php if (false): ?>
	<div>
		slider
	</div>
	<?php endif; ?>
	<div class="wrapper">
		<div class="col-1-3 meta">
			<?php if (isset($portfolio_custom['etendard_portfolio_client'])): ?>
			<h3 class="realisation-client">
				Client : <?php echo $portfolio_custom['etendard_portfolio_client'][0]; ?>
			</h3>
			<?php endif; ?>
			
			<?php if (isset($portfolio_custom['etendard_portfolio_date'])): ?>
			<div class="realisation-date">
				Date : <?php echo $portfolio_custom['etendard_portfolio_date'][0]; ?>
			</div>
			<?php endif; ?>
			
			<?php if (isset($portfolio_custom['etendard_portfolio_role'])): ?>
			<div class="realisation-role">
				Rôle : <?php echo $portfolio_custom['etendard_portfolio_role'][0]; ?>
			</div>
			<?php endif; ?>
			
			<?php if (isset($portfolio_custom['etendard_portfolio_url'])): ?>
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
<section class="grid">
	<div class="wrapper">
		<ul class="temoignages">
			<li class="temoignage col-2-3">
				<div class="temoignage-photo-wrapper">
					<img src="http://placehold.it/300x300" class="temoignage-photo" />
				</div>
				<h3 class="temoignage-headline">
					Gros lol
				</h3>
				<div class="temoignage-content">
					<p>
						Cum saepe multa, tum memini do
	 in hemicyclio sedentem, ut soat, cum et ego essem una et pauci admodum familiares, in eum sermonem una et pauci admo dumfamiliares ego essem.
					</p>
				</div>
			</li>
		</ul>
	</div>
</section>
<section class="cta">
	<div class="wrapper">
		<p class="cta-text">
			Super important midgets run through the hall looking for candy digesting a dandy.<br />
			Super important midgets run through the hall looking for candy digesting a dandy.
			Super important midgets run through the hall looking for candy digesting a dandy.
			Super important midgets run through the hall looking for candy digesting a dandy.
		</p>
		<div class="button-wrapper">
			<a href="#" class="cta-button">
				Cliquez ici
			</a>
		</div>
	</div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>