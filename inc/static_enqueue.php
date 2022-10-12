<?php
/**
 * Enqueue site scripts and styles
 */
function ddoc_scripts() {

    /**
     * Enqueueing Stylesheets
     */
	wp_enqueue_style( 'ddoc-fonts', ddoc_fonts_url() );
	wp_enqueue_style( 'mediaelementplayer', ddoc_VEND . '/media-player/mediaelementplayer.css' );
	wp_enqueue_style( 'fontawesome', ddoc_VEND . '/font-awesome/all.min.css' );
	wp_enqueue_style( 'ddoc-icomoon', ddoc_VEND . '/icomoon/icomoon.css', array(), ddoc_VERSION );

    if ( class_exists('bbpress') ) {
        wp_enqueue_style( 'ddoc-bbp-forum', get_theme_file_uri('/assets/css/bbp-forum.css'), array(), ddoc_VERSION );
    }

	
    wp_enqueue_style( 'ddoc-icomoon', ddoc_VEND . '/icomoon/icomoon.css', array(), ddoc_VERSION );
	wp_enqueue_style( 'ddoc-custom', get_theme_file_uri('/assets/css/ddoc-style.css'), array(), ddoc_VERSION );
	wp_enqueue_style( 'ddoc-main', get_theme_file_uri('/assets/css/style.css'), array(), ddoc_VERSION );

    if (is_rtl()) {
        wp_enqueue_style( 'ddoc-rtl-main', get_theme_file_uri('/assets/css/rtl.css'), array(), ddoc_VERSION );
    }

	wp_enqueue_style( 'ddoc-root', get_stylesheet_uri(), array(), ddoc_VERSION );


    if ( class_exists('bbpress') ) {
        wp_enqueue_style( 'ddoc-bbp-forum', get_theme_file_uri('/assets/css/bbp-forum.css'), array(), ddoc_VERSION );
    }

    /**
     * Enqueueing Scripts
     */
	wp_enqueue_script( 'mediaelement-and-player', ddoc_VEND. '/media-player/mediaelement-and-player.min.js', array('jquery'), '4.2.6', true );
	wp_enqueue_script( 'parallaxie', ddoc_VEND. '/parallax/parallaxie.js', array('jquery'), '0.5', true );
	wp_enqueue_script( 'ddoc-main-js', ddoc_JS . '/main.js', array('jquery'), ddoc_VERSION, true );

    // ddoc main script localize for doc single page ajax call
	wp_localize_script( 'ddoc-main-js', 'ddoc_single_ajax_call',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'ddoc_single_ajax' ),
        )
    );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ddoc_scripts' );