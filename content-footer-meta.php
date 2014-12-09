<?php if(is_single()){ ?>
	
	<footer class="post-footer">
		
		<?php do_action('etendard_top_footer_post'); ?>
		
		<?php if(has_tag()) { ?>
		
			<span class="footer-meta icon-tags" itemscope="keywords">
			
				<?php echo get_the_tag_list('',' | ',''); ?>
			
			</span>
		
		<?php } ?>
	
		<?php if(etendard_is_paginated_post()){ ?>
			
				<?php wp_link_pages(array(
					'before'=>'<nav><div class="page-links"><span class="page-links-title">'.__('Pages:', 'etendard').'</span>', 
					'after'=>'</div></nav>'
				)); ?>
			
		<?php } ?>
	
		<?php do_action('etendard_bottom_footer_post'); ?>
		
	</footer>
	
<?php } ?>