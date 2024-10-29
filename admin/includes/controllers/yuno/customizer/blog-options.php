<?php
defined('ABSPATH') or die();

/**
 * Customizer options for service section
 */
class BeastThemesCompanionBlogYuno {
	public static function blog_customizer( $wp_customize ) {

        /**
         * Blog Options
         *
         * @since 1.0.0
         */
        $wp_customize->add_section(
            'yuno_blog_layout_section',
            array(
                'title'       => esc_html__( 'Blog Section', 'beastthemes_companion' ),
                'description' => esc_html__( 'Manage blog section from here.', 'beastthemes_companion' ),
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
            'yuno_blog_tags_heading',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses',
                )
        );
        $wp_customize->add_control( new yuno_Customizer_Heading(
            $wp_customize,
                'yuno_blog_tags_heading',
                array(
                    'label'    => esc_html__( 'Content', 'beastthemes_companion' ),
                    'section'  => 'yuno_blog_layout_section',
                    'priority' => 5,
                )
            )
        );

        /**
         * Blog title input box
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_blog_title',
            array(
                'default'           => esc_html__( 'Our Blogs', 'beastthemes_companion' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_blog_title',
            array(
                'type'     => 'text',
                'label'    => esc_html__( 'Blog Title', 'beastthemes_companion' ),
                'section'  => 'yuno_blog_layout_section',
                'priority' => 5
            )
        );

        /**
         * Blog subtitle input box
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_blog_subtitle',
            array(
                'default'           => esc_html__( 'A Better Website Means Better Experience', 'beastthemes_companion' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_blog_subtitle',
            array(
                'type'     => 'text',
                'label'    => esc_html__( 'Blog Subtitle', 'beastthemes_companion' ),
                'section'  => 'yuno_blog_layout_section',
                'priority' => 5
            )
        );

        /**
         * Blog description input box
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'yuno_blog_desc',
            array(
                'default'           => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', 'beastthemes_companion' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'yuno_blog_desc',
            array(
                'type'     => 'textarea',
                'label'    => esc_html__( 'Blog Description', 'beastthemes_companion' ),
                'section'  => 'yuno_blog_layout_section',
                'priority' => 5
            )
        );

        /**
         * Radio field for Column
         * 
         *  @since 1.0.0
         */
        $wp_customize->add_setting( 
            'yuno_blog_col',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '3',
                'sanitize_callback' => 'yuno_sanitize_radio_option',
            ) 
        );
        $wp_customize->add_control( 
            'yuno_blog_col',
            array(
                'type'        => 'radio',
                'section'     => 'yuno_blog_layout_section',
                'priority'    => 5,
                'label'       => esc_html__( 'Blog Dispay column', 'beastthemes_companion' ),
                'description' => esc_html__( 'Select column for displaying Blogs.', 'beastthemes_companion' ),
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
            'yuno_visibility_blog_heading',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses',
                )
        );
        $wp_customize->add_control( new yuno_Customizer_Heading(
            $wp_customize,
                'yuno_visibility_blog_heading',
                array(
                    'label'    => esc_html__( 'Visibility', 'beastthemes_companion' ),
                    'section'  => 'yuno_blog_layout_section',
                    'priority' => 5,
                )
            )
        );

        $wp_customize->add_setting(
            'yuno_no_of_blogs',
            array(
                'default'           => 3,
                'sanitize_callback' => 'sanitize_text_field'
                )
        );
        $wp_customize->add_control(
            'yuno_no_of_blogs',
            array(
                'type'        => 'number',
                'label'       => esc_html__( 'No of blogs', 'beastthemes_companion' ),
                'description' => esc_html__( 'set no of blogs to display.', 'beastthemes_companion' ),
                'section'     => 'yuno_blog_layout_section',
                'priority'    => 5
            )
        );

        $wp_customize->add_setting(
            'yuno_blog_excerpt_hide',
            array(
                'default'           => 'show',
                'sanitize_callback' => 'yuno_sanitize_switch_option',
                )
        );
        $wp_customize->add_control( new beastthemes_Customize_Switch_Control(
            $wp_customize,
                'yuno_blog_excerpt_hide',
                array(
                    'type'          => 'switch',
                    'label'         => esc_html__( 'Blog Excerpt', 'beastthemes_companion' ),
                    'description'   => esc_html__( 'Show/Hide blog content/text.', 'beastthemes_companion' ),
                    'section'       => 'yuno_blog_layout_section',
                    'choices'       => array(
                        'show'      => esc_html__( 'Show', 'beastthemes_companion' ),
                        'hide'      => esc_html__( 'Hide', 'beastthemes_companion' )
                    ),
                    'priority'      => 5,
                )
            )
        );

        $wp_customize->add_setting(
            'yuno_blog_readmore_hide',
            array(
                'default'           => 'show',
                'sanitize_callback' => 'yuno_sanitize_switch_option',
                )
        );
        $wp_customize->add_control( new beastthemes_Customize_Switch_Control(
            $wp_customize,
                'yuno_blog_readmore_hide',
                array(
                    'type'          => 'switch',
                    'label'         => esc_html__( 'Readmore button', 'beastthemes_companion' ),
                    'description'   => esc_html__( 'Show/Hide readmore button.', 'beastthemes_companion' ),
                    'section'       => 'yuno_blog_layout_section',
                    'choices'       => array(
                        'show'      => esc_html__( 'Show', 'beastthemes_companion' ),
                        'hide'      => esc_html__( 'Hide', 'beastthemes_companion' )
                    ),
                    'priority'      => 5,
                )
            )
        );

        /* Add Settings */
        $wp_customize->add_setting(
            'beastthemes_companion_share[services]', /* option name */
            array(
                'default'           => beastthemes_companion_share_services_default(), // facebook:1,twitter:1,google_plus:1
                'sanitize_callback' => 'beastthemes_companion_share_sanitize_services',
                'transport'         => 'refresh',
                'type'              => 'option',
                'capability'        => 'manage_options',
            )
        );

        /* Add Control for the settings. */
        $choices  = array();
        $services = beastthemes_companion_share_services();
        foreach( $services as $key => $val ){
            $choices[$key] = $val['label'];
        }
        $wp_customize->add_control(
            new beastthemes_companion_Control_Sortable_Checkboxes(
                $wp_customize,
                'beastthemes_companion_share_services', /* control id */
                array(
                    'section'     => 'yuno_blog_layout_section',
                    'settings'    => 'beastthemes_companion_share[services]',
                    'label'       => esc_html__( 'Post Sharing Buttons', 'beastthemes_companion-share' ),
                    'description' => esc_html__( 'Enable and reorder sharing buttons.', 'beastthemes_companion-share' ),
                    'choices'     => $choices,
                )
            )
        );

    }
}