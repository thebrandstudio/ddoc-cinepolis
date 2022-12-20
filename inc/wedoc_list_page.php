<?php
namespace dl\doc;

use Walker_Page;

/**
 * weDocs Docs Walker.
 */
class Walker extends Walker {

    /**
     * Initialize the class
     */
    public function start_el( &$output, $page, $depth = 0, $args = [], $current_page = 0 ) {

        if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
            $args['link_after'] = '<span id="enlace">'.$page->post_title.'</span><span class="wedocs-icon wedocs-icon-angle-down"></span><span id="prueba" data-page-id="'.$page->ID.'"></span>';
        }else{
          $args['link_after'] = '<span id="enlace">'.$page->post_title.'</span><span data-page-id="'.$page->ID.'"></span>';
        }

        $icon_html = '';
        $get_icon_type = get_field('select_icon_type_', $page->ID, true);
        $get_icon = get_field('select_icon', $page->ID, true);
        $get_image = get_field('upload_image_icon_svg', $page->ID, true);

        $get_image_html = '';
        if(isset($get_image['ID']) && '' != $get_image['ID']){
            $get_image_html = wp_get_attachment_image($get_image['ID'], [30, 30]);
        }

        if( $get_icon_type == 'icon') {
            $icon_html = $get_icon;
        }
        if( $get_icon_type == 'image' && $get_image_html != '') {
            $icon_html = $get_image_html;
        }

        if($icon_html != '') {
            $args['link_before'] = $icon_html;
        }
        parent::start_el( $output, $page, $depth, $args, $current_page );
    }
}
