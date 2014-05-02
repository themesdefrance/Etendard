<?php 
$temoin_nom = etendard_meta_migration('_etendard_portfolio_temoin_nom', 'etendard_portfolio_temoin_nom');
$temoin_texte = etendard_meta_migration('_etendard_portfolio_temoin_texte', 'etendard_portfolio_temoin_texte');
$temoin_portrait = etendard_meta_migration('_etendard_portfolio_temoin_portrait', 'etendard_portfolio_temoin_portrait');

$champs_portfolio = get_option('etendard_portfolio_fields');
?>
<?php get_header(); ?>
<?php while (have_posts()) : the_post();?>
<section class="realisation article">
	
	<?php get_template_part('diaporama'); ?>
	
	<div class="wrapper">
		<h1 class="section-title">
			<?php the_title(); ?>
		</h1>
	</div>
	
	<div class="wrapper">
		<div class="layout-grid">
	
			<?php  if(!empty($portfolio_custom['etendard_portfolio_client'][0]) || !empty($portfolio_custom['etendard_portfolio_url'][0])){ ?>
		
			<div class="col-1-3 meta">
				<?php foreach ($champs_portfolio as $champ){
					if (trim($champ) === '' || !array_key_exists('_'.COCORICO_PREFIX.$champ, $portfolio_custom)) continue;
					?>
					<div class="meta">
						<?php echo $champ; ?>:
						<?php echo $portfolio_custom['_'.COCORICO_PREFIX.$champ][0]; ?>
					</div>
					<?php
				}
				?>
			</div>
			<div class="col-2-3 content">

			<?php }else{ ?>
				<div class="content">
			<?php } ?>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>

<?php if ($temoin_nom[0]): ?>
<section class="grid">
	<div class="wrapper">
		<ul class="temoignages">
			<li class="temoignage">
			
				<?php if ($temoin_portrait[0]): ?>
				<div class="temoignage-photo-wrapper">
					<img src="<?php echo etendard_resize_upload($temoin_portrait[0], 160, 110); ?>" class="temoignage-photo" />
				</div>
				<?php endif; ?>
				
				<div class="temoignage-content">
					<?php echo $temoin_texte[0]; ?>
					<span class="temoignage-name">
					<?php echo $temoin_nom[0]; ?>
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