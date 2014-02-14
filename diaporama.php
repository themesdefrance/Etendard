<?php
$diaporama = null;

$custom = get_post_custom();
if (isset($custom['etendard_portfolio_diaporama']) && isset($custom['etendard_portfolio_diaporama_lien'])){
	$diaporama = maybe_unserialize($custom['etendard_portfolio_diaporama'][0]);
	$liens = maybe_unserialize($custom['etendard_portfolio_diaporama_lien'][0]);
}

//vide le dernier element du tableau s'il ne contiens rien
if (is_array($diaporama) && trim($diaporama[count($diaporama)-1]) === '') array_pop($diaporama);
?>
<?php if (count($diaporama) > 0): ?>
<div class="wrapper">
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
<?php endif; ?>