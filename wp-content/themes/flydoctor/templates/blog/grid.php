<?php
/**
 * The template for displaying sticky posts in the Image post format
 */

$flydoctor_post_id = get_the_ID();
if ( ! isset( $extra_options ) ) {
	$extra_options = array();
}
$flydoctor_permalink = get_permalink();

$flydoctor_post_view_type = ( defined( 'FW' ) ) ? fw_get_db_post_option( $flydoctor_post_id, 'post_type' ) : '';
if ( ! empty( $extra_options ) ) {
	$post_meta_options = $extra_options;
} else {
	$post_meta_options['enable_post_author']   = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_author' ) : 'yes';
	$post_meta_options['enable_post_date']     = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_date' ) : 'yes';
	$post_meta_options['enable_post_comments'] = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_comments' ) : 'yes';
}

$image = wp_get_attachment_url( get_post_thumbnail_id( $flydoctor_post_id ), 'post-thumbnails' );
?>
<!-- Post -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?> itemscope itemtype="http://schema.org/Article">
	<?php if ( ! empty( $flydoctor_post_view_type ) || ! empty( $image ) ) : ?>
		<div class="post-media">
			<?php if ( ! empty( $flydoctor_post_view_type ) ) :
				flydoctor_theme_get_post_view_type( $flydoctor_post_view_type, $flydoctor_post_id );
			else :
				flydoctor_theme_show_default_post_image( $image, $flydoctor_post_id );
			endif; ?>
		</div>
	<?php endif; ?>

	<h3 class="post-title"><a href="<?php echo esc_url( $flydoctor_permalink ); ?>"
							  itemprop="name"><?php the_title(); ?></a></h3>

	<?php flydoctor_theme_post_meta_1( $post_meta_options ); ?>

	<div class="post-content" itemprop="articleBody">
		<?php if ( get_option( 'rss_use_excerpt' ) == '0' ) {
			the_content();
		} else {
			the_excerpt();
		} ?>
	</div>

	<div class="post-links">
		<a class="post-read-more" itemprop="url"
		   href="<?php echo esc_url( $flydoctor_permalink ); ?>"><?php esc_html_e( 'Continue Reading', 'flydoctor' ); ?></a>
	</div>
</article>
<!--/ Post -->