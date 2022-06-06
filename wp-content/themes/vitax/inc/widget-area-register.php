<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if(!function_exists('bdwebteam_widgets_init')){
    function bdwebteam_widgets_init() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'vitax'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'vitax'),
            'before_widget' => '<div class="%1$s widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        
        if ( class_exists( 'WooCommerce' ) ) {
            register_sidebar(array(
                'name' => esc_html__('Shop Sidebar', 'keystroke'),
                'id' => 'sidebar-shop',
                'description' => esc_html__('Add widgets here.', 'keystroke'),
                'before_widget' => '<div id="%1$s" class="bdwebteam-single-widget %2$s mt--65 mt_sm--30 mt_md--30">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="title mb--15">',
                'after_title' => '</h4>',
            ));
        }
        register_sidebar( array(
            'name'              => esc_html__( 'Projects', 'vitax' ),
            'id'                => 'widgets-projects',
            'before_widget'     => '<div id="%1$s" class="widget %2$s">',
            'after_widget'      => '</div>',
            'before_title'      => '<h3 class="d-none bdwebteam-widget-title widget-title">',
            'after_title'       => '</h3>'
        ));
       
        $number_of_widget 	= 4;
        $bdwebteam_widget_titles = array(
            '1' => esc_html__( 'Footer 1', 'vitax' ),
            '2' => esc_html__( 'Footer 2', 'vitax' ),
            '3' => esc_html__( 'Footer 3', 'vitax' ),
            '4' => esc_html__( 'Footer 4', 'vitax' ),            
        );
        for ( $i = 1; $i <= $number_of_widget; $i++ ) {
            register_sidebar( array(
                'name'          => $bdwebteam_widget_titles[$i],
                'id'            => 'footer-'. $i,
                'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s"><div class="footer-menu-link">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h6 class="widget-title">',
                'after_title'   => '</h6>',
            ) );
        }
    }
}
add_action( 'widgets_init', 'bdwebteam_widgets_init' );