<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$flydoctor_aria_req  = ( get_option( 'require_name_email' ) ? 'required' : '' );

if ( is_user_logged_in() ) {
	$flydoctor_comment_field        = '<div class="form-group required"><label for="respondMessage">' . esc_html__( 'Comment', 'flydoctor' ) . '</label><textarea class="form-control" id="respondMessage" name="comment" required></textarea></div>';
	$flydoctor_textarea_field       = '';
	$flydoctor_comment_notes_before = '';
	$flydoctor_comment_notes_after  = '';
} else {
	$flydoctor_comment_field        = '';
	$flydoctor_comment_notes_before = '';
	$flydoctor_comment_notes_after  = '';
	$flydoctor_textarea_field       = '<div class="form-group required"><label for="respondMessage">' . esc_html__( 'message', 'flydoctor' ) . '</label><textarea class="form-control" id="respondMessage" name="comment" required></textarea></div>';
}

$flydoctor_args = array(
	'class_form'           => 'comment-form',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'title_reply'          => esc_html__( 'Leave a Comment', 'flydoctor' ),
	'title_reply_to'       => esc_html__( 'Leave Your Reply to %s', 'flydoctor' ),
	'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'flydoctor' ),
	'label_submit'         => esc_html__( 'Post Comment', 'flydoctor' ),
	'comment_field'        => $flydoctor_comment_field,
	'comment_notes_before' => $flydoctor_comment_notes_before,
	'comment_notes_after'  => $flydoctor_comment_notes_after,
	'fields'               => apply_filters( 'comment_form_default_fields', array(
			'author'        => '<div class="row">
			 <div class="col-sm-4">
				 <div class="form-group required">
					 <label for="respondName">' . esc_html__( 'Name', 'flydoctor' ) . '</label>
					 <input class="form-control" type="text" id="respondName" name="author" ' . $flydoctor_aria_req . ' />
				 </div>
			 </div>',
			'email'         => '<div class="col-sm-4">
			<div class="form-group required">
				<label for="respondEmail">' . esc_html__( 'email', 'flydoctor' ) . '</label>
				<input class="form-control" type="email" id="respondEmail" name="email" ' . $flydoctor_aria_req . ' />
			</div>
		</div>',
			'url'           => '<div class="col-sm-4">
			<div class="form-group">
				<label for="respondWebsite">' . esc_html__( 'Website', 'flydoctor' ) . '</label>
				<input class="form-control" type="url" id="url" name="respondWebsite" />
			</div>
		</div></div>',
			'comment_field' => $flydoctor_textarea_field
		)
	)
);
?>
<!-- Comments -->
<section id="comments" class="comments">
	<?php if ( have_comments() ) : ?>
		<h4 class="title"><?php esc_html_e( 'Comments', 'flydoctor' ); ?>(<?php comments_number( esc_html__( '0', 'flydoctor' ), esc_html__( '1', 'flydoctor' ), esc_html__( '%', 'flydoctor' ) ); ?>)</h4>

		<ol class="comment-list">
			<?php get_template_part( 'comments', 'template' ); ?>
			<?php wp_list_comments( array( 'callback' => 'flydoctor_theme_comment', 'style' => 'ol' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="navigation paging-navigation" role="navigation">
				<div class="pagination loop-pagination">
					<?php
					$flydoctor_pagination_args = array(
						'prev_text' => '<span> ' . esc_html__( 'PREV', 'flydoctor' ) . '</span>',
						'next_text' => '<span>' . esc_html__( 'NEXT', 'flydoctor' ) . '</span>',
					);
					paginate_comments_links( $flydoctor_pagination_args ); ?>
				</div>
			</nav>
		<?php endif; // Check for comment navigation. ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'flydoctor' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form( $flydoctor_args ); ?>
</section>