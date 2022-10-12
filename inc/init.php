<?php 


require ddoc_THEMEROOT_DIR . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require ddoc_THEMEROOT_DIR . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require ddoc_THEMEROOT_DIR . '/inc/template-functions.php';
/**
 * ddoc helper 
 */
require ddoc_THEMEROOT_DIR . '/inc/helper.php';

/**
 * ddoc comment area
*/
require ddoc_THEMEROOT_DIR.'/inc/classes/comment_walker.php';
/**
 * ddoc nav walker
*/
require ddoc_THEMEROOT_DIR.'/inc/classes/main-nav-walker.php';
/**
 * Customizer additions.
 */
require ddoc_THEMEROOT_DIR . '/inc/customizer.php';

/**
 * ddoc Enqueue 
 */

require ddoc_THEMEROOT_DIR . '/inc/static_enqueue.php';
/**
 * Dynamic enqeuue 
 */
require ddoc_THEMEROOT_DIR . '/inc/dynamic_enqueue.php';

/**
 * ddoc Admin Enqueue 
 */

require ddoc_THEMEROOT_DIR . '/inc/admin_enqueue.php';


/**
 * ddoc breadcrumbs
 */

require ddoc_THEMEROOT_DIR . '/inc/breadcrumbs.php';

/**
 * ddoc Tgm
 */
require ddoc_THEMEROOT_DIR . '/inc/plugin_activation.php';


/**
 * ddoc Demo Import
 */
require ddoc_THEMEROOT_DIR . '/inc/one_click_demo_config.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require ddoc_THEMEROOT_DIR . '/inc/jetpack.php';
}
