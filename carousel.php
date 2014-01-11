<?php
$carousel = null;

$custom = get_post_custom();
if (isset($custom['etendard_portfolio_carousel'])) 
	$carousel = maybe_unserialize($custom['etendard_portfolio_carousel'][0]);
	
if (is_array($carousel) && trim($carousel[count($carousel)-1]) === '') array_pop($carousel);
?>
<?php if (count($carousel) > 0): ?>
<div class="wrapper">
	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($carousel as $img){ ?>
			<li>
				<img src="<?php echo $img; ?>" />
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php endif; ?>