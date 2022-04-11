<?php
/**
 * pxCode functions and definitions
 *
 * @link https://www.pxcode.io
 *
 * @package WordPress
 * @subpackage pxCode_blank_theme
 * @since pxCode 1.0
 */


if ( ! function_exists( 'pxCode_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since pxCode 1.0
	 *
	 * @return void
	 */
	function pxCode_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'pxCode_support' );

if ( ! function_exists( 'pxCode_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since pxCode 1.0
	 *
	 * @return void
	 */
	function pxCode_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'pxCode-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Add styles inline.
		wp_add_inline_style( 'pxCode-style', pxCode_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'pxCode-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'pxCode_styles' );

if ( ! function_exists( 'pxCode_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since pxCode 1.0
	 *
	 * @return void
	 */
	function pxCode_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', pxCode_get_font_face_styles() );

	}

endif;

add_action( 'admin_init', 'pxCode_editor_styles' );


if ( ! function_exists( 'pxCode_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions pxCode_styles() and pxCode_editor_styles() above.
	 *
	 * @since pxCode 1.0
	 *
	 * @return string
	 */
	function pxCode_get_font_face_styles() {
		return "
		";

	}

endif;

if ( ! function_exists( 'pxCode_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since pxCode 1.0
	 *
	 * @return void
	 */
	function pxCode_preload_webfonts() {
		?>
		<?php
	}

endif;

add_action( 'wp_head', 'pxCode_preload_webfonts' );


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
