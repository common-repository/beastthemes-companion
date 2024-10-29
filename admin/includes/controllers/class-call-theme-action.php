<?php
defined('ABSPATH') or die();

require_once( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH. 'admin/includes/helpers/helper.php' );

if( ! function_exists( 'beastthemes_font_awesome_social_icon_array' ) ) :

    /**
     * Define font awesome social media icons
     *
     * @return array();
     * @since 1.0.0
     */

    function beastthemes_font_awesome_social_icon_array(){
        return array(
            "fab fa-facebook-square","fab fa-facebook-f","fab fa-facebook","fab fa-facebook-messenger","fab fa-twitter-square","fab fa-twitter","fab fa-yahoo","fab fa-google","fab fa-google-wallet","fab fa-google-plus","fab fa-google-plus-g","fab fa-google-plus-square","fab fa-instagram","fab fa-linkedin-in","fab fa-linkedin","fab fa-pinterest-p","fab fa-pinterest","fab fa-pinterest-square","fab fa-google-plus-square","fab fa-google-plus","fab fa-youtube-square","fab fa-youtube","fab fa-vimeo","fab fa-vimeo-square","fab fa-behance","fab fa-behance-square", "fab fa-facebook", "fas fa-thumbs-up", "far fa-thumbs-up", "fas fa-thumbs-down", "far fa-thumbs-down", "fas fa-video", "fas fa-users", "fas fa-user-friends", "fas fa-user-circle", "far fa-user-circle", "fas fa-star", "far fa-star", "fas fa-camera", "fas fa-birthday-cake", "fas fa-bell", "far fa-bell", "fas fa-comment", "far fa-comment", "fas fa-heart", "far fa-heart", "fas fa-poll", "fas fa-map-marker-alt", "fab fa-accessible-icon", "fas fa-ad", "fas fa-address-book", "far fa-address-book", "fas fa-address-card", "far fa-address-card", "fas fa-adjust", "fas fa-air-freshener", "fab fa-algolia", "fas fa-align-center", "fas fa-align-justify", "fas fa-align-left", "fas fa-align-right", "fab fa-alipay", "fab fa-amazon", "fab fa-amazon-pay", "fas fa-ambulance", "fas fa-american-sign-language-interpreting", "fas fa-anchor", "fab fa-android", "fab fa-angellist", "fas fa-angle-double-down", "fas fa-angle-double-left", "fas fa-angle-double-right", "fas fa-angle-double-up", "fas fa-angle-down", "fas fa-angle-left", "fas fa-angle-right", "fas fa-angle-up", "fas fa-angry", "far fa-angry", "fab fa-angrycreative", "fab fa-angular", "fas fa-ankh", "fab fa-app-store", "fab fa-app-store-ios", "fab fa-apper", "fab fa-apple", "fas fa-apple-alt", "fab fa-apple-pay", "fas fa-archive", "fas fa-archway", "fas fa-arrow-alt-circle-down", "far fa-arrow-alt-circle-down", "fas fa-arrow-alt-circle-left", "far fa-arrow-alt-circle-left", "fas fa-arrow-alt-circle-right", "far fa-arrow-alt-circle-right", "fas fa-arrow-alt-circle-up", "far fa-arrow-alt-circle-up", "fas fa-arrow-circle-down", "fas fa-arrow-circle-left", "fas fa-arrow-circle-right", "fas fa-arrow-circle-up", "fas fa-arrow-down", "fas fa-arrow-left", "fas fa-arrow-right", "fas fa-arrow-up", "fas fa-atlas", "fas fa-atom", "fas fa-award", "fab fa-aws", "fas fa-backspace", "fas fa-backward", "fas fa-balance-scale", "fas fa-band-aid", "fas fa-ban", "fas fa-bars", "fas fa-baseball-ball", "fas fa-basketball-ball", "fas fa-bath", "fas fa-battery-empty", "fas fa-battery-full", "fas fa-battery-half", "fas fa-bed", "fas fa-beer", "fab fa-behance", "fab fa-behance-square", "fas fa-bell", "far fa-bell", "fas fa-bell-slash", "far fa-bell-slash", "fas fa-bible", "fas fa-bicycle", "fas fa-binoculars", "fas fa-birthday-cake", "fab fa-bitcoin", "fab fa-blogger", "fas fa-bomb", "fas fa-book", "fas fa-book-open", "fas fa-bookmark", "far fa-bookmark", "fas fa-bowling-ball", "fas fa-briefcase", "fas fa-briefcase-medical", "fas fa-brush", "fas fa-bug", "fas fa-building", "fas fa-bullhorn", "fas fa-bullseye", "fas fa-burn", "fas fa-bus", "fas fa-bus-alt", "fas fa-business-time", "fas fa-calculator", "fas fa-calendar", "far fa-calendar", "fas fa-calendar-alt", "far fa-calendar-alt", "far fa-calendar-check", "fas fa-calendar-plus", "fas fa-calendar-times", "fas fa-camera", "fas fa-camera-retro", "fas fa-cannabis", "fas fa-capsules", "fas fa-car", "fas fa-car-battery", "fas fa-cart-plus", "fas fa-chart-area", "fas fa-chart-bar", "fas fa-chart-line", "fas fa-chart-pie", "far fa-check-circle", "fas fa-check-circle", "fas fa-chess", "fas fa-code"
        );
    }
    
endif;

/**
 * Class to set home page
 */
 class BeastThemesCompanionTheme {

 	/* Select theme for companion plugin */
    public static function beastthemes_companion_init() {

		$current_theme = BeastThemesCompanionHelper::beastthemes_companion_get_theme_name();
		
		if ( file_exists( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "admin/includes/controllers/$current_theme/init.php" ) ) {
			require( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "admin/includes/controllers/$current_theme/init.php" );
		}
	}
 }