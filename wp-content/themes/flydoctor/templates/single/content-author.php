<?php
$author_description = get_the_author_meta( 'description' );
if ( ! empty( $author_description ) ) : ?>
	<div class="fly-author-box widget-author">
		<div class="avatar-wrap"><?php echo get_avatar( get_the_author_meta( 'ID' ), '130' ); ?></div>

		<div class="name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></div>

		<p><?php echo esc_html( $author_description ); ?></p>
	</div>
<?php
endif;