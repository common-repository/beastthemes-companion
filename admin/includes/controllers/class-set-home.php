<?php
defined( 'ABSPATH' ) or die();

/**
 * Class to set home page
 */
class BeastThemesCompanionSetHome {
	
	public static function beastthemes_companion_companion_install_function() {

	    $ThemeFrontPage = get_option( 'beastthemes_front_page' );

	    if ( ! $ThemeFrontPage ) {

	        //post status and options
	        $post = array(
	              'comment_status' => 'closed',
	              'ping_status'    =>  'closed' ,
	              'post_author'    => 1,
	              'post_date'      => date('Y-m-d H:i:s'),
	              'post_name'      => 'Home',
	              'post_status'    => 'publish' ,
	              'post_title'     => 'Home',
	              'post_type'      => 'page',
	        ); 

	        //insert page and save the id
	        $NewValue = wp_insert_post( $post, false );
	        if ( $NewValue && ! is_wp_error( $NewValue ) ){
	            update_post_meta( $NewValue, '_wp_page_template', 'home-template.php' );
	            
	            // Use a static front page
	            $page = get_page_by_title('Home');
	            update_option( 'show_on_front', 'page' );
	            update_option( 'page_on_front', $page->ID );            
	        }

	        //save the id in the database
	        update_option( 'beastthemes_front_page', $NewValue );

	    }
	}
}