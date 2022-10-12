<?php 

/**
 * helper function for ddoc 
 */

 /**
  * ddoc return 
  */

if ( !function_exists('ddoc_return') ) {

    function ddoc_return( $html ){
        return $html;
    }
}

/**
 * Get editor data 
 */
if ( !function_exists('ddoc_editor_data') ) {

    function ddoc_editor_data( $data ) {
        return wp_kses_post( $data );
    }

}


/*
 * Resize media image 
 * To get instant resize 
 */

if ( !function_exists('ddoc_get_image') ) {

    function ddoc_get_image( $id, $size = 'full', $icon= false,  $attr = '') {
       
       echo  wp_get_attachment_image($id, $size, $icon, $attr);

    }
    
}

/**
 * ddoc kses
 */
if ( !function_exists('ddoc_kses') ) {

    function ddoc_kses ( $data ) {

        $allowed_tags = array(
            'a'     => [
                'class'	 => [],
                'href'	 => [],
                'rel'	 => [],
                'title'	 => [],
            ],
            'abbr'  => [
                'title' => [],
            ],
            'b'     => [],
            'blockquote'    => [
                'cite' => [],
            ],
            'cite'	=> [
                'title' => [],
            ],
            'code'	=> [],
            'del'	=> [
                'datetime'	 => [],
                'title'		 => [],
            ],
            'dd'    => [],
            'div'   => [
                'class'	 => [],
                'title'	 => [],
                'style'	 => [],
            ],
            'dl'    => [],
            'dt'    => [],
            'em'	=> [],
            'h1'	=> [],
            'h2'	=> [],
            'h3'	=> [],
            'h4'	=> [],
            'h5'	=> [],
            'h6'	=> [],
            'i'		=> [
                'class' => [],
            ],
            'img'	=> [
                'alt'	 => [],
                'class'	 => [],
                'height' => [],
                'src'	 => [],
                'width'	 => [],
            ],
            'p'		=> [
                'class' => [],
            ],
            'q'		=> [
                'cite'	 => [],
                'title'	 => [],
            ],
            'span'	=> [
                'class'	 => [],
                'title'	 => [],
                'style'	 => [],
            ],
            'strike'	=> [],
            'br'		=> [],
            'strong'	=> [],
            'ul'		=> [
                'class' => [],
            ],
            'ol'	=> [
                'class' => [],
            ],
            'li'	=> [
                'class' => [],
            ],
        );
       
        return wp_kses($data, $allowed_tags);
    }
}

/**
 * get ddoc option 
 */

if ( !function_exists('ddoc_opt') ) {

    function ddoc_opt ( $section_id, $default = '' ) {

        $ddoc_option_data = $default;

        if ( class_exists( 'Redux' ) ) {

            global $ddoc_opt;
            $ddoc_option_data = (isset($ddoc_opt[$section_id]) && (!empty($ddoc_opt[$section_id]))) ? $ddoc_opt[$section_id] : $default;

        }

        return $ddoc_option_data;

    }

 }

 /**
 * get ddoc option 
 */

if(!function_exists('ddoc_page_meta')){

    function ddoc_page_meta ( $meta_id, $id, $default = '' ) {

       $metadata =  $default; 

       if(function_exists('get_field')) {
         $metadata = (get_field($meta_id, $id) != '') ? get_field($meta_id, $id): $default;
       }
      
       return $metadata;

    }

 }

/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function ddoc_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = '';

    /* Body font */
    if (  'off' !== 'on'  ) {
        $fonts[] = "Poppins:400,500,600,700,800,900";
    }

    $is_ssl = is_ssl() ? 'https' : 'http';

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts  ) ),
            'subset' => urlencode( $subsets ),
        ), "$is_ssl://fonts.googleapis.com/css" );
    }

    return $fonts_url;
}