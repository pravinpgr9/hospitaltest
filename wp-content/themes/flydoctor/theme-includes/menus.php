<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Register menus
 */

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary' => esc_html__( 'Top Menu', 'flydoctor' ),
) );


global $menus;
$menus = array(
	'primary' => array(
		'depth'           => 3,
		'container'       => '',
		'container_id'    => '',
		'container_class' => '',
		'menu_class'      => 'nav-menu clearfix',
		'theme_location'  => 'primary',
		'fallback_cb'     => 'flydoctor_theme_select_menu_message',
		'link_before'     => '',
		'link_after'      => ''
	)
);


if ( ! function_exists( 'flydoctor_theme_nav_menu' ) ) :
	/**
	 * Print the nav menu
	 */
	function flydoctor_theme_nav_menu( $menu_type ) {
		global $menus;
		if ( isset( $menus[ $menu_type ] ) ) {
			wp_nav_menu(
				array(
					'depth'           => 3,
					'container'       => '',
					'container_id'    => '',
					'container_class' => '',
					'menu_class'      => 'nav-menu clearfix',
					'theme_location'  => 'primary',
					'fallback_cb'     => 'flydoctor_theme_select_menu_message',
					'link_before'     => '',
					'link_after'      => ''
				)
			);
		}
	}
endif;


if ( ! function_exists( 'flydoctor_theme_select_menu_message' ) ) :
	/**
	 * Print the select menu message
	 */
	function flydoctor_theme_select_menu_message() {
		if ( is_user_logged_in() && current_user_can('edit_theme_options') ) {
			echo '<nav id="nav"><p class="fly-nav-menu-message">' . esc_html__( 'Set a Top', 'flydoctor' ) . ' <a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Menu', 'flydoctor' ) . '</a></p></nav>';
		}
		else {
			echo '<nav id="nav"><p class="fly-nav-menu-message">' . esc_html__('Set a Top Menu', 'flydoctor') . '</p></nav>';
		}
	}
endif;

