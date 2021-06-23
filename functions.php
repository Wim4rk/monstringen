<?php
function monstringen_enqueue_styles() {
    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'monstringen_enqueue_styles' );


function monstringen_body_class( $classes ) {
    if ( is_page_template( 'template-sidebar.php' || is_page_template('template-residents.php' ) ) ) {
        if (is_active_sidebar('sidebar-1')){
            $classes[] = 'has-sidebar';
            foreach($classes as $key => $class) {
                if( $class == "page-one-column" || $class == "page-two-column"){
                    unset($classes[$key]);
                }
            }
        }
    }
    return $classes;
};
add_filter( 'body_class', 'monstringen_body_class', 20);

function register_page_aside_widget_area() {
    register_sidebar(
        array(
            'name'          => __( 'Page Sidebar', 'monstringen' ),
            'id'            => 'sidebar-for-page',
            'description'   => __( 'Add widgets here to appear on pages.', 'monstringen' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'register_page_aside_widget_area' );

function monstringen_tab_title($title = null, $sep = null, $seplocation = null){
    return "BRF Mönstringen | " . get_the_title();
}

add_filter( 'pre_get_document_title', 'monstringen_tab_title', 10, 1);
// add_filter( 'wp_title', 'monstringen_tab_title', 10, 3);
