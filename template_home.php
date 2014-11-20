<?php 
/* 
Template Name: Accueil
*/ 
?>
<?php get_header(); ?>

<?php
$blocks = get_option('etendard_home_blocks');

if($blocks):

	foreach ($blocks as $block=>$display){
		if (!$display) continue;
		
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
	
else:
	
	get_template_part('home_elements/init');
	
endif; ?>

<?php get_footer(); ?>