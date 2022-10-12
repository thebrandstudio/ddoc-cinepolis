<?php
// Register Widget areas
add_action( 'widgets_init', function() {



    //==================== Blog Primary Sidebar =================//
    register_sidebar(
        array(
            'name'          => esc_html__( 'Primary Sidebar', 'ddoc' ),
            'id'            => 'blog_sidebar',
            'description'   => esc_html__( 'Place widgets in sidebar widgets area.', 'ddoc' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );


    //==================== Docs Sidebar =================//
    register_sidebar(
        array(
            'id'            => 'dddoc_sidebar',
            'name'          => __( 'Docs Sidebar', 'ddoc' ),
            'description'   => __( 'A short description of the sidebar.', 'ddoc' ),
            'before_widget' => '<div id="%1$s" class="docs_sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    //==================== Docs Sidebar =================//
    register_sidebar(
        array(
            'id'            => 'forum_sidebar',
            'name'          => __( 'Forum Sidebar', 'ddoc' ),
            'description'   => __( 'A short description of the sidebar.', 'ddoc' ),
            'before_widget' => '<div id="%1$s" class="forum_sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

});