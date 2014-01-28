<?php
$carousel = null;

$custom = get_post_custom();
if (isset($custom['etendard_portfolio_carousel']) && isset($custom['etendard_portfolio_carousel_lien'])){
	$carousel = maybe_unserialize($custom['etendard_portfolio_carousel'][0]);
	$liens = maybe_unserialize($custom['etendard_portfolio_carousel_lien'][0]);
}
	
if (is_array($carousel) && trim($carousel[count($carousel)-1]) === '') array_pop($carousel);
?>
<?php if (count($carousel) > 0): ?>
<div class="wrapper">
	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($carousel as $index=>$img){ ?>
			<li>
				<?php if (isset($liens[$index]) && filter_var($liens[$index], FILTER_VALIDATE_URL) !== false){ ?>
				<a href="<?php echo $liens[$index]; ?>">
					<img src="<?php echo $img; ?>" />
				</a>
				<?php } else { ?>
				<img src="<?php echo $img; ?>" />
				<?php } ?>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php endif; ?>