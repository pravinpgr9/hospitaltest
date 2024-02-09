<?php
/**
 * The default template for displaying post details
 */

$the_post_id              = get_the_ID();
$flydoctor_post_view_type = ( defined( 'FW' ) ) ? fw_get_db_post_option( $the_post_id, 'post_type' ) : '';

$post_meta_options['enable_post_author']     = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_author' ) : 'yes';
$post_meta_options['enable_post_date']       = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_date' ) : 'yes';
$post_meta_options['enable_post_comments']   = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_comments' ) : 'yes';
$post_meta_options['enable_related_posts']   = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_related_posts' ) : 'no';
$post_meta_options['enable_post_pagination'] = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_pagination' ) : 'yes';
$post_meta_options['enable_post_author_box'] = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_author_box' ) : 'yes';
$post_meta_options['enable_post_tags']       = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_tags' ) : 'yes';
$post_meta_options['enable_post_categories'] = ( defined( 'FW' ) ) ? fw_get_db_settings_option( 'enable_post_categories' ) : 'yes';
?>
	<!-- Post -->
	<article id="post-<?php the_ID(); ?>" class="article content-blog" itemscope itemtype="http://schema.org/Article">
		<div class="post-media">
			<?php if ( ! empty( $flydoctor_post_view_type ) ) :
				flydoctor_theme_get_post_view_type( $flydoctor_post_view_type, $the_post_id );
			else :
				$image = wp_get_attachment_url( get_post_thumbnail_id( $the_post_id ), 'post-thumbnails' );
				flydoctor_theme_show_default_post_image( $image, $the_post_id );
			endif; ?>
		</div>

		<h3 class="post-title" itemprop="name"><?php the_title(); ?></h3>

		<?php flydoctor_theme_post_meta_1( $post_meta_options ); ?>

		<div class="post-content" itemprop="articleBody">
			<?php the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'flydoctor' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) ); ?>
		</div>

		<?php if ( $post_meta_options['enable_post_categories'] == 'yes' ) : ?>
			<?php esc_html_e( 'Categories:', 'flydoctor' ); ?>
			<?php echo get_the_term_list( $the_post_id, 'category', '', ', ', '' ); ?>
		<?php endif; ?>

		<?php if ( $post_meta_options['enable_post_tags'] == 'yes' && has_tag() ) : ?>
			<div class="post-bottom clearfix">
                <div class="post-taglist">
                    <?php the_tags( '', ' ', '' ); ?>
                </div>
			</div>
		<?php endif; ?>
	</article>
	<!--/ Post -->

<?php if ( $post_meta_options['enable_post_author_box'] == 'yes' ) : ?>
	<?php get_template_part( 'templates/single/content-author' ); ?>
<?php endif; ?>

<?php if ( $post_meta_options['enable_related_posts'] == 'yes' ) : ?>
	<?php get_template_part( 'templates/single/related-posts' ); ?>
<?php endif; ?>

<?php if ( $post_meta_options['enable_post_pagination'] == 'yes' ) : ?>
	<?php get_template_part( 'templates/single/post-pagination' ); ?>
<?php endif;