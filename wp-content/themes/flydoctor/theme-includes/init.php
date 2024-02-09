<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

class flydoctor_Theme_Includes {
	private static $rel_path = null;

	private static $initialized = false;

	public static function init() {
		if ( self::$initialized ) {
			return;
		} else {
			self::$initialized = true;
		}

		/**
		 * Both frontend and backend
		 */
		{
			self::include_child_first( '/helpers.php' );
			self::include_child_first( '/hooks.php' );
			self::include_all_child_first( '/includes' );

			add_action( 'init', array( __CLASS__, '_action_init' ) );
		}

		/**
		 * Only frontend
		 */
		if ( ! is_admin() ) {
			add_action( 'wp_enqueue_scripts', array( __CLASS__, '_action_enqueue_scripts' ),
				20 // Include later to be able to make wp_dequeue_style|script()
			);
		}
	}

	private static function get_rel_path( $append = '' ) {
		if ( self::$rel_path === null ) {
			self::$rel_path = '/theme-includes';
		}

		return self::$rel_path . $append;
	}

	private static function include_all_child_first( $dir_rel_path ) {
		$paths = array();

		if ( is_child_theme() ) {
			$paths[] = self::get_child_path( $dir_rel_path );
		}

		$paths[] = self::get_parent_path( $dir_rel_path );

		foreach ( $paths as $path ) {
			if ( ! is_dir( $path ) ) {
				continue;
			}

			if ( $files = scandir( $path ) ) {
				foreach ( $files as $file ) {
					if ( $file == '.' || $file == '..' || ! is_file( $file ) ) {
						continue;
					}
					self::include_isolated( $path . '/' . $file );
				}
			}
		}
	}

	public static function get_parent_path( $rel_path ) {
		return get_template_directory() . self::get_rel_path( $rel_path );
	}

	public static function get_child_path( $rel_path ) {
		if ( ! is_child_theme() ) {
			return null;
		}

		return get_stylesheet_directory() . self::get_rel_path( $rel_path );
	}

	public static function include_isolated( $path ) {
		include $path;
	}

	public static function include_child_first( $rel_path ) {
		if ( is_child_theme() ) {
			$path = self::get_child_path( $rel_path );

			if ( file_exists( $path ) ) {
				self::include_isolated( $path );
			}
		}

		{
			$path = self::get_parent_path( $rel_path );

			if ( file_exists( $path ) ) {
				self::include_isolated( $path );
			}
		}
	}

	/**
	 * @internal
	 */
	public static function _action_enqueue_scripts() {
		self::include_child_first( '/static.php' );
	}

	/**
	 * @internal
	 */
	public static function _action_init() {
		self::include_child_first( '/menus.php' );
	}
}

flydoctor_Theme_Includes::init();


if ( ! function_exists( 'flydoctor_additional_enqueue_scripts' ) ) :
	/*
	* Include additional css and js in dashboard
	*/
	function flydoctor_additional_enqueue_scripts() {
		$template_directory_uri = get_template_directory_uri();
		$flydoctor_version      = defined( 'FW' ) ? fw()->theme->manifest->get_version() : '1.0';

		if ( is_admin() ) {
			wp_enqueue_style(
				'flydoctor-admin-css',
				esc_url( $template_directory_uri . '/css/admin.css' ),
				array(),
				$flydoctor_version
			);
			/* include here css or js files (only for parent theme is recommended here) */
		}
	}
endif;
add_action( 'admin_enqueue_scripts', 'flydoctor_additional_enqueue_scripts' );

