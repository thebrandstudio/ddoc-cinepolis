<?php
// Header Section
Redux::set_section( 'ddoc_opt', array(
    'title'            => esc_html__( 'Page Settings', 'ddoc' ),
    'id'               => 'page_settings_opt',
    'customizer_width' => '400px',
    'icon'             => 'dashicons dashicons-admin-page',
));


// color
Redux::set_section( 'ddoc_opt', array(
    'title'            => esc_html__( 'Layout', 'ddoc' ),
    'id'               => 'page_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
      
        array(
            'id'       => 'page_layout',
            'type'     => 'image_select',
            'title'    => __('Page Layout', 'ddoc'), 
            'subtitle' => __('Select your Page Layout', 'ddoc'),
            'options'  => array(
                'full'      => array(
                    'alt'   => 'Full Width',
                    'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                ),
                'left'      => array(
                    'alt'   => 'Left Sidebar',
                    'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                ),
                'right'      => array(
                    'alt'   => 'Right Sidebar',
                    'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
                ),
            ),
            'default' => 'right'
        ),
    )
) );