<?php // Template Name: Homepage

    get_header();

    require_once( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH. 'admin/includes/helpers/helper.php' );
    $current_theme = BeastThemesCompanionHelper::beastthemes_companion_get_theme_name();
    if ( $current_theme == 'Dcode' ) {

        $blog_home = absint( get_theme_mod( 'rdcode_slider_home', 1 ) );
        if ( $blog_home == 1 ) {
            do_action( 'beastthemes_slider_sec' );
        }

        $dcode_home_order = get_theme_mod( 'home_dcode_section_order' );
        $sections         = explode( ',', $dcode_home_order );

        /* loop sections */
        if  ( ! empty ( $sections ) ) {
            foreach( $sections as $section ) {
                $section = explode( ':', $section );
                if ( isset( $section[0] ) && isset( $section[1] ) && '1' == $section[1] ){
                    switch ( $section[0] ) {

                        case 'service': do_action( 'beastthemes_service_sec' );
                        break;

                        case 'testimonial': do_action( 'beastthemes_testimonial_sec' );
                        break;

                        case 'team': do_action( 'beastthemes_team_sec' );
                        break;

                        case 'client': do_action( 'beastthemes_client_sec' );
                        break;

                        case 'blog': do_action( 'rdcode_blog_sec' );
                        break;
                        
                    }
                }
            }
        } else {
            do_action( 'beastthemes_service_sec' );
            do_action( 'beastthemes_testimonial_sec' );
            do_action( 'beastthemes_team_sec' );
            do_action( 'beastthemes_client_sec' );
            do_action( 'rdcode_blog_sec' );
        }
        
    } elseif ( $current_theme == 'Yuno' ) {
        get_template_part( 'breadcrumb' );
        echo "</div>";

        $slider_home = absint( get_theme_mod( 'yuno_slider_home', 1 ) );
        if ( $slider_home == 1 ) {
            do_action( 'yuno_slider_sec' );
        }

        $yuno_home_order = get_theme_mod( 'home_page_section_order' );
        $sections        = explode( ',', $yuno_home_order );

        /* loop sections */
        if  ( ! empty ( $sections ) ) {
            foreach( $sections as $section ) {
                $section = explode( ':', $section );
                if ( isset( $section[0] ) && isset( $section[1] ) && '1' == $section[1] ){
                    switch ( $section[0] ) {

                        case 'about': do_action( 'yuno_about_sec' );
                        break;

                        case 'service': do_action( 'yuno_service_sec' );
                        break;

                        case 'testimonial': do_action( 'yuno_testimonial_sec' );
                        break;

                        case 'team': do_action( 'yuno_team_sec' );
                        break;

                        case 'blog': do_action( 'yuno_blog_sec' );
                        break;
                        
                    }
                }
            }
        } else {
            do_action( 'yuno_about_sec' );
            do_action( 'yuno_service_sec' );
            do_action( 'yuno_testimonial_sec' );
            do_action( 'yuno_team_sec' );
            do_action( 'yuno_blog_sec' );
        }

    }

get_footer();