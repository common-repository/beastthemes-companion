<?php
defined( 'ABSPATH' ) or wp_die();

/**
 *  Set default values for homepage
 */
class BeastThemesCompanionDefaultValues {

	function __construct() {
		BeastThemesCompanionDefaultValues::slider_default_content();
		BeastThemesCompanionDefaultValues::service_default_content();
		BeastThemesCompanionDefaultValues::testi_default_content();
		BeastThemesCompanionDefaultValues::team_default_content();
        BeastThemesCompanionDefaultValues::client_default_content();
		BeastThemesCompanionDefaultValues::layout_default_content();
	}
	
	public static function slider_default_content() {
		$slider_data = json_decode( get_theme_mod( 'rdcode_sliders_items' ) );
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
			set_theme_mod( 'rdcode_sliders_items', $main_slider_data );
		}
	}

	public static function service_default_content() {
		$slider_data = json_decode( get_theme_mod( 'rdcode_services_items' ) );
		if ( empty( $slider_data ) ) {
			$main_slider_data = json_encode( array(
				array(
                    'service_icon' => 'fas fa-brush',
                    'service_name' => esc_html__( 'Responsive', 'beastthemes_companion' ),
                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
                    'service_url'  => '#',
                ),
                array(
                    'service_icon' => 'fas fa-award',
                    'service_name' => esc_html__( 'Creative Design', 'beastthemes_companion' ),
                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
                    'service_url'  => '#',
                ),
                array(
                    'service_icon' => 'fas fa-users',
                    'service_name' => esc_html__( 'User friendly', 'beastthemes_companion' ),
                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
                    'service_url'  => '#',
                ),			
			) );
			set_theme_mod( 'rdcode_services_items', $main_slider_data );
		}
        set_theme_mod( 'rdcode_service_col', 'col-lg-4' );
	}

	public static function testi_default_content() {
		$slider_data = json_decode( get_theme_mod( 'rdcode_testi_items' ) );
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
			set_theme_mod( 'rdcode_testi_items', $main_slider_data );
		}
	}

	public static function team_default_content() {
		$slider_data = json_decode( get_theme_mod( 'rdcode_teams_items' ) );
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
                array(
                    'member_image'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/4.jpg',
                    'member_name'    => esc_html__( 'Jack Schenziwe','beastthemes_companion' ),
                    'member_desig'   => esc_html__( 'Project Manager','beastthemes_companion' ),
                    'm_facebook_url' => '#',
                    'm_insta_url'    => '#',
                    'm_google_url'   => '#',
                    'm_twitter_url'  => '#',
                ),		
			) );
			set_theme_mod( 'rdcode_teams_items', $main_slider_data );
		}
        set_theme_mod( 'rdcode_team_col', 'col-lg-3' );
	}

	public static function client_default_content() {
		$slider_data = json_decode( get_theme_mod( 'rdcode_clients_items' ) );
		if ( empty( $slider_data ) ) {
			$main_slider_data = json_encode( array(
				array(
                    'client_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/clients/client_1.png',
                    'client_url'   => '#',
                ),
                array(
                    'client_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/clients/client_2.png',
                    'client_url'   => '#',
                ),
                array(
                    'client_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/clients/client_3.png',
                    'client_url'   => '#',
                ),
                array(
                    'client_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/clients/client_4.png',
                    'client_url'   => '#',
                ),
                array(
                    'client_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/clients/client_5.png',
                    'client_url'   => '#',
                ),
                array(
                    'client_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/clients/client_1.png',
                    'client_url'   => '#',
                ),		
			) );
			set_theme_mod( 'rdcode_clients_items', $main_slider_data );
		}
        set_theme_mod( 'rdcode_client_col', '5' );
	}

    public static function layout_default_content() {
        $dcode_home_order = get_theme_mod( 'home_dcode_section_order' );
        if ( empty( $dcode_home_order ) ) {
            set_theme_mod( 'home_dcode_section_order', beastthemes_companion_dcode_order_default() );
        }
    }
}
new BeastThemesCompanionDefaultValues();