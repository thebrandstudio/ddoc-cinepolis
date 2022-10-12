<?php 
/**
 * ddoc admin Enqueue 
 */

add_action( 'admin_enqueue_scripts', 'ddoc_admin_enqueues');

function ddoc_admin_enqueues() {
  
    if(function_exists('get_current_screen')){
    
        $screen = get_current_screen(); 
        
        if ( $screen->base == 'toplevel_page_ddoc_options' ) {
            wp_enqueue_style( 'ddoc-redux-style', ddoc_CSS.'/redux-style.css' );
        }
    }
    
}
