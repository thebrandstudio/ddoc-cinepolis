<?php
// Header Section
Redux::set_section( 'ddoc_opt', array(
    'title'            => esc_html__( 'Header', 'ddoc' ),
    'id'               => 'header_settings_opt',
    'customizer_width' => '400px',
    'icon'             => 'dashicons dashicons-arrow-up-alt2',
));


// Logo
Redux::set_section( 'ddoc_opt', array(
    'title'            => esc_html__( 'Logo', 'ddoc' ),
    'id'               => 'upload_logo_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Upload logo', 'ddoc' ),
            'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'ddoc' ),
            'id'        => 'logo',
            'type'      => 'media',
            'default'   => array(
                'url'   => ddoc_IMAGES.'/default_logo/logo.svg'
            )
        ),

        array(
            'title'     => esc_html__( 'Sticky header logo', 'ddoc' ),
            'id'        => 'sticky_logo',
            'type'      => 'media',
            'default'   => array(
                'url'   => ddoc_IMAGES.'/default_logo/logo.svg'
            )
        ),

        array(
            'title'     => esc_html__( 'Retina Logo', 'ddoc' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo', 'ddoc' ),
            'id'        => 'retina_logo',
            'type'      => 'media',
        ),

        array(
            'title'     => esc_html__( 'Retina Sticky Logo', 'ddoc' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo', 'ddoc' ),
            'id'        => 'retina_sticky_logo',
            'type'      => 'media',
        ),

        array(
            'title'     => esc_html__( 'Logo dimensions', 'ddoc' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo.', 'ddoc' ),
            'id'        => 'logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.logo_info .navbar-brand img'
        ),

        array(
            'title'     => esc_html__( 'Padding', 'ddoc' ),
            'subtitle'  => esc_html__( 'Padding around the logo. Input the padding as clockwise (Top Right Bottom Left)', 'ddoc' ),
            'id'        => 'logo_padding',
            'type'      => 'spacing',
            'output'    => array( '.logo_info .navbar-brand img' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        ),
    )
) );


/**
 * Menu Settings
 */
Redux::set_section( 'ddoc_opt', array(
    'title'            => esc_html__( 'Header Styling', 'ddoc' ),
    'id'               => 'header_styling_opt',
    'icon'             => '',
    'subsection'       => true,
    'fields'           => array(
         array(
            'id'       => 'search_icon_toggle',
            'type'     => 'button_set',
            'title'    => esc_html__('Show Search Icon', 'ddoc'),
            'options' => array(
                'yes' => esc_html__('Yes', 'ddoc'), 
                'no' => esc_html__('No', 'ddoc'), 
             ), 
            'default' => 'yes'
        )

    )
));