<?php
defined('ABSPATH') or die();

require_once( 'includes/controllers/class-call-theme-action.php' );
require_once( 'functions.php' );
require_once( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH. 'admin/includes/helpers/helper.php' );

/**
 * action calls for all functions
 */
add_action( 'init', array( 'BeastThemesCompanionTheme', 'beastthemes_companion_init' ) );


/**
 * Enqueue Scripts
 */
function beastthemes_comapnion_customizer_assets() {
    wp_enqueue_style( 'beastthemes-companion-custom-css', BEASTTHEMES_COMPANION_PLUGIN_URL . 'assets/css/customizer.css' );
    wp_enqueue_script( 'beastthemes-companion-custom-js', BEASTTHEMES_COMPANION_PLUGIN_URL . 'assets/js/customizer.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), true, true );
}
add_action( 'customize_controls_print_styles', 'beastthemes_comapnion_customizer_assets' );
add_action( 'customize_preview_init', 'beastthemes_comapnion_customizer_assets' );