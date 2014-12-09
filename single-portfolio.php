<?php 
$temoin_nom = etendard_meta_migration('_etendard_portfolio_temoin_nom', 'etendard_portfolio_temoin_nom');
$temoin_texte = etendard_meta_migration('_etendard_portfolio_temoin_texte', 'etendard_portfolio_temoin_texte');
$temoin_portrait = etendard_meta_migration('_etendard_portfolio_temoin_portrait', 'etendard_portfolio_temoin_portrait');

$champs_portfolio = get_option('etendard_portfolio_fields');
$portfolio_custom = get_post_custom();
?>
<?php get_header(); ?>
<?php while (have_posts()) : the_post();?>
<section class="realisation article" itemscope itemtype="http://schema.org/CreativeWork">
	
	<?php 	if(has_post_format('video'))
				get_template_part('portfolio', 'video');
			else
				get_template_part('diaporama');
	?>
	
	<div class="wrapper">
		<h1 class="entry-title section-title" itemprop="headline">
			<?php the_title(); ?>
		</h1>
	</div>
	
	<div class="wrapper">
		
		<?php do_action('etendard_before_main'); ?>
		
		<div class="layout-grid">
			
			<?php  if(count($champs_portfolio) > 1){ ?>
		
				<div class="col-1-3 meta">
					<?php foreach ($champs_portfolio as $champ){
						if (trim($champ) === '' || !array_key_exists('_'.ETENDARD_COCORICO_PREFIX.$champ, $portfolio_custom)) continue;
						?>
						<div class="meta">
							<?php echo $champ; ?>:
							<?php echo preg_replace('/((http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '<a href="\1">\1</a>', $portfolio_custom['_'.ETENDARD_COCORICO_PREFIX.$champ][0]); ?>
						</div>
						<?php
					}
					?>
				</div>
				
				<div class="col-2-3 content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

			<?php }else{ ?>
			
				<div class="col-1-1 content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
					
			<?php } ?>
				
				<?php do_action('etendard_top_content'); ?>
				
				<?php the_content(); ?>
				
				<?php do_action('etendard_bottom_content'); ?>
				
			</div><!--END .col-2-3 || .col-1-1 -->
			
		</div><!--END .layout-grid-->
		
		<?php do_action('etendard_after_main'); ?>
		
	</div><!--END .wrapper-->
	
</section>

<?php if ($temoin_nom[0]): ?>
	<section class="grid">
		<div class="wrapper">
			<ul class="temoignages">
				<li class="temoignage" itemscope itemtype="http://schema.org/Review">
				
					<?php if ($temoin_portrait[0]): ?>
					<div class="temoignage-photo-wrapper">
						<img src="<?php echo etendard_resize_upload($temoin_portrait[0], 160, 110); ?>" class="temoignage-photo" itemprop="image" />
					</div>
					<?php endif; ?>
					
					<div class="temoignage-content" itemprop="text">
						<?php echo $temoin_texte[0]; ?>
						<span class="temoignage-name" itemprop="author" <?php if (!$temoin_portrait[0])echo 'style="padding-left:0;"'; ?>>
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