<?php
//display comment
if ( post_password_required() ) {
	return false;
}; ?>
<div id="comments" class="single-comment-wrap comments-area">
	<?php if ( have_comments() ) : ?>
		<div class="comment-title block-title-wrap">
			<h3>
				<i class="fa fa-comments"></i>
				<?php comments_number( esc_html__('No Comment', 'bingo'), esc_html__('1 Comment', 'bingo' ), esc_html__('% Comments', 'bingo') ); ?>
			</h3>
		</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="comment-navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bingo' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'bingo' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'bingo' ) ); ?></div>
			</nav>
		<?php endif; ?>

		<ol class="comment-list entry">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'avatar_size' => 80,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="comment-navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bingo' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'bingo' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'bingo' ) ); ?></div>
			</nav>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bingo' ); ?></p>
	<?php endif; ?>
	<?php
	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$bingo_ruby_enable_website_form = bingo_ruby_core::get_option('single_post_box_comment_web');
    $commenter = wp_get_current_commenter();
    $consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	if ( empty( $bingo_ruby_enable_website_form ) ) {
		$bingo_ruby_fields = array(
			'author' => '<p class="comment-form-author"><label for="author" >' . esc_html__( 'Name', 'bingo' ) . '</label><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'bingo' ) . '..." size="30" ' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email"><label for="email" >' . esc_html__( 'Email', 'bingo' ) . '</label><input id="email" name="email" type="text" placeholder="' . esc_attr__( 'Email', 'bingo' ) . '..." ' . $aria_req . ' /></p>',
            'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'bingo' ) . '</label></p>',
		);
	} else {
		$bingo_ruby_fields = array(
			'author' => '<p class="comment-form-author"><label for="author" >' . esc_html__( 'Name', 'bingo' ) . '</label><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'bingo' ) . '..." size="30" ' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email"><label for="email" >' . esc_html__( 'Email', 'bingo' ) . '</label><input id="email" name="email" type="text" placeholder="' . esc_attr__( 'Email', 'bingo' ) . '..." ' . $aria_req . ' /></p>',
			'url'    => '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'bingo' ) . '</label>' . '<input id="url" name="url" type="text" placeholder="' . esc_attr__( 'Website', 'bingo' ) . '..." ' . $aria_req . ' /></p>',
            'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'bingo' ) . '</label></p>',
		);
	}

	if ( is_user_logged_in() ) {
		$current_user = wp_get_current_user();
		$args         = array(
			'title_reply'          => esc_html__( 'Leave a Response', 'bingo' ),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'comment_field'        => '<p class="comment-form-comment"><label for="comment" >' . esc_html__( 'Comment', 'bingo' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_html__( 'Write your comment here...', 'bingo' ) . '"></textarea></p>',
			'fields'               => apply_filters( 'comment_form_default_fields', $bingo_ruby_fields ),
			'id_submit'            => 'comment-submit',
			'class_submit'         => 'clearfix',
			'label_submit'         => esc_html__( 'Leave a comment', 'bingo' )
		);
	} else {
		$args = array(
			'title_reply'          => esc_html__( 'Leave a Response', 'bingo' ),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'comment_field'        => '<p class="comment-form-comment"><label for="comment" >' . esc_html__( 'Comment', 'bingo' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_html__( 'Write your comment here...', 'bingo' ) . '"></textarea></p>',
			'fields'               => apply_filters( 'comment_form_default_fields', $bingo_ruby_fields ),
			'id_submit'            => 'comment-submit',
			'class_submit'         => 'clearfix',
			'label_submit'         => esc_html__( 'Leave a comment', 'bingo' )
		);
	}; ?>
	<?php comment_form( $args ); ?>
</div>
