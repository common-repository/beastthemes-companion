<?php
defined('ABSPATH') or die();

/**
 * customizer file includes
 */
require_once( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH. 'admin/includes/controllers/dcode/customizer/class-custom-functions.php' );
require_once( 'customizer/slider-options.php' );
require_once( 'customizer/about-options.php' );
require_once( 'customizer/service-options.php' );
require_once( 'customizer/testimonial-options.php' );
require_once( 'customizer/team-options.php' );
require_once( 'customizer/blog-options.php' );
require_once( 'customizer/home-shorter.php' );
require_once( 'home-default.php' );

add_action( 'customize_register', array( 'BeastThemesCompanionSliderYuno', 'slider_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionAboutYuno', 'about_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionServiceYuno', 'service_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionTestimonialYuno', 'testi_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionTeamYuno', 'team_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionBlogYuno', 'blog_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionHomeYuno', 'home_customizer' ) );

function beastthemes_companion_scripts() {
    wp_enqueue_style( 'swiper', BEASTTHEMES_COMPANION_PLUGIN_URL.'admin/includes/controllers/yuno/css/swiper.min.css' );
    wp_enqueue_style( 'beastthemes-yuno', BEASTTHEMES_COMPANION_PLUGIN_URL.'admin/includes/controllers/yuno/css/yuno-style.css' );
    wp_enqueue_script( 'swiper.min', BEASTTHEMES_COMPANION_PLUGIN_URL.'admin/includes/controllers/yuno/js/swiper.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'vanilla-tilt.min', BEASTTHEMES_COMPANION_PLUGIN_URL.'admin/includes/controllers/yuno/js/vanilla-tilt.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'beastthemes-yuno-script', BEASTTHEMES_COMPANION_PLUGIN_URL.'admin/includes/controllers/yuno/js/yuno-script.js', array( 'jquery' ), '', true );

    $yuno_testi_col = get_theme_mod( 'yuno_testi_col', '3' );
    $yuno_blog_col  = get_theme_mod( 'yuno_blog_col', '3' );

    wp_localize_script( 'beastthemes-yuno-script', 'beasttheme_yuno_script',
        array( 
            'ajax_url'  => admin_url( 'admin-ajax.php' ),
            'blog_col'  => $yuno_blog_col,
            'testi_col' => $yuno_testi_col,
        )
    );
}
add_action( 'wp_enqueue_scripts', 'beastthemes_companion_scripts' );