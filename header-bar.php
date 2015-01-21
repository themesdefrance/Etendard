<section class="headerbar">
	<div class="wrapper">
		<?php if(is_single()){ ?>
		
			<h2 class="headerbartitle"><?php echo apply_filters('etendard_headerbar_single', __('Blog', 'etendard')); ?></h2>
			
		<?php }else if(is_page()){ ?>
		
			<h1 class="headerbartitle"><?php echo get_the_title(); ?></h1>
			
		<?php }else if(get_post_type() == "portfolio"){ ?>

			<h1 class="headerbartitle"><?php echo apply_filters('etendard_headerbar_portfolio', __('Portfolio', 'etendard')); ?></h1>
		
		<?php }else if(is_category()){ ?>
		
			<h1 class="headerbartitle">
				<?php single_cat_title(_e('Posts from ', 'etendard')); ?>
			</h1>
		
		<?php }else if(is_tag()){ ?>
		
			<h1 class="headerbartitle">
				<?php single_tag_title(_e('Posts tagged by ', 'etendard')); ?>
			</h1>
			
		<?php }else if(is_search()){ ?>
		
			<h1 class="headerbartitle">
				<?php printf( __( 'Search results for : %s', 'etendard' ), get_search_query() ); ?>
			</h1>
		
		<?php }else if(is_author()){ ?>
	
			<?php $author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
			
			<h1 class="headerbartitle">
				<?php printf( __( 'About %s', 'etendard' ), $author->display_name ); ?>
			</h1>
		
		<?php }else if(is_archive()){ ?>
			<h1 class="headerbartitle">
				<?php if (is_day()) { 
						_e('Archives from ', 'etendard');
						the_time(get_option('date_format'));
					}
					elseif(is_month()){
						_e('Archives for ', 'etendard');
						the_time('F Y');
					}
					elseif(is_year()){
						_e('Archives for ', 'etendard');
						the_time('Y');
					}
					else{
						_e('Archives', 'etendard');
					}
					?>
			
			</h1>
		
		<?php }else{ ?>
			
			<h1 class="headerbartitle"><?php echo apply_filters('etendard_headerbar_single', __('Blog', 'etendard')); ?></h1>
			
			<?php ?>
		<?php } ?>
		
		<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<div id="breadcrumbs">','</div>');
				} ?>
		
	</div><!--END .wrapper-->

</section><!--END .headerbar-->