<?php
defined('ABSPATH') or die();

/**
 * customizer file includes
 */
require_once( 'customizer/class-custom-functions.php' );
require_once( 'customizer/slider-options.php' );
require_once( 'customizer/service-options.php' );
require_once( 'customizer/testimonial-options.php' );
require_once( 'customizer/team-options.php' );
require_once( 'customizer/client-options.php' );
require_once( 'customizer/homepage-layout.php' );
require_once( 'home-default.php' );

add_action( 'customize_register', array( 'BeastThemesCompanionLayoutDcode', 'layout_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionSliderDcode', 'slider_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionServiceDcode', 'service_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionTestimonialDcode', 'testi_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionteamDcode', 'team_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionclientDcode', 'client_customizer' ) );

function beastthemes_companion_scripts() {
	wp_enqueue_style( 'lity-min', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/css/lity.min.css' );
    wp_enqueue_style( 'slick', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/css/slick.css' );
    wp_enqueue_style( 'beastthemes-dcode-style', BEASTTHEMES_COMPANION_PLUGIN_URL.'admin/includes/controllers/dcode/css/dcode-style.css' );
    
    wp_enqueue_script( 'jquery-masonry' );
    wp_enqueue_script( 'lity.min', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/js/lity.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'shuffle.min', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/js/shuffle.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'slick.min', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/js/slick.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'beastthemes-dcode-script', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/js/dcode-script.js', array( 'jquery' ), '', true );
    $rdcode_blog_col   = get_theme_mod( 'rdcode_blog_col', 'col-lg-4' );
    $rdcode_client_col = get_theme_mod( 'rdcode_client_col', '5' );
    if ( ! empty ( $rdcode_blog_col ) ) {
        if ( $rdcode_blog_col == 'col-lg-12' ) {
            $col = 1;
        } elseif ( $rdcode_blog_col == 'col-lg-6' ) {
            $col = 2;
        } elseif ( $rdcode_blog_col == 'col-lg-4' ) {
            $col = 3;
        } elseif ( $rdcode_blog_col == 'col-lg-3' ) {
            $col = 4;
        } else {
            $col = 3;
        }
    }
    wp_localize_script( 'beastthemes-dcode-script', 'beasttheme_dcode_script',
        array( 
            'ajax_url'   => admin_url( 'admin-ajax.php' ),
            'blog_col'   => $col,
            'client_col' => $rdcode_client_col,
        )
    );
}
add_action( 'wp_enqueue_scripts', 'beastthemes_companion_scripts' );