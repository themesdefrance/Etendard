<section class="headerbar">
	<div class="wrapper">
		<?php if(is_single()){ ?>
		
			<h2 class="headerbartitle"><?php echo __('Blog', TEXT_TRANSLATION_DOMAIN); ?></h2>
			
		<?php }else if(is_page()){ ?>
		
			<h1 class="headerbartitle"><?php echo get_the_title(); ?></h1>
			
		<?php }else if(is_page_template('template-portfolio.php')){ // Ca marche pas !!!! ?>

			<h1 class="headerbartitle"><?php echo __('Portfolio', TEXT_TRANSLATION_DOMAIN); ?></h1>
		
		<?php }else if(is_category()){ ?>
		
			<h1 class="headerbartitle">
				<?php single_cat_title(_e('Articles classés dans ', TEXT_TRANSLATION_DOMAIN)); ?>
			</h1>
		
		<?php }else if(is_tag()){ ?>
		
			<h1 class="headerbartitle">
				<?php single_tag_title(_e('Articles identifiés par ', TEXT_TRANSLATION_DOMAIN)); ?>
			</h1>
		
		<?php }else if(is_archive()){ ?>
			<h1 class="headerbartitle">
				<?php if (is_day()) { 
						_e('Archives du ', TEXT_TRANSLATION_DOMAIN);
						the_time(get_option('date_format'));
					}
					elseif(is_month()){
						_e('Archives de ', TEXT_TRANSLATION_DOMAIN);
						the_time('F Y');
					}
					elseif(is_year()){
						_e('Archives de ', TEXT_TRANSLATION_DOMAIN);
						the_time('Y');
					}
					else{
						_e('Archives', TEXT_TRANSLATION_DOMAIN);
					}
					?>
			
			</h1>
		
		<?php }else{ ?>
			
			<h1 class="headerbartitle"><?php echo __('Blog', TEXT_TRANSLATION_DOMAIN); ?></h1>
			
			
			<?php ?>
		<?php } ?>
		
		<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<div id="breadcrumbs">','</div>');
				} ?>
		
	</div>

</section>