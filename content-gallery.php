<article <?php post_class('article'); ?>>
	<header class="header">
		<?php if (has_post_thumbnail() && !post_password_required()): ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>
		
		<?php if (is_single()) : ?>
		<h1 class="header-title">
			<?php the_title(); ?>
		</h1>
		<?php else : ?>
		<h1 class="header-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>
		
		<span class="header-meta">
			<?php echo sprintf('%2$s', get_post_format_string(get_post_format()), get_the_date()); ?> |
			<?php comments_number(__('Aucun commentaire', TEXT_TRANSLATION_DOMAIN), __('Un commentaire', TEXT_TRANSLATION_DOMAIN), __('% commentaires', TEXT_TRANSLATION_DOMAIN)); ?> 
			<?php edit_post_link(__('Éditer', TEXT_TRANSLATION_DOMAIN)); ?>
		</span>
	</header>
	<div class="content">
		<?php the_content(__('Lire la suite', TEXT_TRANSLATION_DOMAIN)); ?>
	</div>
	<footer class="footer">
		<nav>
		<?php 
		wp_link_pages(array(
			'before'=>'<div class="page-links"><span class="page-links-title">'.__('Pages:', TEXT_TRANSLATION_DOMAIN).'</span>', 
			'after'=>'</div>'
		));
		?>
		</nav>
	</footer>
</article>