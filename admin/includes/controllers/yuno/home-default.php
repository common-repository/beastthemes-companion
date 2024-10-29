<?php
defined( 'ABSPATH' ) or wp_die();

/**
 *  Set default values for homepage
 */
class BeastThemesCompanionDefaultValuesYuno {

	function __construct() {
		BeastThemesCompanionDefaultValuesYuno::slider_default_content();
		BeastThemesCompanionDefaultValuesYuno::service_default_content();
		BeastThemesCompanionDefaultValuesYuno::testi_default_content();
		BeastThemesCompanionDefaultValuesYuno::team_default_content();
		BeastThemesCompanionDefaultValuesYuno::about_default_content();
		BeastThemesCompanionDefaultValuesYuno::blog_default_content();
		BeastThemesCompanionDefaultValuesYuno::layout_default_content();
	}
	
	public static function slider_default_content() {
		$slider_data = json_decode( get_theme_mod( 'yuno_sliders_items' ) );
		if ( empty( $slider_data ) ) {
			$main_slider_data = json_encode( array(
				array(
                    'slider_image'     => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/slider/slider-1.jpg',
		            'slider_heading'   => esc_html__( 'Make Your Business More Profitable!','beastthemes_companion' ),
		            'slider_subhead'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
		            'slider_btn_1_txt' => esc_html__( 'GET START','beastthemes_companion' ),
		            'slider_btn_1_url' => '#',
		            'slider_btn_2_txt' => esc_html__( 'CONTACT US','beastthemes_companion' ),
		            'slider_btn_2_url' => '#',
                ),
                array(
                    'slider_image'     => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/slider/slider-2.jpg',
		            'slider_heading'   => esc_html__( 'Make Your Business More Profitable!','beastthemes_companion' ),
		            'slider_subhead'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
		            'slider_btn_1_txt' => esc_html__( 'GET START','beastthemes_companion' ),
		            'slider_btn_1_url' => '#',
		            'slider_btn_2_txt' => esc_html__( 'CONTACT US','beastthemes_companion' ),
		            'slider_btn_2_url' => '#',
                ),			
			) );
			set_theme_mod( 'yuno_sliders_items', $main_slider_data );
		}
	}

	public static function service_default_content() {
		$service_data = json_decode( get_theme_mod( 'yuno_services_items' ) );
		if ( empty( $service_data ) ) {
			$service_data = json_encode( array(
				array(
                    'service_icon' => 'fas fa-brush',
                    'service_name' => esc_html__( 'Responsive', 'beastthemes_companion' ),
                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
                    'service_btn'  => esc_html__( 'Read More', 'beastthemes_companion' ),
                    'service_url'  => '#',
                ),
                array(
                    'service_icon' => 'fas fa-award',
                    'service_name' => esc_html__( 'Creative Design', 'beastthemes_companion' ),
                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
                    'service_btn'  => esc_html__( 'Read More', 'beastthemes_companion' ),
                    'service_url'  => '#',
                ),
                array(
                    'service_icon' => 'fas fa-users',
                    'service_name' => esc_html__( 'User friendly', 'beastthemes_companion' ),
                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
                    'service_btn'  => esc_html__( 'Read More', 'beastthemes_companion' ),
                    'service_url'  => '#',
                ),			
			) );
			set_theme_mod( 'yuno_services_items', $service_data );
		}
		set_theme_mod( 'yuno_service_icon_hide', 'show' );
		set_theme_mod( 'yuno_service_title_hide', 'show' );
		set_theme_mod( 'yuno_service_content_hide', 'show' );
		set_theme_mod( 'yuno_service_title', esc_html__( 'Our Services', 'beastthemes_companion' ) );
		set_theme_mod( 'yuno_service_subtitle', esc_html__( 'A Better Website Means Better Experience', 'beastthemes_companion' ) );
		set_theme_mod( 'yuno_service_desc', esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 'beastthemes_companion' ) );
	}

	public static function testi_default_content() {
		$slider_data = json_decode( get_theme_mod( 'yuno_testi_items' ) );
		if ( empty( $slider_data ) ) {
			$main_slider_data = json_encode( array(
				array(
                    'testi_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/1.jpg',
                    'testi_name'  => esc_html__( 'Jesica Gomez','beastthemes_companion' ),
                    'testi_desig' => esc_html__( 'CEO, Founder','beastthemes_companion' ),
                    'testi_mgs'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
                    'testi_rating'=> 5,
                ),
                array(
                    'testi_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/2.jpg',
                    'testi_name'  => esc_html__( 'Jesica Gomez','beastthemes_companion' ),
                    'testi_desig' => esc_html__( 'CEO, Founder','beastthemes_companion' ),
                    'testi_mgs'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
                    'testi_rating'=> 5,
                ),
                array(
                    'testi_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/3.jpg',
                    'testi_name'  => esc_html__( 'Jesica Gomez','beastthemes_companion' ),
                    'testi_desig' => esc_html__( 'CEO, Founder','beastthemes_companion' ),
                    'testi_mgs'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
                    'testi_rating'=> 5,
                ),			
			) );
			set_theme_mod( 'yuno_testi_items', $main_slider_data );
		}
		set_theme_mod( 'yuno_testi_title', esc_html__( 'Our Testimonioal', 'beastthemes_companion' ) );
		set_theme_mod( 'yuno_testi_subtitle', esc_html__( 'A Better Website Means Better Experience', 'beastthemes_companion' ) );
		set_theme_mod( 'yuno_testi_desc', esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 'beastthemes_companion' ) );
	}

	public static function team_default_content() {
		$slider_data = json_decode( get_theme_mod( 'yuno_teams_items' ) );
		if ( empty( $slider_data ) ) {
			$main_slider_data = json_encode( array(
				array(
                    'member_image'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/1.jpg',
                    'member_name'    => esc_html__( 'Jack Schenziwe','beastthemes_companion' ),
                    'member_desig'   => esc_html__( 'Project Manager','beastthemes_companion' ),
                    'm_facebook_url' => '#',
                    'm_insta_url'    => '#',
                    'm_google_url'   => '#',
                    'm_twitter_url'  => '#',
                ),
                array(
                    'member_image'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/2.jpg',
                    'member_name'    => esc_html__( 'Jack Schenziwe','beastthemes_companion' ),
                    'member_desig'   => esc_html__( 'Project Manager','beastthemes_companion' ),
                    'm_facebook_url' => '#',
                    'm_insta_url'    => '#',
                    'm_google_url'   => '#',
                    'm_twitter_url'  => '#',
                ),
                array(
                    'member_image'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/3.jpg',
                    'member_name'    => esc_html__( 'Jack Schenziwe','beastthemes_companion' ),
                    'member_desig'   => esc_html__( 'Project Manager','beastthemes_companion' ),
                    'm_facebook_url' => '#',
                    'm_insta_url'    => '#',
                    'm_google_url'   => '#',
                    'm_twitter_url'  => '#',
                ),			
			) );
			set_theme_mod( 'yuno_teams_items', $main_slider_data );
		}
		set_theme_mod( 'yuno_team_title', esc_html__( 'Meet our team', 'beastthemes_companion' ) );
		set_theme_mod( 'yuno_team_subtitle', esc_html__( 'Our Creative Leaders', 'beastthemes_companion' ) );
		set_theme_mod( 'yuno_team_desc', esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 'beastthemes_companion' ) );
	}

	public static function about_default_content() {
        set_theme_mod( 'yuno_about_title', esc_html__( 'About Us','beastthemes_companion' ) );
        set_theme_mod( 'yuno_about_subtitle', esc_html__( 'A Better Website Means Better Experience','beastthemes_companion' ) );
        set_theme_mod( 'yuno_about_img_bg', BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/slider/slider-2.jpg' );
        set_theme_mod( 'yuno_about_desc', esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.','beastthemes_companion' ) );
        set_theme_mod( 'yuno_about_btn_text', esc_html__( 'Read More','beastthemes_companion' ) );
        set_theme_mod( 'yuno_about_btn_link', '#' );
	}

	public static function blog_default_content() {
        set_theme_mod( 'yuno_blog_title', esc_html__( 'Our Blogs','beastthemes_companion' ) );
        set_theme_mod( 'yuno_blog_subtitle', esc_html__( 'A Better Website Means Better Experience','beastthemes_companion' ) );
        set_theme_mod( 'yuno_blog_excerpt_hide', 'show' );
		set_theme_mod( 'yuno_blog_readmore_hide', 'show' );
		set_theme_mod( 'yuno_blog_desc', esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 'beastthemes_companion' ) );
	}

	public static function layout_default_content() {
        $dcode_home_order = get_theme_mod( 'home_page_section_order' );
        if ( empty( $dcode_home_order ) ) {
            set_theme_mod( 'home_page_section_order', beastthemes_companion_yuno_order_default() );
        }
    }
}
new BeastThemesCompanionDefaultValuesYuno();

function beastthemes_companion_yuno_body_classes( $classes ) {

	$yuno_slider_home = yuno_theme_mod_option( 'yuno_slider_home' );

	if ( $yuno_slider_home == '1' ) {
		$classes[] = 'add-header';
	} else {
		$classes[] = 'remove-header';
	}

	return $classes;
}
add_filter( 'body_class', 'beastthemes_companion_yuno_body_classes' );

function beastthemes_companion_yuno_custom_style() {
	$custom_css        = '';
	$yuno_slider_home  = yuno_theme_mod_option( 'yuno_slider_home' );
	$service_icon_size = yuno_theme_mod_option( 'yuno_service_icon_size' );
	$service_bg_color  = yuno_theme_mod_option( 'yuno_service_bg_color' );

	if ( $yuno_slider_home != '1' ) {
        $custom_css .= ".remove-header .navbar {
		    position: relative;
		    top: 0;
		}";
		$custom_css .= ".main-navigation .container {
		    margin-bottom: 0;
		}";
    }

    if ( ! empty( $service_icon_size ) ) {
        $custom_css .= ".service-box .service-icon {
		    font-size: ".esc_attr( $service_icon_size )."px!important;
		}";
    }

    if ( ! empty( $service_bg_color ) ) {
        $custom_css .= "section.service-section.bg-gray {
		    background-color: ".esc_attr( $service_bg_color ).";
		}";
    }

    wp_add_inline_style( 'yuno-inline-style', $custom_css ); 
}
add_action( 'wp_enqueue_scripts', 'beastthemes_companion_yuno_custom_style' );