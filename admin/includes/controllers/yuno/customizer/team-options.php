<?php
defined('ABSPATH') or die();

/**
 * Customizer options for team section
 */
class BeastThemesCompanionTeamYuno {
	public static function team_customizer( $wp_customize ) {

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Team Options
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_section(
	        'yuno_team_layout_section',
	        array(
	            'title'       => esc_html__( 'Team Section', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Manage team section from here.', 'beastthemes_companion' ),
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
	                'section'  => 'yuno_team_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /**
	     * Team title input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_team_title',
	        array(
	            'default'           => esc_html__( 'Meet our team', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'yuno_team_title',
	        array(
	            'type'     => 'text',
	            'label'    => esc_html__( 'Team Title', 'beastthemes_companion' ),
	            'section'  => 'yuno_team_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
         * Team subtitle input box
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_team_subtitle',
            array(
                'default'           => esc_html__( 'Our Creative Leaders', 'beastthemes_companion' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_team_subtitle',
            array(
                'type'     => 'text',
                'label'    => esc_html__( 'About Subtitle', 'beastthemes_companion' ),
                'section'  => 'yuno_team_layout_section',
                'priority' => 5
            )
        );

	    /**
	     * Team description input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'yuno_team_desc',
	        array(
	            'default'           => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'yuno_team_desc',
	        array(
	            'type'     => 'textarea',
	            'label'    => esc_html__( 'Team Description', 'dcode' ),
	            'section'  => 'yuno_team_layout_section',
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
	        'yuno_teams_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new yuno_Customizer_Heading(
	        $wp_customize,
	            'yuno_teams_tags_heading',
	            array(
	                'label'    => esc_html__( 'Team Members', 'beastthemes_companion' ),
	                'section'  => 'yuno_team_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting( 
	        'yuno_teams_items', 
	        array(
	            'sanitize_callback' => 'yuno_sanitize_repeater',
	            'default'           => json_encode(array(
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
	            ))
	        )
	    );

	    $wp_customize->add_control( new beastthemes_companion_Repeater_Controler(
	        $wp_customize, 
	            'yuno_teams_items', 
	            array(
	                'label'    				 => '',
	                'section'  				 => 'yuno_team_layout_section',
	                'settings' 				 => 'yuno_teams_items',
	                'priority' 				 => 5,
	                'rdcode_box_label'       => esc_html__( 'Members','beastthemes_companion' ),
	                'rdcode_box_add_control' => esc_html__( 'Add Member','beastthemes_companion' )
	            ),
	            array(
	            	'member_image'   => array(
	                    'type'        => 'image',
	                    'label'       => esc_html__( 'Member Image', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Select image for this Memeber.', 'beastthemes_companion' )
	                ),
	                'member_name'    => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Name', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter Member name.', 'beastthemes_companion' )
	                ),
	                'member_desig'   => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Designation', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter Member designation.', 'beastthemes_companion' )
	                ),
	                'm_facebook_url' => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Facebook', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter facebook profile URL.', 'beastthemes_companion' )
	                ),
	                'm_insta_url'    => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Instagram', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter instagram profile URL.', 'beastthemes_companion' )
	                ),
	                'm_google_url'   => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Google Plus', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter google plus profile URL.', 'beastthemes_companion' )
	                ),
	                'm_twitter_url'  => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Twitter', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter twitter profile URL.', 'beastthemes_companion' )
	                ),
	            )
	        ) 
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/

	}
}