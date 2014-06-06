<?php if (post_password_required()) return; ?> 
<div id="comments" class="comments-area">
	<?php if (have_comments()): ?>
		<h2 class="comments-title">
			<?php
                printf(_n(apply_filters('etendard_commentaire_unique', 'Un commentaire a été rédigé, allez-vous ajouter le votre ?'), apply_filters('etendard_commentaire_multiple', '%1$s commentaires ont été rédigés, allez-vous ajouter le votre ?'), get_comments_number(), 'etendard'), number_format_i18n(get_comments_number()));
            ?>
		</h2>
		
		<?php comment_form(array(
			'comment_notes_before'=>'',
			'comment_notes_after'=>'',
			'title_reply'=>'',
			'title_reply_to'=>apply_filters('etendard_commentaire_repondre_a', __('Répondre à %s', 'etendard')),
			'label_submit'=>apply_filters('etendard_commentaire_envoyer', __('Envoyer', 'etendard')),
		)); ?>
		
		<ol class="comment-list">
			<?php wp_list_comments(array('callback'=>'etendard_comment')); ?>
		</ol><!-- .commentlist -->
 
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')){ ?>
		<nav role="navigation" id="comment-nav-below" class="comment-navigation">
			<div class="nav-previous">
            	<?php previous_comments_link(apply_filters('etendard_commentaire_precedents', __('Commentaires précédents', 'etendard'))); ?>
            </div>
            <div class="nav-next">
            	<?php next_comments_link(apply_filters('etendard_commentaire_suivants', __('Commentaires suivants', 'etendard'))); ?>
            </div>
        </nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
        <?php } // check for comment navigation ?>
 
	<?php else:  ?>
		<h2 class="comments-title">
			<?php apply_filters('etendard_commentaire_premier', __('Soyez le premier à rédiger un commentaire.', 'etendard')); ?>
		</h2>

		<?php comment_form(array(
			'comment_notes_before'=>'',
			'comment_notes_after'=>'',
			'title_reply'=>'',
			'title_reply_to'=>apply_filters('etendard_commentaire_repondre_a', __('Répondre à %s', 'etendard')),
			'label_submit'=>apply_filters('etendard_commentaire_envoyer', __('Envoyer', 'etendard')),
		)); 
	endif; ?>
    <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')): ?>
		<p class="nocomments">
			<?php echo apply_filters('etendard_commentaires_clos', __('Les commentaires sont clos.', 'etendard')); ?>
		</p>
	<?php endif; ?>
</div><!-- #comments .comments-area -->