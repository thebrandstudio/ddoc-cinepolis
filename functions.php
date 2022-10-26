<?php
/**
 * ddoc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ddoc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! defined( 'ddoc_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ddoc_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! defined( 'ddoc_THEMEROOT' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ddoc_THEMEROOT', get_template_directory_uri());
}

if ( ! defined( 'ddoc_THEMEROOT_DIR' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ddoc_THEMEROOT_DIR', get_template_directory());
}

if ( ! defined( 'ddoc_IMAGES' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ddoc_IMAGES', ddoc_THEMEROOT.'/assets/images');
}

if ( ! defined( 'ddoc_CSS' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ddoc_CSS', ddoc_THEMEROOT.'/assets/css');
}

if ( ! defined( 'ddoc_JS' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ddoc_JS', ddoc_THEMEROOT.'/assets/js');
}

if ( ! defined( 'ddoc_VEND' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ddoc_VEND', ddoc_THEMEROOT.'/assets/vendors');
}


if ( ! function_exists( 'ddoc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ddoc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ddoc, use a find and replace
		 * to change 'ddoc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ddoc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main_menu' => esc_html__( 'Main Menu', 'ddoc' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ddoc_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'ddoc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ddoc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ddoc_content_width', 640 );
}
add_action( 'after_setup_theme', 'ddoc_content_width', 0 );


/**
 * ddoc required function init
 */
require_once ddoc_THEMEROOT_DIR . '/inc/init.php';

/**
 *  ddoc options and metabox init
 */

require_once ddoc_THEMEROOT_DIR . '/lib/init.php';
/**
 * _ddoc template setting
 *
 * @package Header, Footer, banner, 404
 * @since  1.0
 */
require_once ddoc_THEMEROOT_DIR . '/inc/template_setting.php';

/**
 * _ddoc Doc Setting
 *
 * @package Header, Footer, banner, 404
 * @since  1.0
 */
if(class_exists('WeDocs')) {
	require_once ddoc_THEMEROOT_DIR . '/inc/wedoc_function.php';
}


/**
 * Register sidebar's
 */
require_once ddoc_THEMEROOT_DIR . '/inc/sidebars.php';


function custom_shortcode()
{
    ob_start();Prueba
    if (have_rows('repeater_slug')) : ?> //change to your repeater slug
            <?php
            while (have_rows('repeater_slug')) : the_row(); ?> //repeater slug
                        <?php the_sub_field('custom_field'); ?> //acf fields
            <?php endwhile; ?>
    <?php endif; ?>

<?php return ob_get_clean();
}
add_shortcode('shortcode_name', 'custom_shortcode');
