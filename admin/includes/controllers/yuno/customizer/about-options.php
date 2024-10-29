<?php
defined('ABSPATH') or die();

/**
 * Customizer options for about section
 */
class BeastThemesCompanionAboutYuno {
	public static function about_customizer( $wp_customize ) {

        /**
         * About Options
         *
         * @since 1.0.0
         */
        $wp_customize->add_section(
            'yuno_about_layout_section',
            array(
                'title'       => esc_html__( 'About Section', 'beastthemes_companion' ),
                'description' => esc_html__( 'Manage about section from here.', 'beastthemes_companion' ),
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
            'yuno_about_heading',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses',
                )
        );
        $wp_customize->add_control( new yuno_Customizer_Heading(
            $wp_customize,
                'yuno_about_heading',
                array(
                    'label'    => esc_html__( 'Content', 'beastthemes_companion' ),
                    'section'  => 'yuno_about_layout_section',
                    'priority' => 5,
                )
            )
        );

        /**
         * About title input box
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_about_title',
            array(
                'default'           => esc_html__( 'About Our', 'beastthemes_companion' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_about_title',
            array(
                'type'     => 'text',
                'label'    => esc_html__( 'About Title', 'beastthemes_companion' ),
                'section'  => 'yuno_about_layout_section',
                'priority' => 5
            )
        );

        /**
         * About subtitle input box
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_about_subtitle',
            array(
                'default'           => esc_html__( 'A Better Website Means Better Experience', 'beastthemes_companion' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_about_subtitle',
            array(
                'type'     => 'text',
                'label'    => esc_html__( 'About Subtitle', 'beastthemes_companion' ),
                'section'  => 'yuno_about_layout_section',
                'priority' => 5
            )
        );

        /**
         * About description input box
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_about_desc',
            array(
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_about_desc',
            array(
                'type'     => 'textarea',
                'label'    => esc_html__( 'About Description', 'beastthemes_companion' ),
                'section'  => 'yuno_about_layout_section',
                'priority' => 5
            )
        );

        /**
         * About section button text
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_about_btn_text',
            array(
                'default'           => esc_html__( 'Read More', 'beastthemes_companion' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_about_btn_text',
            array(
                'type'     => 'text',
                'label'    => esc_html__( 'Readmore button text', 'beastthemes_companion' ),
                'section'  => 'yuno_about_layout_section',
                'priority' => 5
            )
        );

        /**
         * About section button link
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_about_btn_link',
            array(
                'default'           => esc_html__( '#', 'beastthemes_companion' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_about_btn_link',
            array(
                'type'     => 'text',
                'label'    => esc_html__( 'Readmore button link', 'beastthemes_companion' ),
                'section'  => 'yuno_about_layout_section',
                'priority' => 5
            )
        );

        $wp_customize->add_setting(
            'yuno_about_img_bg',
            array(
                'default'   => '',
                'transport' => 'postMessage',
            )
        );

        $wp_customize->add_control(
           new WP_Customize_Image_Control(
               $wp_customize,
               'yuno_about_img_bg',
               array(
                   'label'    => esc_html__( 'Upload a image for about section', 'beastthemes_companion' ),
                   'section'  => 'yuno_about_layout_section',
                   'settings' => 'yuno_about_img_bg',
               )
           )
        );

    }
}