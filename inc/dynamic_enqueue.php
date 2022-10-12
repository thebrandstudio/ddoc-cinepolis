<?php 

/**
 * Ddoc icon color and background
 */

function wpdocs_styles_method() {

    $args = [
        'post_type'      => 'docs',
        'post_status'    => 'publish',
        'numberposts' => -1
    ];
    
    $get_posts = get_posts($args);
    $css = '';
    foreach($get_posts as $post) {
        if (!function_exists('get_field')) {
           continue;
        }
        if (!get_field('icon_color', $post->ID, true) || get_field('icon_color', $post->ID, true) == ''){
            continue;
        }
        $color = get_field('icon_color', $post->ID, true);
        $class =  'post-icon-'.$post->ID;
        $css .= "
           .$class{
               color: $color
           }
        "; 
        
    }
      
    wp_add_inline_style( 'custom-style', $css );    
}
add_action( 'wp_enqueue_scripts', 'wpdocs_styles_method' );