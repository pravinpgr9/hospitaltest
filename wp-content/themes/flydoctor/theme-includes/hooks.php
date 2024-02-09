<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Filters and Actions
 */

if ( ! function_exists( 'flydoctor_action_theme_setup' ) ) :
	/**
	 * Theme setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 * @internal
	 */
	function flydoctor_action_theme_setup() {
		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'flydoctor', get_template_directory() . '/languages' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		// Add support for featured content.
		add_theme_support( 'featured-content', array(
			'featured_content_filter' => 'flydoctor_theme_get_featured_posts',
			'max_posts'               => 6,
		) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );

		add_theme_support( 'post-thumbnails', array( 'post', 'fw-portfolio', 'product' ) );

		add_theme_support( "title-tag" );

		// Theme support woocommerce plugin
		add_theme_support('woocommerce');

		add_theme_support( 'wc-product-gallery-lightbox' );

		// Add favicon
		add_theme_support('favicon');

		// Add Custom Logo
		$defaults = array(
			'height'      => 124,
			'width'       => 300,
			'flex-height' => false,
			'flex-width'  => false,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
endif;
add_action( 'after_setup_theme', 'flydoctor_action_theme_setup' );


/**
 * Adjust content_width value for image attachment template.
 * @internal
 */
function flydoctor_action_theme_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 870;

		if ( ! isset( $content_width ) ) {
			$content_width = 870;
		}
	}
}
add_action( 'template_redirect', 'flydoctor_action_theme_content_width' );


if ( ! function_exists( 'flydoctor_theme_action_functions' ) ) :
	function flydoctor_theme_action_functions() {
		the_post_thumbnail();
	}
endif;


/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
function flydoctor_filter_theme_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', 'flydoctor_filter_theme_post_classes' );


function flydoctor_filter_add_span_cat_count( $links ) {
	$links = str_replace( '</a> (', '<span>(', $links );
	$links = str_replace( ')', ')</span></a>', $links );

	return $links;
}

add_filter( 'wp_list_categories', 'flydoctor_filter_add_span_cat_count' );


if ( ! function_exists( 'flydoctor_filter_archive_link' ) ) :
	function flydoctor_filter_archive_link( $url ) {
		$url = str_replace( '</a>&nbsp;(', '<span>(', $url );
		$url = str_replace( ')</li>', ')</span></a></li>', $url );

		return $url;
	}
endif;
add_filter( 'get_archives_link', 'flydoctor_filter_archive_link', 99 );


if ( ! function_exists( 'flydoctor_action_theme_footer_widgets_init' ) ) :
	/**
	 * Register widget areas
	 * @internal
	 */
	function flydoctor_action_theme_footer_widgets_init() {
		$before_widget = '<div id="%1$s" class="widget-sidebar widget %2$s">';
		$after_widget  = '</div>';
		$before_title  = '<h4 class="widget-title"><span>';
		$after_title   = '</span></h4>';

		// register general sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'General Widget', 'flydoctor' ),
			'id'            => 'sidebar-1',
			'before_widget' => $before_widget,
			'after_widget'  => $after_widget,
			'before_title'  => $before_title,
			'after_title'   => $after_title,
		) );

		$footer_widgets = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'enable_footer_widgets/selected', 'no' ) : 'no';

		if( 'yes' == $footer_widgets ) {
			$footer_widgets_number = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'enable_footer_widgets/yes/number', '4' ) : '4';

			// register footer sidebars
			$footer_widgets_number = (int)$footer_widgets_number;
			for ( $i = 1; $i <= $footer_widgets_number; $i++ ) {
				register_sidebar( array(
					'name'          => esc_html__( 'Footer ', 'flydoctor' ).$i,
					'id'            => 'footer-'.$i,
					'before_widget' => $before_widget,
					'after_widget'  => $after_widget,
					'before_title'  => $before_title,
					'after_title'   => $after_title,
				) );
			}
		}
	}
endif;
add_action( 'widgets_init', 'flydoctor_action_theme_footer_widgets_init' );


function flydoctor_filter_theme_change_submenu_class( $menu ) {
	$menu = preg_replace( '/ class="sub-menu"/', ' class="child" ', $menu );

	return $menu;
}
add_filter( 'wp_nav_menu', 'flydoctor_filter_theme_change_submenu_class' );


if ( ! function_exists( 'flydoctor_action_print_fonts' ) ) :
	/**
	 * print theme general fonts
	 */
	function flydoctor_action_print_fonts() {
		if ( defined( 'FW' ) ) {
			$styling = '';
			$font1   = fw_get_db_settings_option( 'font1' );
			$font2   = fw_get_db_settings_option( 'font2' );
			$font3   = fw_get_db_settings_option( 'font3' );
			$font4   = fw_get_db_settings_option( 'font4' );

			// get font 1
			if ( isset( $font1['font1'] ) && $font1['font1'] == 'yes' ) {
				$font1   = flydoctor_get_theme_advanced_styles( $font1['yes']['general_font_family'] );
				$styling .= 'body, .nav-menu li a, a.comment-reply, .section-author .link, .fly-basic-information .link {' . $font1 . '}' . "\n";
			}

			// get font 2
			if ( isset( $font2['font2'] ) && $font2['font2'] == 'yes' ) {
				$font2   = flydoctor_get_theme_advanced_styles( $font2['yes']['general_font_family'] );
				$styling .= '.form-group label, .form-login .checkbox, .form-login .submit, .tab-header a, .panel-title, .related-posts .title, .post-category, .project-info .item > strong, .comments .title, .comment-author, .widget-sidebar .widget-title, .fly-accordion .widget-title, .widget_categories a, .widget_calendar table, #swipebox-top-bar, .comment-reply-title, .widget_pages a, .widget_nav_menu a, .widget_meta a, .widget_archive a, .widget_recent_entries a, .widget.woocommerce .woocommerce-widget-layered-nav-list a, .widget.woocommerce .product-categories a, .woocommerce-account .woocommerce-MyAccount-navigation ul a, .wpcf7 input[type="submit"] {' . $font2 . '}' . "\n";
			}

			// get font 3
			if ( isset( $font3['font3'] ) && $font3['font3'] == 'yes' ) {
				$font3   = flydoctor_get_theme_advanced_styles( $font3['yes']['general_font_family'] );
				$styling .= 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .page-title, .btn, .wpcf7-submit, .comment-form #submit, .post-media blockquote, .widget-posts .article .post-title, .post-taglist a, .widget_tag_cloud a, .widget_product_tag_cloud a, .widget-author .name, .widget-sidebar .mc4wp-form input[type="submit"], .section .title, .widget_search .search-submit, .post-password-form input[type="submit"], .text-block .mc4wp-form input[type="submit"], .woocommerce a.button, .woocommerce-page a.button,.woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce .woocommerce-product-search input[type="submit]", .woocommerce-page .woocommerce-product-search input[type="submit"], .tab-header a, .navigation .logo, .btn, .btn.btn-small, .wpcf7-submit.btn-small, .widget_search .search-submit, .widget-sidebar .mc4wp-form input[type="submit"], a.post-read-more, .comment-form #submit, .submit-wrap .ninja-forms-field.nf-element, .wpbc_booking_form_structure .wpbc_structure_form .btn, .wpdevelop .btn-default:active, .wpdevelop .btn-default.active, .wpdevelop .open > .dropdown-toggle.btn-default, .wpdevelop .btn-default, .wpdevelop .btn-default.active, .wpdevelop .open > .dropdown-toggle.btn-default, .wpdevelop .btn-default:active, .wpdevelop .btn-default.active, .wpdevelop .open > .dropdown-toggle.btn-default, .form-group label, .form-login .checkbox, .form-login .submit, .form-login .forgot, .nf-field-label, .widget-sidebar .widget-title, .fly-accordion .widget-title, .tab-header a {' . $font3 . '}' . "\n";
			}

			// get font 4
			if ( isset( $font4['font4'] ) && $font4['font4'] == 'yes' ) {
				$font4   = flydoctor_get_theme_advanced_styles( $font4['yes']['general_font_family'] );
				$styling .= '.post-meta.font2, .blockquote, .post-content blockquote, .comment-date, .widget-author .job, .section-author .job, .author-job, .comment-list .comment blockquote {' . $font4 . '}' . "\n";
			}

			// include after parent style if is child theme active
			$file_style = is_child_theme() ? 'parent-style' : 'style';
			if ( ! empty( $styling ) ) {
				wp_add_inline_style( $file_style, $styling );
			}
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'flydoctor_action_print_fonts', 998 );


if ( ! function_exists( 'flydoctor_action_theme_print_google_fonts_link' ) ) :
	/**
	 * Print google fonts link
	 */
	function flydoctor_action_theme_print_google_fonts_link() {
		global $flydoctor_google_fonts_list_general;

		$flydoctor_google_fonts_list = array(
			'Noto Serif' => array(
				'variation' => array(
					'regular'   => 'regular',
					'italic'    => 'italic',
					'700'       => '700',
					'700italic' => '700italic',
				),
				'subset'    => array(
					'latin' => 'latin'
				),
			),
			'Open Sans'       => array(
				'variation' => array(
					'400'       => '400',
				),
				'subset'    => array(
					'latin' => 'latin'
				),
			),
			'Montserrat'      => array(
				'variation' => array(
					'400' => '400',
					'700' => '700',
				),
				'subset'    => array(
					'latin' => 'latin'
				),
			),
			'Raleway'            => array(
				'variation' => array(
					'100'       => '100',
					'100italic' => '100italic',
					'200'       => '200',
					'200italic' => '200italic',
					'300'       => '300',
					'300italic' => '300italic',
					'regular'   => 'regular',
					'italic'    => 'italic',
					'500'       => '500',
					'500italic' => '500italic',
					'600'       => '600',
					'600italic' => '600italic',
					'700'       => '700',
					'700italic' => '700italic',
					'800'       => '800',
					'800italic' => '800italic',
					'900'       => '900',
					'900italic' => '900italic',
				),
				'subset'    => array(
					'latin' => 'latin'
				),
			),
			'Roboto Slab' => array(
				'variation' => array(
					'100' => '100',
					'300' => '300',
					'400' => '400',
					'700' => '700',
				),
				'subset'    => array(
					'latin' => 'latin'
				),
			),
		);

		// merge recursive with general google fonts
		$flydoctor_google_fonts_list = flydoctor_theme_array_merge_recursive( $flydoctor_google_fonts_list, $flydoctor_google_fonts_list_general );

		wp_register_style( 'google-fonts', flydoctor_theme_get_remote_fonts( $flydoctor_google_fonts_list ) );
		wp_enqueue_style( 'google-fonts' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'flydoctor_action_theme_print_google_fonts_link', 999 );


function flydoctor_change_site_color() {
	if ( ! defined( 'FW' ) ) {
		return;
	}

	$color   = fw_get_db_settings_option( 'site_color', '' );
	$color_2 = fw_get_db_settings_option( 'color_2', '' );
	$css     = '';

	// color from get parameter
	if ( isset( $_GET['color'] ) ) {
		$color = '#' . strip_tags( sanitize_text_field( wp_unslash($_GET['color']) ) );
	}

	if ( ! empty( $color ) ) {
		// color
		$css .= 'h1 a:hover,
h2 a:hover,
h3 a:hover,
h4 a:hover,
h5 a:hover,
h6 a:hover,
.h1 a:hover,
.h2 a:hover,
.h3 a:hover,
.h4 a:hover,
.h5 a:hover,
.h6 a:hover,
h1 a:active,
h2 a:active,
h3 a:active,
h4 a:active,
h5 a:active,
h6 a:active,
.h1 a:active,
.h2 a:active,
.h3 a:active,
.h4 a:active,
.h5 a:active,
.h6 a:active,
a,
a:focus,
a:hover,
a:active,
.color-red,
.link-red,
.color-brown,
.link-brown,
.link-red:hover,
.link-brown:hover,
.link-red:active,
.link-brown:active,
.footer-social li a:hover,
.footer-social li a:active,
.footer-social li a:hover,
.footer-social li a:active,
.footer-copyright a:hover,
.footer-copyright a:active,
.form-group.required label:after,
.form-search .form-control:focus + .submit:hover,
.form-search .form-control:focus + .submit:active,
.form-login .submit:hover,
.form-login .submit:active,
.nav-menu li:hover > a,
.nav-menu li:active > a,
.nav-menu li.active > a,
.nav-menu li.current-menu-item > a,
.nav-menu li ul li:hover > a,
.nav-menu li ul li:active > a,
.nav-menu > li:hover > a,
.nav-menu > li:active > a,
.nav-menu > li.active > a,
.nav-menu > li.current-menu-item > a,
.nav-menu li.active > a,
.nav-menu li.current-menu-item > a,
.navigation-wrapper .nav-menu > li:hover > a,
.navigation-wrapper .nav-menu > li:active > a,
.navigation-wrapper .nav-menu > li.active > a,
.navigation-wrapper .nav-menu > li.current-menu-item > a,
.sticky.navigation-wrapper .nav-menu > li:hover > a,
.sticky.navigation-wrapper .nav-menu > li:active > a,
.sticky.navigation-wrapper .nav-menu > li.active > a,
.sticky.navigation-wrapper .nav-menu > li.current-menu-item > a,
.top-menu li a:hover,
.top-menu li a:active,
.top-menu .social:hover .social-toggle,
.top-menu .social:active .social-toggle,
.pagination > li > a:hover,
.woocommerce-pagination ul.page-numbers > li > a:hover,
.pagination > li > span:hover,
.woocommerce-pagination ul.page-numbers > li > span:hover,
.pagination > li > a:focus,
.woocommerce-pagination ul.page-numbers > li > a:focus,
.pagination > li > span:focus,
.woocommerce-pagination ul.page-numbers > li > span:focus,
.pagination > li > a:active,
.woocommerce-pagination ul.page-numbers > li > a:active,
.pagination > li > span:active,
.woocommerce-pagination ul.page-numbers > li > span:active,
.pagination > li.active > a,
.woocommerce-pagination ul.page-numbers > li.active > a,
.pagination > li.active > span,
.woocommerce-pagination ul.page-numbers > li.active > span,
.pagination > li.active > a:hover,
.woocommerce-pagination ul.page-numbers > li.active > a:hover,
.pagination > li.active > span:hover,
.woocommerce-pagination ul.page-numbers > li.active > span:hover,
.pagination > li.active > a:focus,
.woocommerce-pagination ul.page-numbers > li.active > a:focus,
.pagination > li.active > span:focus,
.woocommerce-pagination ul.page-numbers > li.active > span:focus,
.pagination > li.active > a:active,
.woocommerce-pagination ul.page-numbers > li.active > a:active,
.pagination > li.active > span:active,
.woocommerce-pagination ul.page-numbers > li.active > span:active,
.pager a:hover,
.pager a:active,
a.panel-toggle,
a.panel-toggle:focus,
a.panel-toggle.collapsed:hover,
a.panel-toggle.collapsed:active,
.post-meta.font2 a:hover,
.post-meta.font2 a:active,
.post-meta.font2 .post-author a:hover,
.post-meta.font2 .post-author a:active,
.post-category:before,
.post-category:after,
.post-social a:hover,
.post-social a:active,
.widget-posts .article .post-title a:hover,
.widget-posts .article .post-title a:active,
.comment-author:hover,
.comment-author:active,
.widget_categories li.active a,
.widget_categories a:hover,
.widget_categories a:active,
.widget_calendar table tfoot tr td#prev a:hover,
.widget_calendar table tfoot tr td#next a:hover,
.widget_calendar table tfoot tr td#prev a:active,
.widget_calendar table tfoot tr td#next a:active,
.fw-testimonials-1 .prev:hover,
.fw-testimonials-2 .prev:hover,
.fw-testimonials-1 .next:hover,
.fw-testimonials-2 .next:hover,
.fw-testimonials-1 .prev:active,
.fw-testimonials-2 .prev:active,
.fw-testimonials-1 .next:active,
.fw-testimonials-2 .next:active,
#swipebox-prev:hover,
#swipebox-next:hover,
#swipebox-close:hover,
#swipebox-prev:active,
#swipebox-next:active,
#swipebox-close:active,
.post-social a.fly_loved,
.widget_pages a:hover,
.widget_pages a:active,
.widget_nav_menu a:hover,
.widget_nav_menu a:active,
.widget_meta a:hover,
.widget_meta a:active,
.widget_archive a:hover,
.widget_archive a:active,
.widget_recent_comments a:hover,
.widget_recent_comments a:active,
.widget_recent_entries a:hover,
.widget_recent_entries a:active,
.widget_recent_comments a,
.contact-form sup,
.fly-tabs-container .client-logo .fly-tab-title,
.fly-tabs-container .nav-text > li > a:hover .fly-tab-title,
.fly-tabs-container .active .client-logo .fly-tab-title,
.fly-tabs-container .active .client-logo,
.fly-header-image .post-category,
.fly-slider .post-category,
.main-carousel .post-category,
.header-1.fly-absolute-header .navigation:not(.sticky) .nav-menu > li:hover > a.menu-link,
.header-1.fly-absolute-header .navigation:not(.sticky) .nav-menu > li:active > a.menu-link,
.header-1.fly-absolute-header .navigation:not(.sticky) .nav-menu > li.active > a.menu-link,
.header-1.fly-absolute-header .navigation:not(.sticky) .nav-menu > li.current-menu-item > a.menu-link,
.fly-tabs-container .nav-text li.active a,
.fly-tabs-container .nav-text li.active a .fly-tab-title,
.article.content-blog > a[rel="tag"]:hover,
.article.content-blog > a[rel="tag"]:active,
.woocommerce ul.products li.product .price,
.woocommerce-page ul.products li.product .price,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce-page nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span:hover,
.woocommerce-page nav.woocommerce-pagination ul li span:hover,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce-page nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li span:focus,
.woocommerce-page nav.woocommerce-pagination ul li span:focus,
.woocommerce nav.woocommerce-pagination ul li a:active,
.woocommerce-page nav.woocommerce-pagination ul li a:active,
.woocommerce nav.woocommerce-pagination ul li span:active,
.woocommerce-page nav.woocommerce-pagination ul li span:active,
.woocommerce nav.woocommerce-pagination ul li a.current,
.woocommerce-page nav.woocommerce-pagination ul li a.current,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce-page nav.woocommerce-pagination ul li span.current,
.woocommerce .star-rating span::before,
.woocommerce-page .star-rating span::before,
.woocommerce div.product p.price,
.woocommerce-page div.product p.price,
.woocommerce div.product span.price,
.woocommerce-page div.product span.price,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:active,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:active,
.woocommerce div.product .woocommerce-tabs .comment-respond .comment-form p.stars a,
.woocommerce-page div.product .woocommerce-tabs .comment-respond .comment-form p.stars a,
.woocommerce-message::before,
.widget.woocommerce .woocommerce-widget-layered-nav-list li.active a,
.widget.woocommerce .woocommerce-widget-layered-nav-list a:hover,
.widget.woocommerce .woocommerce-widget-layered-nav-list a:active,
.widget.woocommerce ul.product_list_widget li a:hover,
.widget.woocommerce ul.product_list_widget li a:active,
.widget.woocommerce .product-categories li.active a,
.widget.woocommerce .product-categories a:hover,
.widget.woocommerce .product-categories a:active,
.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,
.woocommerce-account .woocommerce-MyAccount-navigation ul a:hover,
.woocommerce-account .woocommerce-MyAccount-navigation ul a:active,
.checkbox label.checked,
.radio label.checked,
.checkbox label:hover,
.radio label:hover,
.checkbox label:focus,
.radio label:focus,
.checkbox label:active,
.radio label:active,
.fly-footer-widgets .widget_pages a:hover,
.fly-footer-widgets .widget_nav_menu a:hover,
.fly-footer-widgets .widget_meta a:hover,
.fly-footer-widgets .widget_archive a:hover,
.fly-footer-widgets .widget_recent_entries a:hover,
.fly-footer-widgets .widget_categories a:hover,
.fly-footer-widgets .widget_pages a:active,
.fly-footer-widgets .widget_nav_menu a:active,
.fly-footer-widgets .widget_meta a:active,
.fly-footer-widgets .widget_archive a:active,
.fly-footer-widgets .widget_recent_entries a:active,
.fly-footer-widgets .widget_categories a:active,
.footer-social li a:hover,
.footer-social li a:active,
.footer-copyright a:hover,
.footer-copyright a:active
{color: ' . $color . ';}';

		// border color
		$css .= '.post-slider .owl-controls .owl-page:hover span,
.post-slider .owl-controls .owl-page:active span,
.post-slider .owl-controls .owl-page.active span,
.post-taglist a:hover,
.post-taglist a:active,
.widget-sidebar .widget-title span,
.fly-accordion .widget-title span,
.widget_tag_cloud a:hover,
.widget_product_tag_cloud a:hover,
.widget_tag_cloud a:active,
.widget_product_tag_cloud a:active,
.fw-testimonials-1 .prev:hover,
.fw-testimonials-2 .prev:hover,
.fw-testimonials-1 .next:hover,
.fw-testimonials-2 .next:hover,
.fw-testimonials-1 .prev:active,
.fw-testimonials-2 .prev:active,
.fw-testimonials-1 .next:active,
.fw-testimonials-2 .next:active,
#swipebox-prev:hover,
#swipebox-next:hover,
#swipebox-close:hover,
#swipebox-prev:active,
#swipebox-next:active,
#swipebox-close:active,
.fly-team-member .avatar,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-message,
.wpcf7 input[type="submit"],
.btn,
.btn.btn-small,
.wpcf7-submit.btn-small,
.widget_search .search-submit,
.widget-sidebar .mc4wp-form input[type="submit"],
a.post-read-more,
.comment-form #submit,
.submit-wrap .ninja-forms-field.nf-element,
.wpbc_booking_form_structure .wpbc_structure_form .btn,
.wpdevelop .btn-default:active,
.wpdevelop .btn-default.active,
.wpdevelop .open > .dropdown-toggle.btn-default,
.wpdevelop .btn-default,
.wpdevelop .btn-default.active,
.wpdevelop .open > .dropdown-toggle.btn-default,
.wpdevelop .btn-default:active,
.wpdevelop .btn-default.active,
.wpdevelop .open > .dropdown-toggle.btn-default,
.form-control:focus,
.wpcf7-form-control:focus,
.wpbc_structure_form .controls input:focus,
.wpbc_structure_form .controls textarea:focus,
.checkbox label:before,
.radio label:before,
.checkbox label:after,
.radio label:after,
.form-search-header .form-control,
.ninja-forms-field:focus,
.booking_form .form-group .controls select:focus,
.booking_form select:focus,
.tab-header .active a,
.widget_search .search-field:focus,
.widget_tag_cloud a:hover,
.widget_product_tag_cloud a:hover,
.post-taglist a:hover,
.widget_tag_cloud a:active,
.widget_product_tag_cloud a:active,
.post-taglist a:active
{ border-color: ' . $color . '; }';

		// border left color
		$css .= '.blockquote,
.post-content blockquote,
.comment-list .comment blockquote,

{ border-left-color: ' . $color . '; }';

		// border bottom color
		$css .= '.back-to-top:after,
.back-to-top:hover:after,
.back-to-top:active:after,
.nav-menu > li:hover > a,
.nav-menu > li:active > a,
.nav-menu > li.active > a,
.nav-menu > li.current-menu-item > a,
.header-1.fly-absolute-header .navigation:not(.sticky) .nav-menu > li:hover > a.menu-link,
.header-1.fly-absolute-header .navigation:not(.sticky) .nav-menu > li:active > a.menu-link,
.header-1.fly-absolute-header .navigation:not(.sticky) .nav-menu > li.active > a.menu-link,
.header-1.fly-absolute-header .navigation:not(.sticky) .nav-menu > li.current-menu-item > a.menu-link
{ border-bottom-color: ' . $color . ';}';

		// background color
		$css .= '.back-to-top,
.back-to-top:hover,
.back-to-top:active,
.hamburger.active a:before,
.hamburger.active a:after,
a.panel-toggle:before,
a.panel-toggle:after,
.owl-carousel .owl-controls .owl-buttons .owl-prev:hover:before,
.owl-carousel .owl-controls .owl-buttons .owl-next:hover:before,
.owl-carousel .owl-controls .owl-buttons .owl-prev:active:before,
.owl-carousel .owl-controls .owl-buttons .owl-next:active:before,
.post-slider .owl-controls .owl-page.active span,
.related-posts-slider2 .owl-controls .owl-buttons .owl-prev:before,
.related-posts-slider2 .owl-controls .owl-buttons .owl-next:before,
.related-posts-slider2 .owl-controls .owl-buttons .owl-prev:hover:before,
.related-posts-slider2 .owl-controls .owl-buttons .owl-next:hover:before,
.related-posts-slider2 .owl-controls .owl-buttons .owl-prev:active:before,
.related-posts-slider2 .owl-controls .owl-buttons .owl-next:active:before,
.post-label,
.post-taglist a:hover,
.post-taglist a:active,
.widget_tag_cloud a:hover,
.widget_product_tag_cloud a:hover,
.widget_tag_cloud a:active,
.widget_product_tag_cloud a:active,
.widget_calendar table #today:before,
.fw-testimonials .fw-testimonials-pagination a:hover,
.fw-testimonials .fw-testimonials-pagination a:active,
.fw-testimonials .fw-testimonials-pagination a.selected,
#swipebox-top-bar,
.woocommerce span.onsale,
.woocommerce-page span.onsale,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,
.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range,
.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle,
.nav-menu li.menu-cta-btn a,
.wpcf7 input[type="submit"],
.wpcf7 input[type="submit"]:hover,
.btn,
.btn.btn-small,
.wpcf7-submit.btn-small,
.widget_search .search-submit,
.widget-sidebar .mc4wp-form input[type="submit"],
a.post-read-more,
.comment-form #submit,
.submit-wrap .ninja-forms-field.nf-element,
.wpbc_booking_form_structure .wpbc_structure_form .btn,
.wpdevelop .btn-default:active,
.wpdevelop .btn-default.active,
.wpdevelop .open > .dropdown-toggle.btn-default,
.wpdevelop .btn-default,
.wpdevelop .btn-default.active,
.wpdevelop .open > .dropdown-toggle.btn-default,
.wpdevelop .btn-default:active,
.wpdevelop .btn-default.active,
.wpdevelop .open > .dropdown-toggle.btn-default,
.checkbox label.checked:after,
.radio label.checked:after,
.widget_tag_cloud a:hover,
.widget_product_tag_cloud a:hover,
.post-taglist a:hover,
.widget_tag_cloud a:active,
.widget_product_tag_cloud a:active,
.post-taglist a:active
{ background-color: ' . $color . '; }';

		$css .= '::-moz-selection{ background: ' . $color . '; }';
		$css .= '::selection{ background: ' . $color . '; }';
	}

	if ( ! empty( $color_2 ) ) {
		$css .= '
.form-search .form-control:focus + .submit:hover,
.form-search .form-control:focus + .submit:active,
.form-login .submit:hover,
.form-login .submit:active,
.form-group.required label:after,
.form-login .forgot,
.form-login .forgot:hover,
.form-login .forgot:active
{ color: ' . $color_2 . '; }';

		$css .= '
.back-to-top:hover,
.back-to-top:active,
.btn:hover,
.btn.btn-small:hover,
.wpcf7-submit.btn-small:hover,
.widget_search .search-submit:hover,
.widget-sidebar .mc4wp-form input[type="submit"]:hover,
a.post-read-more:hover,
.comment-form #submit:hover,
.submit-wrap .ninja-forms-field.nf-element:hover,
.wpbc_booking_form_structure .wpbc_structure_form .btn:hover,
.wpdevelop .btn-default:active:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpdevelop .btn-default:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpdevelop .btn-default:active:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.btn:active,
.btn.btn-small:active,
.wpcf7-submit.btn-small:active,
.widget_search .search-submit:active,
.widget-sidebar .mc4wp-form input[type="submit"]:active,
a.post-read-more:active,
.comment-form #submit:active,
.submit-wrap .ninja-forms-field.nf-element:active,
.wpbc_booking_form_structure .wpbc_structure_form .btn:active,
.wpdevelop .btn-default:active:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpdevelop .btn-default:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpdevelop .btn-default:active:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpbc_booking_form_structure .wpbc_structure_form .btn:hover,
.wpdevelop .btn-default:active:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpdevelop .btn-default:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpdevelop .btn-default:active:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpbc_booking_form_structure .wpbc_structure_form .btn:active,
.wpdevelop .btn-default:active:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpdevelop .btn-default:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpdevelop .btn-default:active:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpbc_booking_form_structure .wpbc_structure_form .btn:focus,
.wpdevelop .btn-default:active:focus,
.wpdevelop .btn-default.active:focus,
.wpdevelop .open > .dropdown-toggle.btn-default:focus,
.wpdevelop .btn-default:focus,
.wpdevelop .btn-default.active:focus,
.wpdevelop .open > .dropdown-toggle.btn-default:focus,
.wpdevelop .btn-default:active:focus,
.wpdevelop .btn-default.active:focus,
.wpdevelop .open > .dropdown-toggle.btn-default:focus
{ background-color: ' . $color_2 . '; }';

		$css .= '
.btn:hover,
.btn.btn-small:hover,
.wpcf7-submit.btn-small:hover,
.widget_search .search-submit:hover,
.widget-sidebar .mc4wp-form input[type="submit"]:hover,
a.post-read-more:hover,
.comment-form #submit:hover,
.submit-wrap .ninja-forms-field.nf-element:hover,
.wpbc_booking_form_structure .wpbc_structure_form .btn:hover,
.wpdevelop .btn-default:active:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpdevelop .btn-default:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpdevelop .btn-default:active:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.btn:active,
.btn.btn-small:active,
.wpcf7-submit.btn-small:active,
.widget_search .search-submit:active,
.widget-sidebar .mc4wp-form input[type="submit"]:active,
a.post-read-more:active,
.comment-form #submit:active,
.submit-wrap .ninja-forms-field.nf-element:active,
.wpbc_booking_form_structure .wpbc_structure_form .btn:active,
.wpdevelop .btn-default:active:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpdevelop .btn-default:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpdevelop .btn-default:active:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpbc_booking_form_structure .wpbc_structure_form .btn:hover,
.wpdevelop .btn-default:active:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpdevelop .btn-default:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpdevelop .btn-default:active:hover,
.wpdevelop .btn-default.active:hover,
.wpdevelop .open > .dropdown-toggle.btn-default:hover,
.wpbc_booking_form_structure .wpbc_structure_form .btn:active,
.wpdevelop .btn-default:active:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpdevelop .btn-default:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpdevelop .btn-default:active:active,
.wpdevelop .btn-default.active:active,
.wpdevelop .open > .dropdown-toggle.btn-default:active,
.wpbc_booking_form_structure .wpbc_structure_form .btn:focus,
.wpdevelop .btn-default:active:focus,
.wpdevelop .btn-default.active:focus,
.wpdevelop .open > .dropdown-toggle.btn-default:focus,
.wpdevelop .btn-default:focus,
.wpdevelop .btn-default.active:focus,
.wpdevelop .open > .dropdown-toggle.btn-default:focus,
.wpdevelop .btn-default:active:focus,
.wpdevelop .btn-default.active:focus,
.wpdevelop .open > .dropdown-toggle.btn-default:focus
{ border-color: ' . $color_2 . '; }';
	}

	if ( ! empty( $css ) ) {
		$file_style = is_child_theme() ? 'parent-style' : 'style';
		wp_add_inline_style( $file_style, $css );
	}
}

add_filter( 'wp_enqueue_scripts', 'flydoctor_change_site_color', 99 );


if ( ! function_exists( 'flydoctor_filter_excerpt_length' ) ) :
	/**
	 * Set the theme excerpt length
	 */
	function flydoctor_filter_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return 30;
	}
endif;
add_filter( 'excerpt_length', 'flydoctor_filter_excerpt_length', 999 );



if ( ! function_exists( 'flydoctor_body_class' ) ) :
	/**
	 * @internal
	 *
	 * @param array $classes
	 */
	function flydoctor_body_class( $classes ) {
		$classes[] = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'header_type/selected', 'header-1' ) : 'header-1';

		$classes[] = flydoctor_theme_header_class();

		return $classes;
	}
endif;
add_filter( 'body_class', 'flydoctor_body_class' );


function flydoctor_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     => esc_html__( 'Unyson Framework', 'flydoctor' ),
			'slug'     => 'unyson',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Brizy', 'flydoctor' ),
			'slug'     => 'brizy',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Ninja Forms', 'flydoctor' ),
			'slug'     => 'ninja-forms',
			'required' => false,
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'tgmpa',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins',
		// Menu slug.
		'has_notices'  => true,
		// Show admin notices or not.
		'dismissable'  => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'flydoctor' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'flydoctor' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'flydoctor' ),
			// %s = plugin name.
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'flydoctor' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'flydoctor' ),
			// %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'flydoctor' ),
			// %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'flydoctor' ),
			// %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'flydoctor' ),
			// %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'flydoctor' ),
			// %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'flydoctor' ),
			// %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'flydoctor' ),
			// %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'flydoctor' ),
			// %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'flydoctor' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'flydoctor' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'flydoctor' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'flydoctor' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'flydoctor' ),
			// %s = dashboard link.
			'nag_type'                        => esc_html__( 'updated', 'flydoctor' )
			// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'flydoctor_register_required_plugins' );


function flydoctor_brizy_upgrade_url() {
	return 'https://brizy.io/account/aff/go/flytemplates?i=1';
}
add_filter( 'brizy_upgrade_to_pro_url', 'flydoctor_brizy_upgrade_url' );


/* filters for woocommerce */
function flydoctor_filter_loop_shop_per_page() {
	return 8;
}
add_filter( 'loop_shop_per_page', 'flydoctor_filter_loop_shop_per_page', 20 );


if ( ! function_exists( 'flydoctor_filter_woocommerce_related_products_filter' ) ) :
	/**
	 * Woocomerce related products filter
	 */
	function flydoctor_filter_woocommerce_related_products_filter( $args ) {
		$args['posts_per_page'] = 4; // 4 related products
		$args['columns']        = 4; // arranged in 4 columns

		return $args;
	}

	add_filter( 'woocommerce_output_related_products_args', 'flydoctor_filter_woocommerce_related_products_filter' );
endif;


if ( ! function_exists( 'flydoctor_action_woocommerce_output_upsells' ) ) {
	/**
	 * Woocomerce upsell output action
	 */
	function flydoctor_action_woocommerce_output_upsells() {
		woocommerce_upsell_display( 4, 4 ); // Display 4 products in rows of 4
	}
}
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'flydoctor_action_woocommerce_output_upsells', 15 );


if ( ! function_exists( 'flydoctor_action_woocommerce_output_content_wrapper' ) ) :
	/**
	 * Woocomerce output content wrapper before
	 */
	function flydoctor_action_woocommerce_output_content_wrapper() {
		$flydoctor_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
		ob_start();
		?>
		<div class="page-wrapper <?php flydoctor_theme_get_sidebar_class( $flydoctor_sidebar_position ); ?>">
		<div class="container">
		<div class="row">
		<!-- Content -->
		<main class="fly-content">

		<?php
		echo ob_get_clean();
	}
endif;


if ( ! function_exists( 'flydoctor_action_woocommerce_output_content_wrapper_end' ) ):
	/**
	 * Woocomerce output content wrapper after
	 */
	function flydoctor_action_woocommerce_output_content_wrapper_end() {
		ob_start(); ?>
		</main>
		<?php get_sidebar(); ?>
		</div>
		</div>
		</div>
		<?php
		echo ob_get_clean();
	}

endif;


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'flydoctor_action_woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_after_main_content', 'flydoctor_action_woocommerce_output_content_wrapper_end', 10 );


