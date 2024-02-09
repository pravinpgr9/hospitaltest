<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Enqueue scripts and styles for the front end.
 */

$flydoctor_version = defined( 'FW' ) ? fw()->theme->manifest->get_version() : '1.0';

wp_enqueue_style(
	'font-awesome',
	flydoctor_include_file_first_child_then_parent( '/css/font-awesome.css' ),
	array(),
	$flydoctor_version
);

wp_enqueue_style(
	'bootstrap',
	flydoctor_include_file_first_child_then_parent( '/css/bootstrap.css' ),
	array(),
	$flydoctor_version
);

wp_enqueue_style(
	'style',
	esc_url( get_stylesheet_uri() ),
	array(),
	$flydoctor_version
);

wp_enqueue_style(
	'animate',
	flydoctor_include_file_first_child_then_parent( '/css/animate.css' ),
	array(),
	$flydoctor_version
);

/* include theme js files */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

wp_enqueue_script(
	'modernizr',
	flydoctor_include_file_first_child_then_parent( '/js/libs/modernizr.js' ),
	array( 'jquery' ),
	$flydoctor_version,
	false
);

wp_enqueue_script(
	'bootstrap',
	flydoctor_include_file_first_child_then_parent( '/js/libs/bootstrap.js' ),
	array( 'jquery' ),
	$flydoctor_version,
	true
);

wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'masonry' );

wp_enqueue_script(
	'swipebox',
	flydoctor_include_file_first_child_then_parent( '/js/jquery.swipebox.js' ),
	array( 'jquery' ),
	$flydoctor_version,
	true
);

wp_enqueue_script(
	'select2',
	flydoctor_include_file_first_child_then_parent( '/js/select2.full.js' ),
	array( 'jquery' ),
	$flydoctor_version,
	true
);

// possible only on specific pages
wp_enqueue_script(
	'owl.carousel',
	flydoctor_include_file_first_child_then_parent( '/js/owl.carousel.js' ),
	array( 'jquery' ),
	$flydoctor_version,
	true
);

wp_enqueue_script(
	'mousewheel',
	flydoctor_include_file_first_child_then_parent( '/js/jquery.mousewheel.js' ),
	array( 'jquery' ),
	$flydoctor_version,
	true
);

wp_enqueue_script(
	'touchSwipe',
	flydoctor_include_file_first_child_then_parent( '/js/jquery.touchSwipe.js' ),
	array( 'jquery' ),
	$flydoctor_version,
	true
);

wp_enqueue_script(
	'flydoctor-general',
	flydoctor_include_file_first_child_then_parent( '/js/general.js' ),
	array( 'jquery' ),
	$flydoctor_version,
	true
);

wp_localize_script( 'flydoctor-general', 'FlyPhpVars', array(
	'ajax_url' => admin_url( 'admin-ajax.php' )
) );


