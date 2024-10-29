<?php
defined('ABSPATH') or die();

/**
 * Customizer options for service section
 */
class BeastThemesCompanionServiceYuno {
	public static function service_customizer( $wp_customize ) {

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Service Options
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_section(
	        'yuno_service_layout_section',
	        array(
	            'title'       => esc_html__( 'Service Section', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Manage service section from here.', 'beastthemes_companion' ),
	            'priority'    => 55,
	            'panel'       => 'yuno_homepage_settings_panel',
	        )
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Heding
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_content_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new yuno_Customizer_Heading(
	        $wp_customize,
	            'yuno_content_tags_heading',
	            array(
	                'label'    => esc_html__( 'Content', 'beastthemes_companion' ),
	                'section'  => 'yuno_service_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /**
	     * Service title input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_service_title',
	        array(
	            'default'           => esc_html__( 'Our Services', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'yuno_service_title',
	        array(
	            'type'     => 'text',
	            'label'    => esc_html__( 'Service Title', 'beastthemes_companion' ),
	            'section'  => 'yuno_service_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
         * Service subtitle input box
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_service_subtitle',
            array(
                'default'           => esc_html__( 'A Better Website Means Better Experience', 'beastthemes_companion' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_service_subtitle',
            array(
                'type'     => 'text',
                'label'    => esc_html__( 'About Subtitle', 'beastthemes_companion' ),
                'section'  => 'yuno_service_layout_section',
                'priority' => 5
            )
        );

	    /**
	     * Service description input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_service_desc',
	        array(
	            'default'           => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'yuno_service_desc',
	        array(
	            'type'     => 'textarea',
	            'label'    => esc_html__( 'Service Description', 'dcode' ),
	            'section'  => 'yuno_service_layout_section',
	            'priority' => 5
	        )
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Heding
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_services_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new yuno_Customizer_Heading(
	        $wp_customize,
	            'yuno_services_tags_heading',
	            array(
	                'label'    => esc_html__( 'Services', 'beastthemes_companion' ),
	                'section'  => 'yuno_service_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting( 
	        'yuno_services_items', 
	        array(
	            'sanitize_callback' => 'yuno_sanitize_repeater',
	            'default'           => json_encode(array(
	                array(
	                    'service_icon' => 'fas fa-brush',
	                    'service_name' => esc_html__( 'Responsive', 'beastthemes_companion' ),
	                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
	                    'service_btn'  => esc_html__( 'Read More', 'beastthemes_companion' ),
	                    'service_url'  => '#',
	                    'service_trg'  => '',
	                ),
	                array(
	                    'service_icon' => 'fas fa-award',
	                    'service_name' => esc_html__( 'Creative Design', 'beastthemes_companion' ),
	                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
	                    'service_btn'  => esc_html__( 'Read More', 'beastthemes_companion' ),
	                    'service_url'  => '#',
	                    'service_trg'  => '',
	                ),
	                array(
	                    'service_icon' => 'fas fa-users',
	                    'service_name' => esc_html__( 'User friendly', 'beastthemes_companion' ),
	                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
	                    'service_btn'  => esc_html__( 'Read More', 'beastthemes_companion' ),
	                    'service_url'  => '#',
	                    'service_trg'  => '',
	                ),
	            ))
	        )
	    );

	    $wp_customize->add_control( new beastthemes_companion_Repeater_Controler(
	        $wp_customize, 
	            'yuno_services_items', 
	            array(
	                'label'    				 => '',
	                'section'  				 => 'yuno_service_layout_section',
	                'settings' 				 => 'yuno_services_items',
	                'priority' 				 => 5,
	                'rdcode_box_label'       => esc_html__( 'Service','beastthemes_companion' ),
	                'rdcode_box_add_control' => esc_html__( 'Add Service','beastthemes_companion' )
	            ),
	            array(
	                'service_icon' => array(
	                    'type'        => 'social_icon',
	                    'label'       => esc_html__( 'Service icon', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Choose Service icon.', 'beastthemes_companion' )
	                ),
	                'service_name' => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Service name', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter service name.', 'beastthemes_companion' )
	                ),
	                'service_desc' => array(
	                    'type'        => 'textarea',
	                    'label'       => esc_html__( 'Service description', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter service description.', 'beastthemes_companion' )
	                ),
	                'service_btn'  => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Service Button text', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter service button text.', 'beastthemes_companion' )
	                ),
	                'service_url'  => array(
	                    'type'        => 'url',
	                    'label'       => esc_html__( 'Service Button URL', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter service button URL.', 'beastthemes_companion' )
	                ),
	                'service_trg' => array(
	                    'type'        => 'checkbox',
	                    'label'       => esc_html__( 'Open Link in New Tab', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enable this to open link in new tab.', 'beastthemes_companion' )
	                ),
	            )
	        ) 
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Heding
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_visibility_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new yuno_Customizer_Heading(
	        $wp_customize,
	            'yuno_visibility_tags_heading',
	            array(
	                'label'    => esc_html__( 'Visibility', 'beastthemes_companion' ),
	                'section'  => 'yuno_service_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'yuno_service_icon_hide',
	        array(
	            'default'           => 'show',
	            'sanitize_callback' => 'yuno_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customize_Switch_Control(
	        $wp_customize,
	            'yuno_service_icon_hide',
	            array(
	                'type'          => 'switch',
	                'label'         => esc_html__( 'Service icon', 'beastthemes_companion' ),
	                'description'   => esc_html__( 'Show/Hide option for service icons.', 'beastthemes_companion' ),
	                'section'       => 'yuno_service_layout_section',
	                'choices'       => array(
	                    'show'      => esc_html__( 'Show', 'beastthemes_companion' ),
	                    'hide'      => esc_html__( 'Hide', 'beastthemes_companion' )
	                ),
	                'priority'      => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'yuno_service_title_hide',
	        array(
	            'default'           => 'show',
	            'sanitize_callback' => 'yuno_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customize_Switch_Control(
	        $wp_customize,
	            'yuno_service_title_hide',
	            array(
	                'type'          => 'switch',
	                'label'         => esc_html__( 'Service title', 'beastthemes_companion' ),
	                'description'   => esc_html__( 'Show/Hide option for service title.', 'beastthemes_companion' ),
	                'section'       => 'yuno_service_layout_section',
	                'choices'       => array(
	                    'show'      => esc_html__( 'Show', 'beastthemes_companion' ),
	                    'hide'      => esc_html__( 'Hide', 'beastthemes_companion' )
	                ),
	                'priority'      => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'yuno_service_content_hide',
	        array(
	            'default'           => 'show',
	            'sanitize_callback' => 'yuno_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customize_Switch_Control(
	        $wp_customize,
	            'yuno_service_content_hide',
	            array(
	                'type'          => 'switch',
	                'label'         => esc_html__( 'Service description', 'beastthemes_companion' ),
	                'description'   => esc_html__( 'Show/Hide option for service description.', 'beastthemes_companion' ),
	                'section'       => 'yuno_service_layout_section',
	                'choices'       => array(
	                    'show'      => esc_html__( 'Show', 'beastthemes_companion' ),
	                    'hide'      => esc_html__( 'Hide', 'beastthemes_companion' )
	                ),
	                'priority'      => 5,
	            )
	        )
	    );

	    /**
	     * Radio field for Column
	     * 
	     *  @since 1.0.0
	     */
	    $wp_customize->add_setting( 
	        'yuno_service_col',
	        array(
	            'capability'        => 'edit_theme_options',
	            'default'           => 'col-lg-4',
	            'sanitize_callback' => 'yuno_sanitize_radio_option',
	        ) 
	    );
	    $wp_customize->add_control( 
	        'yuno_service_col',
	        array(
	            'type'        => 'radio',
	            'section'     => 'yuno_service_layout_section',
	            'priority'    => 5,
	            'label'       => esc_html__( 'Service Dispay column', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Select column for displaying services.', 'beastthemes_companion' ),
	            'choices'     => array(
	                'col-lg-4' => esc_html__( '3 Column', 'beastthemes_companion' ),
	                'col-lg-3' => esc_html__( '4 Column', 'beastthemes_companion' ),
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
	        'yuno_style_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new yuno_Customizer_Heading(
	        $wp_customize,
	            'yuno_style_tags_heading',
	            array(
	                'label'    => esc_html__( 'Style', 'beastthemes_companion' ),
	                'section'  => 'yuno_service_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /**
	     * Radio field for service style
	     * 
	     *  @since 1.0.0
	     */
	    $wp_customize->add_setting( 
	        'yuno_service_style',
	        array(
	            'capability'        => 'edit_theme_options',
	            'default'           => 'light',
	            'sanitize_callback' => 'yuno_sanitize_radio_option',
	        ) 
	    );
	    $wp_customize->add_control( 
	        'yuno_service_style',
	        array(
	            'type'        => 'radio',
	            'section'     => 'yuno_service_layout_section',
	            'priority'    => 5,
	            'label'       => esc_html__( 'Service style', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Choose style for services.', 'beastthemes_companion' ),
	            'choices'     => array(
	                'light' => esc_html__( 'Light', 'beastthemes_companion' ),
	                'dark'  => esc_html__( 'Dark', 'beastthemes_companion' ),
	            ),
	        )
	    );

	    /**
	     * Color option service section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_service_bg_color',
	        array(
	            'default'           => '#faf2f5',
	            'sanitize_callback' => 'sanitize_hex_color',
	        )
	    ); 
	    $wp_customize->add_control( new WP_Customize_Color_Control(
	            $wp_customize,
	            'yuno_service_bg_color',
	            array(
	                'label'    => esc_html__( 'Background color', 'beastthemes_companion' ),
	                'section'  => 'yuno_service_layout_section',
	                'priority' => 5
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'yuno_service_icon_size',
	        array(
	            'default'           => 40,
	            'transport'         => 'postMessage',
	            'sanitize_callback' => 'sanitize_text_field'
	            )
	    );
	    $wp_customize->add_control(
	        'yuno_service_icon_size',
	        array(
	            'type'        => 'number',
	            'label'       => esc_html__( 'Service icon size ( in px )', 'beastthemes_companion' ),
	            'description' => esc_html__( 'set size for service icons to display.', 'beastthemes_companion' ),
	            'section'     => 'yuno_service_layout_section',
	            'priority'    => 5
	        )
	    );

	}

}