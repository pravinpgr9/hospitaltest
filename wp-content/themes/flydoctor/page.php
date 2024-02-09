<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */
get_header();
flydoctor_theme_header_image();
$flydoctor_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
?>
	<!-- Page -->
	<div class="page-wrapper <?php flydoctor_theme_get_sidebar_class( $flydoctor_sidebar_position ); ?>">
		<div class="container">
			<div class="row">
				<!-- Content -->
				<main class="fly-content">
					<?php while ( have_posts() ) : the_post(); ?>
						<!-- Post -->
						<article class="article" itemscope itemtype="http://schema.org/Article">
							<h3 class="post-title" itemprop="name"><?php the_title(); ?></h3>

							<div class="post-content">
								<?php the_content(); ?>
							</div>
						</article>
						<?php
						// If comments are open, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
						?>
					<?php endwhile; ?>
				</main>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php
get_footer();