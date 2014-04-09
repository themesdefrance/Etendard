<?php $portfolio_custom = get_post_custom(); ?>
<?php get_header(); ?>
<?php while (have_posts()) : the_post();?>
<section class="grid realisation article">
	
	<?php get_template_part('diaporama'); ?>
	
	<div class="wrapper">
		<h1 class="section-title">
			<?php the_title(); ?>
		</h1>
	</div>
	
	<div class="wrapper">
	
	<?php  if(!empty($portfolio_custom['etendard_portfolio_client'][0]) || !empty($portfolio_custom['etendard_portfolio_url'][0])){ ?>
		
		<div class="col-1-3 meta">
			<?php if (!empty($portfolio_custom['etendard_portfolio_client'][0])): ?>
			<h3 class="realisation-client">
				Client : <?php echo $portfolio_custom['etendard_portfolio_client'][0]; ?>
			</h3>
			<?php endif; ?>
			
			<?php foreach ($portfolio_custom as $name=>$value){
				if (substr($name, 0, 10) === 'portfolio_'):
				?>
				<div class="meta">
					<?php echo substr($name, 10); ?>:
					<?php echo $value[0]; ?>
				</div>
				<?php
				endif;
			}
			?>
			
			<?php if (!empty($portfolio_custom['etendard_portfolio_url'][0])): ?>
			<a href="<?php echo $portfolio_custom['etendard_portfolio_url'][0]; ?>" class="realisation-site">
				<?php _e('voir le site', TEXT_TRANSLATION_DOMAIN); ?>
			</a>
			<?php endif; ?>
		</div>
		<div class="col-2-3 content">
		
		<?php }else{ ?>
			<div class="content">
		<?php } ?>
			<?php the_content(); ?>
		</div>
	</div>
</section>

<?php if (!empty($portfolio_custom['etendard_portfolio_temoin_nom'][0])): ?>
<section class="grid">
	<div class="wrapper">
		<ul class="temoignages">
			<li class="temoignage">
			
				<?php if (!empty($portfolio_custom['etendard_portfolio_temoin_portrait'][0])): ?>
				<div class="temoignage-photo-wrapper">
					<img src="<?php echo $portfolio_custom['etendard_portfolio_temoin_portrait'][0]; ?>" class="temoignage-photo" />
				</div>
				<?php endif; ?>
				
				<div class="temoignage-content">
					<?php echo $portfolio_custom['etendard_portfolio_temoin_texte'][0]; ?>
					<span class="temoignage-name">
					<?php echo $portfolio_custom['etendard_portfolio_temoin_nom'][0]; ?>
					</span>
				</div>
			</li>
		</ul>
	</div>
</section>
<?php endif; ?>
<?php endwhile; ?>

<?php get_template_part('call_to_action'); ?>

<?php get_footer(); ?>