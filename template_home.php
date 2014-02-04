<?php 
/* 
Template Name: Home
*/ 
?>
<?php get_header(); ?>

<?php
$display_blocks = of_get_option('etendard_blocks_presence');
$display_blocks['content'] = true;
//$ordre_blocks = array('titre'=>of_get_option('etendard_blocks_ordre_titre'), 
//					  'slider'=>of_get_option('etendard_blocks_ordre_slider'),
//					  'cta'=>of_get_option('etendard_blocks_ordre_cta'),
//					  'portfolio'=>of_get_option('etendard_blocks_ordre_portfolio'),
//					  'articles'=>of_get_option('etendard_blocks_ordre_articles'));
$ordre_blocks = array('titre'=>0, 
					  'diaporama'=>1,
					  'content'=>2,
					  'cta'=>3,
					  'services'=>4,
					  'portfolio'=>5,
					  'articles'=>6);
asort($ordre_blocks);
?>

<?php 
foreach ($ordre_blocks as $block=>$ordre){
	if (!$display_blocks || !array_key_exists($block, $display_blocks) || !$display_blocks[$block]) continue;
	
	switch ($block){
		case 'titre':
			get_template_part('home_elements/titre');
			break;
		case 'diaporama':
			get_template_part('home_elements/diaporama');
			break;
		case 'content':
			get_template_part('home_elements/content');
			break;
		case 'services':
			get_template_part('home_elements/services');
			break;
		case 'portfolio':
			get_template_part('home_elements/portfolio');
			break;
		case 'articles':
			get_template_part('home_elements/articles');
			break;
		case 'cta':
			get_template_part('call_to_action');
			break;
	}
}
?>

<?php get_footer(); ?>