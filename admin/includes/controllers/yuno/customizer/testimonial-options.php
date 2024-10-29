<?php
defined('ABSPATH') or die();

/**
 * Customizer options for testimonial section
 */
class BeastThemesCompanionTestimonialYuno {
	public static function testi_customizer( $wp_customize ) {

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Testimonial Section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_section(
	        'yuno_testi_layout_section',
	        array(
	            'title'       => esc_html__( 'Testimonial Section', 'beastthemes_companion' ),
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
	        'yuno_content_testi_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new yuno_Customizer_Heading(
	        $wp_customize,
	            'yuno_content_testi_heading',
	            array(
	                'label'    => esc_html__( 'Content', 'beastthemes_companion' ),
	                'section'  => 'yuno_testi_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /**
	     * Testimonial title input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_testi_title',
	        array(
	            'default'           => esc_html__( 'Our Testimonioal', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'yuno_testi_title',
	        array(
	            'type'     => 'text',
	            'label'    => esc_html__( 'Testimonial Title', 'beastthemes_companion' ),
	            'section'  => 'yuno_testi_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
	     * Testimonial subtitle input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_testi_subtitle',
	        array(
	            'default'           => esc_html__( 'A Better Website Means Better Experience', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'yuno_testi_subtitle',
	        array(
	            'type'     => 'text',
	            'label'    => esc_html__( 'Testimonial Subtitle', 'beastthemes_companion' ),
	            'section'  => 'yuno_testi_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
	     * Testimonial description input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_testi_desc',
	        array(
	            'default'           => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'yuno_testi_desc',
	        array(
	            'type'     => 'textarea',
	            'label'    => esc_html__( 'Testimonial Description', 'beastthemes_companion' ),
	            'section'  => 'yuno_testi_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
	     * Radio field for Column
	     * 
	     *  @since 1.0.0
	     */
	    $wp_customize->add_setting( 
	        'yuno_testi_col',
	        array(
	            'capability'        => 'edit_theme_options',
	            'default'           => '3',
	            'sanitize_callback' => 'yuno_sanitize_radio_option',
	        ) 
	    );
	    $wp_customize->add_control( 
	        'yuno_testi_col',
	        array(
	            'type'        => 'radio',
	            'section'     => 'yuno_testi_layout_section',
	            'priority'    => 5,
	            'label'       => esc_html__( 'Testimonial Dispay column', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Select column for displaying Testimonials.', 'beastthemes_companion' ),
	            'choices'     => array(
	                '2' => esc_html__( '2 Column', 'beastthemes_companion' ),
	                '3' => esc_html__( '3 Column', 'beastthemes_companion' ),
	                '4' => esc_html__( '4 Column', 'beastthemes_companion' ),
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
	        'yuno_testi_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new yuno_Customizer_Heading(
	        $wp_customize,
	            'yuno_testi_tags_heading',
	            array(
	                'label'    => esc_html__( 'Testimonials', 'beastthemes_companion' ),
	                'section'  => 'yuno_testi_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting( 
	        'yuno_testi_items', 
	        array(
	            'sanitize_callback' => 'yuno_sanitize_repeater',
	            'default' 			=> json_encode(array(
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
	            ))
	        )
	    );
	    $wp_customize->add_control( new beastthemes_companion_Repeater_Controler(
	        $wp_customize, 
	            'yuno_testi_items', 
	            array(
	                'label'   				 => '',
	                'section'  				 => 'yuno_testi_layout_section',
	                'settings' 				 => 'yuno_testi_items',
	                'priority' 				 => 5,
	                'rdcode_box_label'       => esc_html__( 'Testimonial','beastthemes_companion' ),
	                'rdcode_box_add_control' => esc_html__( 'Add Testimonial','beastthemes_companion' )
	            ),
	            array(
	            	'testi_image'     => array(
	                    'type'        => 'image',
	                    'label'       => esc_html__( 'Client Image', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Select image for this Client.', 'beastthemes_companion' )
	                ),
	                'testi_name'  => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Client Name', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter client\'s name.', 'beastthemes_companion' )
	                ),
	                'testi_desig' => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Client Designation', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter client\'s designation.', 'beastthemes_companion' )
	                ),
	                'testi_mgs'   => array(
	                    'type'        => 'textarea',
	                    'label'       => esc_html__( 'Client Message', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter client\'s message.', 'beastthemes_companion' )
	                ),
	                'testi_rating'   => array(
	                    'type'        => 'number',
	                    'label'       => esc_html__( 'Review Ratings', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter rating number between 0 to 5 only.', 'beastthemes_companion' )
	                ),
	            )
	        ) 
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/
	}
}