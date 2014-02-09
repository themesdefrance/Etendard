<?php get_header(); ?>
<section class="blog grid">
	<div class="wrapper">
		<h1 class="section-title">
		
		<?php if (is_day()) { 
				_e('Archives du ', TEXT_TRANSLATION_DOMAIN);
				the_time('j F Y');
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
		
		<?php get_template_part('main'); ?>
		
	</div>
</section>
<?php get_footer(); ?>