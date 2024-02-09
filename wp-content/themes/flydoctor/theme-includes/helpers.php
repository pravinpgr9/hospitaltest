<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Helper functions and classes with static methods for usage in theme
 */

/**
 * Getter function for Featured Content Plugin.
 *
 * @return array An array of WP_Post objects.
 */
function flydoctor_theme_get_featured_posts() {
	/**
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'flydoctor_theme_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function flydoctor_theme_has_featured_posts() {
	return ! is_paged() && (bool) flydoctor_theme_get_featured_posts();
}


if ( ! function_exists( 'flydoctor_theme_get_sidebar_class' ) ) :
	/**
	 * get parent sidebar class
	 */
	function flydoctor_theme_get_sidebar_class( $sidebar_position ) {
		if ( $sidebar_position == 'left' ) {
			$class = 'page-sidebar-left';
		} elseif ( $sidebar_position == 'right' ) {
			$class = 'page-sidebar';
		} else {
			$class = 'page-narrow'; // inspect this class
		}

		echo esc_attr( $class );
	}
endif;


if ( ! function_exists( 'flydoctor_theme_type_logo' ) ) :
	/**
	 * display theme logo
	 */
	function flydoctor_theme_type_logo() {
		if ( has_custom_logo() ) :
			the_custom_logo();
		else : ?>
			<a class="logo-url logo-default logo-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
				<?php bloginfo( 'name' ); ?>
            </a>
		<?php endif;
	}
endif;


if ( ! function_exists( 'flydoctor_theme_header_class' ) ) :
	/**
	 * return the the header class
	 */
	function flydoctor_theme_header_class() {
		if ( ! function_exists( 'fw_get_db_settings_option' ) ) {
			return '';
		}
		global $post;
		$general_header_options = array();
		$post_type              = get_post_type();

		// general header options
		if ( is_front_page() && ( get_option( 'show_on_front', 'posts' ) == 'posts' ) ) {
			// front page
			$general_header_options = fw_get_db_settings_option( 'homepage_header_type', '' );
			$header_type            = $general_header_options;
		} elseif ( is_home() ) {
			// blog page
			$general_header_options = fw_get_db_settings_option( 'blogpage_header_type', '' );
			$header_type            = $general_header_options;
		} elseif ( is_search() ) {
			$general_header_options = fw_get_db_settings_option( 'search_header_type', '' );
			$header_type            = $general_header_options;
		} elseif ( is_404() ) {
			$general_header_options = fw_get_db_settings_option( '404_header_type', '' );
			$header_type            = $general_header_options;
		} elseif ( $post_type == 'page' ) {
			$title                  = get_the_title();
			$general_header_options = fw_get_db_settings_option( 'page_header_type', '' );
		} elseif ( $post_type == 'fw-portfolio' ) {
			$title                  = get_the_title();
			$general_header_options = fw_get_db_settings_option( 'portfolio_header_type', '' );
		} elseif ( is_archive() ) {
			$title                  = ( is_category() || is_tag() ) ? single_cat_title( '', false ) : esc_html__( 'Archive', 'flydoctor' );
			$general_header_options = fw_get_db_settings_option( 'post_header_type', '' );
			$header_type            = $general_header_options;
		} else {
			// posts general options
			$title                  = get_the_title();
			$general_header_options = fw_get_db_settings_option( 'post_header_type', '' );
		}

		if ( is_single() || is_page() ) {
			$header_type = fw_get_db_post_option( $post->ID, 'post_header_type' );
			if ( empty( $header_type ) || ( isset( $header_type['header_type'] ) && $header_type['header_type'] == 'general' ) ) {
				// get options from general when header is empty or header is selected from "general"
				$header_type = $general_header_options;
			}
		} else {
			if ( is_category() ) {
				$term = get_category( get_query_var( 'cat' ), false );
			} else {
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			}

			if ( ! is_wp_error( $term ) && $term != false ) {
				$term_id     = $term->term_id;
				$taxonomy    = $term->taxonomy;
				$header_type = fw_get_db_term_option( $term_id, $taxonomy, 'blog_header_type', '' );
			}
		}

		if ( isset( $header_type['header_type'] ) && $header_type['header_type'] == 'absolute' ) {
			return 'fly-absolute-header';
		} else {
			return 'fly-no-absolute-header';
		}
	}
endif;


if ( ! function_exists( 'flydoctor_theme_header_image' ) ) :
	/**
	 * display theme header image
	 */
	function flydoctor_theme_header_image() {
		if ( ! function_exists( 'fw_get_db_settings_option' ) ) {
			return;
		}
		global $post;
		$title                  = $desc = '';
		$general_header_options = array();
		$post_type              = get_post_type();

		// general header options
		if ( is_front_page() && ( get_option( 'show_on_front', 'posts' ) == 'posts' ) ) {
			// front page
			$general_header_options = fw_get_db_settings_option( 'homepage_header_type', '' );
			$header_type            = $general_header_options;
		} elseif ( is_home() ) {
			// blog page
			$general_header_options = fw_get_db_settings_option( 'blogpage_header_type', '' );
			$header_type            = $general_header_options;
		} elseif ( is_search() ) {
			$general_header_options = fw_get_db_settings_option( 'search_header_type', '' );
			$header_type            = $general_header_options;
		} elseif ( is_404() ) {
			$general_header_options = fw_get_db_settings_option( '404_header_type', '' );
			$header_type            = $general_header_options;
		} elseif ( $post_type == 'page' ) {
			$title                  = get_the_title();
			$general_header_options = fw_get_db_settings_option( 'page_header_type', '' );
		} elseif ( $post_type == 'fw-portfolio' ) {
			$title                  = get_the_title();
			$general_header_options = fw_get_db_settings_option( 'portfolio_header_type', '' );
		} elseif ( is_archive() ) {
			$title                  = ( is_category() || is_tag() ) ? single_cat_title( '', false ) : esc_html__( 'Archive', 'flydoctor' );
			$general_header_options = fw_get_db_settings_option( 'post_header_type', '' );
			$header_type            = $general_header_options;
		} else {
			// posts general options
			$title                  = get_the_title();
			$general_header_options = fw_get_db_settings_option( 'post_header_type', '' );
		}

		if ( is_single() || is_page() ) {
			$header_type = fw_get_db_post_option( $post->ID, 'post_header_type' );
			if ( empty( $header_type ) || ( isset( $header_type['header_type'] ) && $header_type['header_type'] == 'general' ) ) {
				// get options from general when header is empty or header is selected from "general"
				$header_type = $general_header_options;
			}
		} else {
			if ( is_category() ) {
				$term = get_category( get_query_var( 'cat' ), false );
			} else {
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			}

			if ( ! is_wp_error( $term ) && $term != false ) {
				$term_id     = $term->term_id;
				$taxonomy    = $term->taxonomy;
				$title       = $term->name;
				$desc        = $term->description;
				$header_type = fw_get_db_term_option( $term_id, $taxonomy, 'blog_header_type', '' );
			}
		}

		// check if header is not empty
		if ( ! empty( $header_type ) ) :
			// Header Image
			if ( $header_type['header_type'] == 'image' ) :
				$before_title = isset( $header_type['image']['before_title'] ) ? $header_type['image']['before_title'] : '';
				$title          = isset( $header_type['image']['title'] ) ? $header_type['image']['title'] : $title;
				$desc           = isset( $header_type['image']['desc'] ) ? $header_type['image']['desc'] : $desc;
				// header image
				$img      = $header_type['image']['img'];
				$bg_image = ( isset( $img['url'] ) && ! empty( $img['url'] ) ) ? 'style="background-image: url(' . esc_url( $img['url'] ) . ');"' : '';
				?>
				<!-- Main Image -->
				<section class="fly-header fly-header-image full-height parallax" <?php echo( $bg_image ); ?>>
					<?php if ( ! empty( $before_title ) || ! empty( $title ) || ! empty( $desc ) ) : ?>
						<div class="fly-header-content">
							<!-- Post -->
							<article class="article">
								<div class="post-content">
									<?php if ( ! empty( $before_title ) ) : ?>
										<div class="post-meta">
											<span class="post-category"><?php echo( $before_title ); ?></span>
										</div>
									<?php endif; ?>

									<h2 class="post-title"><?php echo( $title ); ?></h2>

									<?php if ( ! empty( $desc ) ) : ?>
										<div class="post-meta font2">
											<span class="post-author"><?php echo( $desc ); ?></span>
										</div>
									<?php endif; ?>
								</div>
							</article>
							<!--/ Post -->
						</div>
					<?php endif; ?>
				</section>
				<!--/ Main Image -->
			<?php elseif ( $header_type['header_type'] == 'slider' ) :
				$slider_id = $header_type['slider']['slider_id'];

				if ( ! empty( $slider_id ) ) {
					$slider_settings = fw()->extensions->get( 'population-method' )->get_frontend_data( $slider_id );
					$meta            = fw_get_db_post_option( $slider_id );
					$post_status     = get_post_status( $slider_id );
					if ( 'publish' === $post_status and isset( $meta['populated'] ) ) {
						$slider_name = $meta['slider']['selected'];
						echo ( fw()->extensions->get( 'slider' ) ) ? flydoctor_theme_render_view( fw()->extensions->get( 'slider' )->locate_path( '/extensions/' . $slider_name . '/views/' . $slider_name . '.php' ), array( 'data' => $slider_settings ) ) : '';
					}
				} ?>
			<?php else : ?>
				<div class="fly-empty-header"></div>
			<?php endif;
		else : // empty header
			?>
			<div class="fly-empty-header"></div>
		<?php endif;
	}
endif;


if ( ! function_exists( 'flydoctor_theme_render_view' ) ) :
	/**
	 * Safe render a view and return html
	 * In view will be accessible only passed variables
	 * Use this function to not include files directly and to not give access to current context variables (like $this)
	 *
	 * @param string $file_path
	 * @param array $view_variables
	 * @param bool $return In some cases, for memory saving reasons, you can disable the use of output buffering
	 *
	 * @return string HTML
	 */
	function flydoctor_theme_render_view( $file_path, $view_variables = array(), $return = true ) {
		extract( $view_variables, EXTR_REFS );

		unset( $view_variables );

		if ( $return ) {
			ob_start();

			require $file_path;

			return ob_get_clean();
		} else {
			require $file_path;
		}
	}
endif;


if ( ! function_exists( 'flydoctor_theme_print' ) ):
	/**
	 * echo alternative
	 *
	 */
	function flydoctor_theme_print( $var ) {
		print $var;
	}
endif;


if ( ! function_exists( 'flydoctor_theme_array_merge_recursive' ) ) :
	/**
	 * Merge array recursive
	 *
	 * @param array $a
	 * @param array $b
	 */
	function flydoctor_theme_array_merge_recursive( $a, $b ) {
		if ( ! is_array( $a ) || ! is_array( $b ) ) {
			return $a;
		}

		foreach ( array_merge( array_keys( $a ), array_keys( $b ) ) as $k ) {
			if (
				isset( $b[ $k ] ) && isset( $a[ $k ] )
				&&
				is_array( $a[ $k ] ) && is_array( $b[ $k ] )
			) {
				$a[ $k ] = flydoctor_theme_array_merge_recursive( $a[ $k ], $b[ $k ] );
			} elseif ( isset( $b[ $k ] ) ) {
				$a[ $k ] = $b[ $k ];
			}
		}

		return $a;
	}
endif;


if ( ! function_exists( 'flydoctor_theme_get_remote_fonts' ) ) :
	/**
	 * Get remote fonts
	 *
	 * @param array $include_from_google
	 */
	function flydoctor_theme_get_remote_fonts( $include_from_google ) {
		if ( ! sizeof( $include_from_google ) ) {
			return '';
		}

		$html = "https://fonts.googleapis.com/css?family=";
		foreach ( $include_from_google as $font => $styles ) {
			if ( array_key_exists( 'false', $styles['variation'] ) ) {
				unset( $styles['variation']['false'] );
			}

			$html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variation'] ) . '|';

			if ( array_key_exists( 'false', $styles['subset'] ) ) {
				unset( $styles['subset']['false'] );
			}

			if ( count( $styles['subset'] ) > 1 ) {
				// if font have more than 1 subset
				foreach ( $styles['subset'] as $subset_item ) {
					$subset_key            = $subset_item;
					$subset[ $subset_key ] = $subset_key;
				}
			} else {
				$subset_key            = implode( '', $styles['subset'] );
				$subset[ $subset_key ] = $subset_key;
			}
		}
		$html = substr( $html, 0, - 1 );
		$html .= '&subset=' . implode( ',', $subset );

		return $html;
	}
endif;


if ( ! function_exists( 'flydoctor_theme_get_font_array' ) ) :
	/**
	 * get an array of fonts
	 *
	 * @param array $font_array
	 * @param array $color_settings
	 */
	function flydoctor_theme_get_font_array( $font_array, $return_style = false, $important = false ) {
		global $flydoctor_google_fonts_list_general;

		$important_style = ( $important ) ? '!important' : '';

		$return = "font-family:'" . $font_array['family'] . "' " . $important_style . ";";
		$return .= ! empty( $font_array['size'] ) ? "font-size:" . $font_array['size'] . 'px ' . $important_style . ';' : '';
		$return .= ! empty( $font_array['line-height'] ) ? "line-height:" . $font_array['line-height'] . 'px ' . $important_style . ';' : '';
		$return .= ! empty( $font_array['letter-spacing'] ) ? "letter-spacing:" . $font_array['letter-spacing'] . 'px ' . $important_style . ';' : '';
		$return .= ! empty( $font_array['color'] ) ? "color:" . $font_array['color'] . " " . $important_style . ";" : '';

		// if is google font
		if ( isset( $font_array['google_font'] ) && $font_array['google_font'] ) {
			if ( strpos( $font_array['variation'], 'italic' ) !== false ) {
				$return .= 'font-style:italic ' . $important_style . ';';
			} elseif ( strpos( $font_array['variation'], 'oblique' ) !== false ) {
				$return .= 'font-style:oblique ' . $important_style . ';';
			} else {
				$return .= 'font-style:normal ' . $important_style . ';';
			}

			$return                                                                              .= ( intval( $font_array['variation'] ) != 0 || intval( $font_array['variation'] ) != 0 ) ? "font-weight:" . intval( $font_array['variation'] ) . ' ' . $important_style . ';' : "font-weight:400 " . $important_style . ";";
			$flydoctor_google_fonts_list_general[ $font_array['family'] ]['variation'][ $font_array['variation'] ] = $font_array['variation'];
			$flydoctor_google_fonts_list_general[ $font_array['family'] ]['subset'][ $font_array['subset'] ]       = $font_array['subset'];
		} elseif ( isset( $font_array['style'] ) ) {
			$return .= "font-style:" . $font_array['style'] . " " . $important_style . "; ";
			$return .= "font-weight:" . $font_array['weight'] . ' ' . $important_style . ';';
		}

		if ( $return_style ) {
			return $return;
		} else {
			return 'style="' . $return . '"';
		}
	}
endif;


if ( ! function_exists( 'flydoctor_theme_get_one_post_category' ) ) :
	/**
	 * Display one post category
	 */
	function flydoctor_theme_get_one_post_category( $post_id ) {
		if ( ! function_exists( 'fw_get_db_term_option' ) ) {
			return;
		}

		$post_type = get_post_type( $post_id );
		if ( $post_type == 'fw-portfolio' ) {
			$taxonomy = 'fw-portfolio-category';
		} else {
			$taxonomy = 'category';
		}

		$terms    = wp_get_post_terms( $post_id, $taxonomy );
		$one_term = '';
		foreach ( $terms as $term ) {
			$one_term = $term;
			if ( $term->parent != 0 ) {
				$one_term = $term;
				break;
			}
		}

		if ( $one_term ) {
			echo '<span class="post-category" itemprop="keywords"><a href="' . esc_url(get_term_link( $one_term ) ). '">' . esc_html($one_term->name) . '</a></span>';
		}
	}
endif;


if ( ! function_exists( 'flydoctor_theme_get_post_view_type' ) ) :
	/**
	 * Display post image, video or audio
	 */
	function flydoctor_theme_get_post_view_type( $post_view_type, $post_id ) {
		$image = wp_get_attachment_url( get_post_thumbnail_id( $post_id ), 'post-thumbnails' );

		if ( $post_view_type['post_type'] == 'quote' ) {
			if ( ! empty( $image ) ): ?>
				<img alt="<?php the_title(); ?>" src="<?php echo esc_url( $image ); ?>" itemprop="image"/>
			<?php endif; ?>
			<!-- get post quote -->
			<?php if ( isset( $post_view_type['quote']['quote'] ) && ! empty( $post_view_type['quote']['quote'] ) ): ?>
				<blockquote itemprop="citation">
					<?php echo esc_html( $post_view_type['quote']['quote'] ); ?>
				</blockquote>
				<div class="post-label"><i class="fa fa-quote-left"></i></div>
			<?php endif; ?>
		<?php } elseif ( $post_view_type['post_type'] == 'link' ) {
			if ( ! empty( $image ) ):?>
				<img alt="<?php the_title(); ?>" src="<?php echo esc_url( $image ); ?>" itemprop="image"/>
			<?php endif; ?>
			<!-- get post link -->
			<?php if ( isset( $post_view_type['link']['text'] ) && ! empty( $post_view_type['link']['text'] ) ): ?>
				<a class="post-overlay-link" href="<?php echo esc_url( $post_view_type['link']['link'] ) ?>"
				   target="_blank">
					<blockquote itemprop="citation">
						<?php echo esc_html( $post_view_type['link']['text'] ); ?>
					</blockquote>
				</a>
				<div class="post-label"><i class="fa fa-link"></i></div>
			<?php endif; ?>
		<?php } elseif ( $post_view_type['post_type'] == 'audio' ) {
			if ( isset( $post_view_type['audio']['audio'] ) && ! empty( $post_view_type['audio']['audio'] ) ) {
				echo do_shortcode( $post_view_type['audio']['audio'] );
			} else {
				flydoctor_theme_show_default_post_image( $image, $post_id );
			}

			// audio icon
			echo '<div class="post-label"><i class="fa fa-file-audio-o"></i></div>';
		} elseif ( $post_view_type['post_type'] == 'video' ) {
			if ( isset( $post_view_type['video']['video'] ) && ! empty( $post_view_type['video']['video'] ) ) {
				flydoctor_theme_print( $post_view_type['video']['video'] );

				// video icon
				echo '<div class="post-label"><i class="fa fa-file-movie-o"></i></div>';
			} else {
				flydoctor_theme_show_default_post_image( $image, $post_id );
			}
		} elseif ( $post_view_type['post_type'] == 'slider' ) {
			if ( isset( $post_view_type['slider']['images'] ) && ! empty( $post_view_type['slider']['images'] ) ) { ?>
				<div class="owl-carousel post-slider">
					<?php foreach ( $post_view_type['slider']['images'] as $img ): ?>
						<?php $attachment_title = get_the_title( $img['attachment_id'] ); ?>
						<a class="swipebox" data-rel="gallery-<?php echo esc_attr( $post_id ); ?>"
						   href="<?php echo esc_url( $img['url'] ); ?>"
						   title="<?php echo esc_attr( $attachment_title ); ?>">
							<img src="<?php echo esc_url( $img['url'] ); ?>"
								 alt="<?php echo esc_attr( $attachment_title ); ?>" itemprop="image"/>
						</a>
					<?php endforeach; ?>
				</div>
				<div class="post-label"><i class="fa fa-file-photo-o"></i></div>
				<?php
			} else {
				flydoctor_theme_show_default_post_image( $image, $post_id );
			}
		} else {
			flydoctor_theme_show_default_post_image( $image, $post_id );
		}
	}
endif;


if ( ! function_exists( 'flydoctor_theme_show_default_post_image' ) ) :
	/**
	 * Display default post image
	 */
	function flydoctor_theme_show_default_post_image( $image, $post_id ) {
		if ( ! empty( $image ) ) : ?>
			<div class="text-center">
				<div class="position-relative inline-block">
					<img alt="<?php the_title(); ?>" src="<?php echo esc_url( $image ); ?>" itemprop="image"/>
					<div class="post-label"><i class="fa fa-file-photo-o"></i></div>
				</div>
			</div>
		<?php endif;
	}
endif;


if ( ! function_exists( 'flydoctor_include_file_first_child_then_parent' ) ) :
	/**
	 * Include a file first from child if exist else from parent
	 * a file from url (example url/logo.png)
	 */
	function flydoctor_include_file_first_child_then_parent( $file ) {
		if ( file_exists( get_stylesheet_directory() . $file ) ) {
			return get_stylesheet_directory_uri() . $file;
		} else {
			return get_template_directory_uri() . $file;
		}
	}
endif;


if ( ! function_exists( 'flydoctor_theme_post_meta_1' ) ) :
	/**
	 * Display post meta
	 */
	function flydoctor_theme_post_meta_1( $post_meta_options ) { ?>
		<?php if ( $post_meta_options['enable_post_author'] == 'yes' || $post_meta_options['enable_post_date'] == 'yes' ): ?>
			<div class="post-meta font2">
				<?php if ( $post_meta_options['enable_post_author'] == 'yes' ): ?>
					<span class="post-author" itemprop="author"><?php esc_html_e( 'written by', 'flydoctor' ); ?> <a
								href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
				<?php endif; ?>
				<?php if ( $post_meta_options['enable_post_date'] == 'yes' ) : ?>
					<a href="<?php the_permalink(); ?>" class="post-date"><?php echo esc_html( get_the_date() ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php }
endif;


if ( ! function_exists( 'flydoctor_related_posts' ) ) :
	/**
	 * Return post related articles
	 */
	function flydoctor_related_posts() {
		global $post;
		$taxonomy   = 'post_tag';
		$post_terms = array();
		$terms      = wp_get_post_terms( $post->ID, $taxonomy );
		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$post_terms[] = $term->term_id;
			}
		} else {
			// if post have 0 tags
			$taxonomy = 'category';
			$terms    = wp_get_post_terms( $post->ID, $taxonomy );
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$post_terms[] = $term->term_id;
				}
			}
		}

		$posts_per_page = 3;
		$args           = array(
			'posts_per_page' => $posts_per_page,
			'orderby'        => 'date',
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'post__not_in'   => array( $post->ID ),
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'id',
					'terms'    => $post_terms
				),
			)
		);

		$all_posts = new WP_Query( $args );

		return $all_posts->posts;
	}
endif;


if ( ! function_exists( 'flydoctor_socials' ) ) :
	/**
	 * Display the social links
	 */
	function flydoctor_socials( $atts = array( 'class' => '' ) ) {
		$socials = fw_get_db_settings_option( 'socials' );
		$html    = '';
		if ( ! empty( $socials ) ) {
			$social_title = fw_get_db_settings_option( 'social_title' );
			if ( $social_title == 'no' ) {
				$atts['class'] .= ' social-no-title';
			}

			// collect the html for socials
			$html .= '<ul class="' . $atts['class'] . '">';
			foreach ( $socials as $item ) {
				$html .= '<li><a target="_blank" href="' . $item['social_link'] . '"><i class="' . $item['social_icon'] . '"></i>';
				if ( $social_title == 'yes' ) {
					$html .= $item['social_name'];
				}
				$html .= '</a></li>';
			}
			$html .= '</ul>';
		}

		echo( $html );
	}
endif;


if ( ! function_exists( 'flydoctor_responsive_heading_styles' ) ) :
	/**
	 * return text size styles
	 *
	 * @param array $atts
	 */
	function flydoctor_responsive_heading_styles( $atts = array( 'styles'    => array(),
	                                                           'selector'  => '',
	                                                           'important' => false
	)
	) {
		$return_html = $important = '';
		if ( isset( $atts['important'] ) && $atts['important'] ) {
			$important = ' !important';
		}

		if ( ! empty( $atts['styles'] ) && ! empty( $atts['selector'] ) ) {
			$atts['styles']['size']        = (int) $atts['styles']['size'];
			$atts['styles']['line-height'] = (int) $atts['styles']['line-height'];
			if ( $atts['styles']['size'] >= 20 && $atts['styles']['size'] <= 25 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.9, 0 ) . 'px' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.9, 0 ) . 'px' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 26 && $atts['styles']['size'] <= 30 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.8, 0 ) . 'px' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.8, 0 ) . 'px' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 31 && $atts['styles']['size'] <= 45 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.7, 0 ) . 'px' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.7, 0 ) . 'px' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 46 && $atts['styles']['size'] <= 65 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.6, 0 ) . 'px' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.6, 0 ) . 'px' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 66 && $atts['styles']['size'] <= 80 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.5, 0 ) . 'px' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.5, 0 ) . 'px' . $important . ';}';
			} elseif ( $atts['styles']['size'] >= 81 && $atts['styles']['size'] <= 100 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.4, 0 ) . 'px' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.4, 0 ) . 'px' . $important . ';}';
			} elseif ( $atts['styles']['size'] > 100 ) {
				$return_html .= $atts['selector'] . '{font-size: ' . round( $atts['styles']['size'] * 0.3, 0 ) . 'px' . $important . '; line-height: ' . round( $atts['styles']['line-height'] * 0.3, 0 ) . 'px' . $important . ';}';
			}
		}

		return $return_html;
	}
endif;


if ( ! function_exists( 'flydoctor_get_theme_advanced_styles' ) ) :
	/**
	 * Get shortcode advanced styles
	 *
	 * @param array $style
	 * @param array $atts
	 */
	function flydoctor_get_theme_advanced_styles( $style, $atts = array( 'custom_meta' => '' ) ) {
		$advanced_styles = '';
		global $flydoctor_google_fonts_list_general;
		if ( isset( $style['google_font'] ) && ( $style['google_font'] === true || $style['google_font'] === 'true' ) ) {
			// is google font

			$google_fonts = fw_get_google_fonts();

			// font style
			if ( strpos( $style['variation'], 'italic' ) !== false ) {
				$advanced_styles .= 'font-style: italic; ';
			} elseif ( strpos( $style['variation'], 'oblique' ) !== false ) {
				$advanced_styles .= 'font-style: oblique; ';
			} else {
				$advanced_styles .= 'font-style: normal; ';
			}

			// font weight
			$advanced_styles .= ( intval( $style['variation'] ) == 0 ) ? 'font-weight:400; ' : 'font-weight:' . intval( $style['variation'] ) . '; ';

			// save google font array in a global variable
			$flydoctor_google_fonts_list_general[ $style['family'] ]['variation'][ $style['variation'] ] = $style['variation'];
			$flydoctor_google_fonts_list_general[ $style['family'] ]['subset'][ $style['subset'] ]       = $style['subset'];

			// include and italic variation for font if current font has, because user can use <em> tag
			$italic_variation = ( $style['variation'] == 'regular' ) ? $italic_variation = "italic" : $style['variation'] . "italic";
			if ( in_array( $italic_variation, $google_fonts[ $style['family'] ]['variants'] ) ) {
				$flydoctor_google_fonts_list_general[ $style['family'] ]['variation'][ $italic_variation ] = $italic_variation;
			}

			if ( isset( $atts['custom_meta'] ) && ! empty( $atts['custom_meta'] ) ) {
				// save google font in a custom meta
				update_option( $atts['custom_meta'], $flydoctor_google_fonts_list_general );
			}
		} else {
			// is simple font
			$advanced_styles .= ( isset( $style['style'] ) && ! empty( $style['style'] ) ) ? 'font-style:' . esc_attr( $style['style'] ) . '; ' : '';
			$advanced_styles .= isset( $style['weight'] ) ? 'font-weight:' . esc_attr( $style['weight'] ) . '; ' : '';
		}

		$advanced_styles .= ( isset( $style['family'] ) && ! empty( $style['family'] ) ) ? 'font-family:' . esc_attr( $style['family'] ) . '; ' : '';
		$advanced_styles .= ! empty( $style['line-height'] ) ? is_numeric( $style['line-height'] ) ? 'line-height:' . esc_attr( $style['line-height'] ) . 'px; ' : 'line-height:' . esc_attr( $style['line-height'] ) . '; ' : '';
		$advanced_styles .= ! empty( $style['size'] ) ? is_numeric( $style['size'] ) ? 'font-size:' . esc_attr( $style['size'] ) . 'px; ' : 'font-size:' . esc_attr( $style['size'] ) . '; ' : '';
		$advanced_styles .= is_numeric( $style['letter-spacing'] ) ? 'letter-spacing:' . esc_attr( $style['letter-spacing'] ) . 'px; ' : '';
		$advanced_styles .= ! empty( $style['color'] ) ? 'color:' . esc_attr( $style['color'] ) . ';' : '';

		return $advanced_styles;
	}
endif;


if ( ! function_exists( 'flydoctor_get_comments_number' ) ) :
	function flydoctor_get_comments_number( $post_id ) {
		$num_comments = get_comments_number( $post_id ); // get_comments_number returns only a numeric value

		if ( $num_comments != 1 ) {
			$comments = esc_html__( 'comments', 'flydoctor' );
		} else {
			$comments = esc_html__( 'comment', 'flydoctor' );
		}

		return $comments;
	}
endif;


if ( ! function_exists( 'flydoctor_get_datetime_attribute' ) ) :
	/**
	 * Display specific date format for datetime attribute
	 *
	 * @param boolean $return
	 */
	function flydoctor_get_datetime_attribute( $return = false ) {
		$date      = get_the_date( 'Y-m-d---G:i:sP' );
		$date_time = str_replace( '---', 'T', $date );
		if ( $return ) {
			return $date_time;
		} else {
			echo esc_attr( $date_time );
		}
	}
endif;


