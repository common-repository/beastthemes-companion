<?php
defined('ABSPATH') or die();

/**
 * Customizer options for service section
 */
class BeastThemesCompanionHomeYuno {
	public static function home_customizer( $wp_customize ) {

        /**
         * Blog Options
         *
         * @since 1.0.0
         */
        $wp_customize->add_section(
            'yuno_home_layout_section',
            array(
                'title'       => esc_html__( 'Home Customizer', 'beastthemes_companion' ),
                'description' => esc_html__( 'Manage Frontpage section from here ( Sortable )', 'beastthemes_companion' ),
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
	        'yuno_content_tags_headingg',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new yuno_Customizer_Heading(
	        $wp_customize,
	            'yuno_content_tags_headingg',
	            array(
	                'label'    => esc_html__( 'Home Page Sections', 'beastthemes_companion' ),
	                'section'  => 'yuno_home_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    // Test of Pill Checkbox Custom Control
		$wp_customize->add_setting( 'home_page_section_order',
			array(
				'default'           => beastthemes_companion_yuno_order_default(),
				'sanitize_callback' => 'beastthemes_companion_share_sanitize_yuno_sections',
				'transport'         => 'refresh',
				'capability'        => 'manage_options',
			)
		);
		/* Add Control for the settings. */
		$choices  = array();
		$sections = beastthemes_companion_yuno_sections();
		foreach( $sections as $key => $val ) {
			$choices[$key] = $val['label'];
		}
		$wp_customize->add_control(
			new beastthemes_companion_Control_Sortable_Checkboxes(
				$wp_customize,
				'home_page_section_order', /* control id */
				array(
					'section'     => 'yuno_home_layout_section',
					'settings'    => 'home_page_section_order',
					'description' => esc_html__( 'Enable and reorder Home Sections.', 'beastthemes_companion' ),
					'choices'     => $choices,
				)
			)
		);

    }
}