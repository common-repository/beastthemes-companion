<?php
defined('ABSPATH') or die();

/**
 * Customizer options for client section
 */
class BeastThemesCompanionLayoutDcode {
	public static function layout_customizer( $wp_customize ) {

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Home Layout Options
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_section(
	        'rdcode_homel_layout_section',
	        array(
	            'title'       => esc_html__( 'Home Layout Options', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Manage Homepage sections order from here.', 'beastthemes_companion' ),
	            'priority'    => 60,
	            'panel'       => 'rdcode_homepage_settings_panel',
	        )
	    );
	    
	    // /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Heding
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_content_home_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_content_home_heading',
	            array(
	                'label'    => esc_html__( 'Homepage Layout', 'beastthemes_companion' ),
	                'section'  => 'rdcode_homel_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    // /*-----------------------------------------------------------------------------------------------------------------------*/

	    // Test of Pill Checkbox Custom Control
		$wp_customize->add_setting( 'home_dcode_section_order',
			array(
				'default'           => beastthemes_companion_dcode_order_default(),
				'sanitize_callback' => 'beastthemes_companion_share_sanitize_dcode_sections',
				'transport'         => 'refresh',
				'capability'        => 'manage_options',
			)
		);
		/* Add Control for the settings. */
		$choices  = array();
		$sections = beastthemes_companion_dcode_sections();
		foreach( $sections as $key => $val ) {
			$choices[$key] = $val['label'];
		}
		$wp_customize->add_control(
			new beastthemes_companion_Control_Sortable_Checkboxes(
				$wp_customize,
				'home_dcode_section_order', /* control id */
				array(
					'section'     => 'rdcode_homel_layout_section',
					'settings'    => 'home_dcode_section_order',
					'description' => esc_html__( 'Enable and reorder Home Sections.', 'beastthemes_companion' ),
					'choices'     => $choices,
				)
			)
		);

	}
}