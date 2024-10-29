<?php
defined('ABSPATH') or die();

/**
 * Customizer options for client section
 */
class BeastThemesCompanionclientDcode {
	public static function client_customizer( $wp_customize ) {

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * client Options
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_section(
	        'rdcode_client_layout_section',
	        array(
	            'title'       => esc_html__( 'client Options', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Manage service section from here.', 'beastthemes_companion' ),
	            'priority'    => 55,
	            'panel'       => 'rdcode_homepage_settings_panel',
	        )
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Heding
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_content_client_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_content_client_heading',
	            array(
	                'label'    => esc_html__( 'Content', 'beastthemes_companion' ),
	                'section'  => 'rdcode_client_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /**
	     * Client title input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_client_title',
	        array(
	            'default'           => esc_html__( 'Our Clients', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'rdcode_client_title',
	        array(
	            'type'     => 'text',
	            'label'    => esc_html__( 'Client Title', 'beastthemes_companion' ),
	            'section'  => 'rdcode_client_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
	     * Client description input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_client_desc',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'rdcode_client_desc',
	        array(
	            'type'     => 'textarea',
	            'label'    => esc_html__( 'Client Description', 'dcode' ),
	            'section'  => 'rdcode_client_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
	     * Radio field for Column
	     * 
	     *  @since 1.0.0
	     */
	    $wp_customize->add_setting( 
	        'rdcode_client_col',
	        array(
	            'capability'        => 'edit_theme_options',
	            'default'           => '5',
	            'sanitize_callback' => 'rdcode_sanitize_radio_option',
	        ) 
	    );
	    $wp_customize->add_control( 
	        'rdcode_client_col',
	        array(
	            'type'        => 'radio',
	            'section'     => 'rdcode_client_layout_section',
	            'priority'    => 20,
	            'label'       => esc_html__( 'Clients Dispay column', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Select column for displaying clients.', 'beastthemes_companion' ),
	            'choices'     => array(
	                '2'  => esc_html__( '2 Column', 'beastthemes_companion' ),
	                '3'  => esc_html__( '3 Column', 'beastthemes_companion' ),
	                '4'  => esc_html__( '4 Column', 'beastthemes_companion' ),
	                '5'  => esc_html__( '5 Column', 'beastthemes_companion' ),
	            ),
	        )
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Heding
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_clients_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_clients_tags_heading',
	            array(
	                'label'    => esc_html__( 'Clients', 'beastthemes_companion' ),
	                'section'  => 'rdcode_client_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting( 
	        'rdcode_clients_items', 
	        array(
	            'sanitize_callback' => 'rdcode_sanitize_repeater',
	            'default'           => json_encode(array(
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
	            ))
	        )
	    );
	    $wp_customize->add_control( new beastthemes_companion_Repeater_Controler(
	        $wp_customize, 
	            'rdcode_clients_items', 
	            array(
	                'label'    				 => '',
	                'section'  				 => 'rdcode_client_layout_section',
	                'settings' 				 => 'rdcode_clients_items',
	                'priority' 				 => 5,
	                'rdcode_box_label'       => esc_html__( 'Client','beastthemes_companion' ),
	                'rdcode_box_add_control' => esc_html__( 'Add Client','beastthemes_companion' )
	            ),
	            array(
	            	'client_image'    => array(
	                    'type'        => 'image',
	                    'label'       => esc_html__( 'Image', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Select image for this.', 'beastthemes_companion' )
	                ),
	                'client_url'  => array(
	                    'type'        => 'url',
	                    'label'       => esc_html__( 'Client URL', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter Client Site URL.', 'beastthemes_companion' )
	                ),
	            )
	        ) 
	    );
	}
}