<?php
$diaporama = array();

$custom = get_post_custom();
if (isset($custom['etendard_portfolio_diaporama'], $custom['etendard_portfolio_diaporama_lien'])){
	$unresizedDiaporama = maybe_unserialize($custom['etendard_portfolio_diaporama'][0]);
	$diaporama = array();
	$liens = maybe_unserialize($custom['etendard_portfolio_diaporama_lien'][0]);
	
	if (is_array($unresizedDiaporama)){
		$height = (int)get_option('etendard_diaporama_height');
		if (!$height) $height = 500;
		
		$path = ABSPATH;
		if (preg_match('/\/$/', $path)) $path = substr($path, 0, strlen($path)-1);
		
		//switch to resized images
		foreach ($unresizedDiaporama as $img){
			if (!$img) continue;
			$fullPath = substr($img, strlen(content_url())-strlen('wp-content/'));

			$exploded = explode('/', $fullPath);
			$imgName = array_pop($exploded);
			$imgPath = implode($exploded, '/');
			$separator = strrpos($imgName, '.');

			$wanted = substr($imgName, 0, $separator).'-960x'.$height.substr($imgName, $separator);

			if (!file_exists($path.$imgPath.'/'.$wanted)){
				//create resized image
				$editor = wp_get_image_editor($path.$imgPath.'/'.$imgName);
				if (!is_wp_error($editor)){
					$editor->resize(960, $height, true);
					$editor->save($path.$imgPath.'/'.$wanted);
				}
				else{
					//default fallabck to normal image
					$wanted = $imgName;
				}
			}

			array_push($diaporama, get_bloginfo('url').$imgPath.'/'.$wanted);
		}
	}
}
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