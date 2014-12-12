<?php
$diaporama = array();
$fullWidth = (get_option('etendard_diaporama_width') === 'full');

$custom = get_post_custom();
if (isset($custom['etendard_portfolio_diaporama'], $custom['etendard_portfolio_diaporama_lien'])){
	$unresizedDiaporama = maybe_unserialize($custom['etendard_portfolio_diaporama'][0]);
	$diaporama = array();
	$liens = maybe_unserialize($custom['etendard_portfolio_diaporama_lien'][0]);
	$titres = maybe_unserialize($custom['etendard_portfolio_diaporama_titre'][0]);
	
	if (is_array($unresizedDiaporama)){
		$width = ($fullWidth) ? 1920 : 960;
		$height = (int)get_option('etendard_diaporama_height');
		if (!$height) $height = 500;
		
		//switch to resized images
		foreach ($unresizedDiaporama as $img){
			if (!$img) continue;
			array_push($diaporama, etendard_resize_upload($img, $width, $height));
		}
	}
}
?>

<?php if (count($diaporama) > 0): ?>
<div class="wrapper <?php if ($fullWidth) echo 'full'; ?>">
	<div class="slider">
		<ul class="slides" style="height: <?php echo $height; ?>px;">
			<?php foreach ($diaporama as $index=>$img){ ?>
			<li class="slide">
				<?php if (isset($liens[$index]) && filter_var($liens[$index], FILTER_VALIDATE_URL) !== false): ?>
					<a href="<?php echo $liens[$index]; ?>">
				<?php endif; ?>
				
				<div class="img" style="background-image:url(<?php echo $img; ?>); height: <?php echo $height; ?>px;">
					<?php if (isset($titres[$index]) && trim($titres[$index]) != ''): ?>
					<div class="slide-caption">
						<?php echo $titres[$index]; ?>
					</div>
					<?php endif; ?>
				</div>
				
				<?php if (isset($liens[$index]) && filter_var($liens[$index], FILTER_VALIDATE_URL) !== false): ?>
					</a>
				<?php endif; ?>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php endif; ?>

<!--
<div class="wrapper <?php if ($fullWidth) echo 'full'; ?>">
	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($diaporama as $index=>$img){ ?>
			<li>
				<?php if (isset($liens[$index]) && filter_var($liens[$index], FILTER_VALIDATE_URL) !== false): ?>
				<a href="<?php echo $liens[$index]; ?>">
					<img src="<?php echo $img; ?>" alt="<?php echo $liens[$index]; ?>" />
				</a>
				<?php else: ?>
				<img src="<?php echo $img; ?>" />
				<?php endif; ?>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
-->
