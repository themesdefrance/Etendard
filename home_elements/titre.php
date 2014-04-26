<section class="description headerbar">
	<div class="wrapper">
		<h1>
			<?php 
				if(get_option('etendard_title'))
					echo get_option('etendard_title');
				else
					echo get_bloginfo('name');
			?>
		</h1>
		<p>
			<?php 
				if(get_option('etendard_subtitle'))
					echo get_option('etendard_subtitle');
				else
					echo get_bloginfo('description');
			?>
		</p>
	</div>
</section>