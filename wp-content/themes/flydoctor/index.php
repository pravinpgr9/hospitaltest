<?php
/**
 * The template for displaying Archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
flydoctor_theme_header_image();
$flydoctor_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
$flydoctor_posts_view_type  = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'posts_view_type', 'list' ) : 'list';
$flydoctor_aditional_class  = '';
if ( $flydoctor_posts_view_type == 'grid' && have_posts() ) {
	$flydoctor_aditional_class = 'postlist-masonry';
}
?>
	<div class="page-wrapper <?php flydoctor_theme_get_sidebar_class( $flydoctor_sidebar_position ); ?>">
		<div class="container">
			<div class="row">
				<!-- Content -->
				<main class="content <?php echo esc_attr( $flydoctor_aditional_class ); ?>">
					<!-- PostList -->
					<?php if ( have_posts() ) :
						// Start the Loop.
						while ( have_posts() ) : the_post();
							get_template_part( 'templates/blog/' . $flydoctor_posts_view_type );
						endwhile;
					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );
					endif; ?>
					<!--/ PostList -->
					<div class="clearfix"></div>
                    <div class="fly-pagination">
                        <span class="fly-next"><?php previous_posts_link( esc_html__('Newer Posts', 'flydoctor' ) ); ?></span>
                        <span class="fly-prev"><?php next_posts_link( esc_html__('Older Posts', 'flydoctor' ) ); ?></span>
                    </div>
				</main>
				<!--/ Content -->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php
get_footer();