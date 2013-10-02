<article class="article">
	<header class="header">
		<?php if (has_post_thumbnail() && !post_password_required()): ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>
		<h1 class="header-title">
			<?php the_title(); ?>
		</h1>
		<span class="header-meta">
			<?php echo sprintf('%2$s', get_post_format_string(get_post_format()), get_the_date()); ?> |
			<?php comments_number(__('Aucun commentaire', TEXT_TRANSLATION_DOMAIN), __('Un commentaire', TEXT_TRANSLATION_DOMAIN), __('% commentaires', TEXT_TRANSLATION_DOMAIN)); ?> 
			<?php edit_post_link( __('Edit', TEXT_TRANSLATION_DOMAIN), '<span class="edit-link">', '</span>' ); ?>
		</span>
	</header>
	<div class="content">
		<?php the_content(__('Lire la suite', TEXT_TRANSLATION_DOMAIN)); ?>
	</div>
</article>