<?php
defined('ABSPATH') or die();

/* === Add share buttons in excerpt and content === */
if( apply_filters( 'beastthemes_companion_share_display', true ) ){
    add_filter( 'the_excerpt', 'beastthemes_companion_share_filter_excerpt', 99 );
    add_filter( 'the_content', 'beastthemes_companion_share_filter_content', 99 );
}

/**
 * Add sharing button by filtering content on singular pages.
 */
function beastthemes_companion_share_filter_excerpt( $excerpt ) {

    /* Check settings. */
    $data    = get_option( 'beastthemes_companion_share' );
    $options = array();
    if( isset( $data['options'] ) || ! empty( $data['options'] ) ){
        $options = explode( ',', $data['options'] );
    };

    /* filter excerpt. */
    $current_post_type = get_post_type();
    if( !is_singular() && in_array( 'index', $options ) && is_main_query() && 'attachment' != $current_post_type ){
        $excerpt .= beastthemes_companion_share();
    }
    return $excerpt;
}

/**
 * Add sharing button by filtering content on singular pages.
 */
function beastthemes_companion_share_filter_content( $content ) {

    /* Check settings. */
    $data    = get_option( 'beastthemes_companion_share' );
    $options = array();
    if( isset( $data['options'] ) || ! empty( $data['options'] ) ){
        $options = explode( ',', $data['options'] );
    };
    $display = in_array( 'index', $options ) ? true : is_singular();

    /* Filter content. */
    if( $display && is_main_query() ){
        $content .= beastthemes_companion_share();
    }
    return $content;
}



/** -----Functions----- **/
/**
 * Get Shareable Post Types
 * @return array
 */
function beastthemes_companion_share_post_types(){

    /* Post Types */
    $post_types = array();

    /* Get All Public Post Types */
    $supported_post_types = apply_filters( 'beastthemes_companion_share_post_types', get_post_types( array( 'public' => true ) ) ) ;

    /* Get label */
    foreach( $supported_post_types as $post_type ){
        $post_type_obj          = get_post_type_object( $post_type );
        $post_types[$post_type] = $post_type_obj->labels->name;
    }

    return $post_types;
}


/**
 * Services
 * list of available sharing services
 */
function beastthemes_companion_share_services(){

    $services = array();

    /* facebook */
    $services['facebook'] = array(
        'id'       => 'facebook',
        'label'    => esc_html__( 'Facebook', 'beastthemes_companion' ),
        'callback' => 'beastthemes_companion_share_facebook',
    );

    /* twitter */
    $services['twitter'] = array(
        'id'       => 'twitter',
        'label'    => esc_html__( 'Twitter', 'beastthemes_companion' ),
        'callback' => 'beastthemes_companion_share_twitter',
    );

    /* google+ */
    $services['google_plus'] = array(
        'id'       => 'google_plus',
        'label'    => esc_html__( 'Google+', 'beastthemes_companion' ),
        'callback' => 'beastthemes_companion_share_google_plus',
    );

    return apply_filters( 'beastthemes_companion_share_services', $services );
}

function beastthemes_companion_yuno_sections(){

    $sections = array();

    /* about */
    $sections['about'] = array(
        'id'       => 'about',
        'label'    => esc_html__( 'About Us', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['service'] = array(
        'id'       => 'service',
        'label'    => esc_html__( 'Service', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['testimonial'] = array(
        'id'       => 'testimonial',
        'label'    => esc_html__( 'Testimonial', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['team'] = array(
        'id'       => 'team',
        'label'    => esc_html__( 'Team', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['blog'] = array(
        'id'       => 'blog',
        'label'    => esc_html__( 'Blog', 'beastthemes_companion' ),
        'callback' => '',
    );

    return apply_filters( 'beastthemes_companion_yuno_sections', $sections );
}

function beastthemes_companion_dcode_sections(){

    $sections = array();

    $sections['service'] = array(
        'id'       => 'service',
        'label'    => esc_html__( 'Service', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['testimonial'] = array(
        'id'       => 'testimonial',
        'label'    => esc_html__( 'Testimonial', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['team'] = array(
        'id'       => 'team',
        'label'    => esc_html__( 'Team', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['client'] = array(
        'id'       => 'client',
        'label'    => esc_html__( 'Client', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['blog'] = array(
        'id'       => 'blog',
        'label'    => esc_html__( 'Blog', 'beastthemes_companion' ),
        'callback' => '',
    );

    return apply_filters( 'beastthemes_companion_dcode_sections', $sections );
}


/**
 * Utility: Default Services to use in customizer default value
 * @return string
 */
function beastthemes_companion_share_services_default(){
    $default  = array();
    $services = beastthemes_companion_share_services();
    foreach( $services as $service ){
        $default[] = $service['id'] . ':1'; /* activate all as default. */
    }
    return apply_filters( 'beastthemes_companion_share_services_default', implode( ',', $default ) );
}

function beastthemes_companion_yuno_order_default(){
    $default  = array();
    $sections = array();

    /* about */
    $sections['about'] = array(
        'id'       => 'about',
        'label'    => esc_html__( 'About Us', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['service'] = array(
        'id'       => 'service',
        'label'    => esc_html__( 'Service', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['testimonial'] = array(
        'id'       => 'testimonial',
        'label'    => esc_html__( 'Testimonial', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['team'] = array(
        'id'       => 'team',
        'label'    => esc_html__( 'Team', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['blog'] = array(
        'id'       => 'blog',
        'label'    => esc_html__( 'Blog', 'beastthemes_companion' ),
        'callback' => '',
    );

    foreach( $sections as $section ){
        $default[] = $section['id'] . ':1'; /* activate all as default. */
    }
    return apply_filters( 'beastthemes_companion_yuno_order_default', implode( ',', $default ) );
}

function beastthemes_companion_dcode_order_default(){
    $default  = array();
    $sections = array();

    $sections['service'] = array(
        'id'       => 'service',
        'label'    => esc_html__( 'Service', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['testimonial'] = array(
        'id'       => 'testimonial',
        'label'    => esc_html__( 'Testimonial', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['team'] = array(
        'id'       => 'team',
        'label'    => esc_html__( 'Team', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['client'] = array(
        'id'       => 'client',
        'label'    => esc_html__( 'Client', 'beastthemes_companion' ),
        'callback' => '',
    );

    $sections['blog'] = array(
        'id'       => 'blog',
        'label'    => esc_html__( 'Blog', 'beastthemes_companion' ),
        'callback' => '',
    );

    foreach( $sections as $section ){
        $default[] = $section['id'] . ':1'; /* activate all as default. */
    }
    return apply_filters( 'beastthemes_companion_dcode_order_default', implode( ',', $default ) );
}


/**
 * Share Template Tags
 * the final function with the conditional.
 */
function beastthemes_companion_share(){

    /* Get the options */
    $option = get_option( 'beastthemes_companion_share' );

    /* Check Services */
    $services = beastthemes_companion_share_services_default();
    if( isset( $option['services'] ) ){
        $services = $option['services'];
    }
    if( ! $services ) return;

    /* Check Post Status */
    $current_post_status = get_post_status( get_the_ID() );
    if ( 'private' === $current_post_status ) return;

    /* Check Post Types */
    $current_post_type = get_post_type();
    $post_types = 'post';
    if( isset( $option['post_types'] ) ){
        $post_types = $option['post_types'];
    }
    $post_types = explode( ',', $post_types );
    if( ! $post_types || ! in_array( $current_post_type, $post_types ) ) return;

    /* render button */
    return apply_filters( 'beastthemes_companion_share', beastthemes_companion_share_get_buttons( $services ) );
}


/**
 * Echo Share buttons HTML based on Options
 * @param $options string formatted active services
 */
function beastthemes_companion_share_buttons( $options ){
    echo beastthemes_companion_share_get_buttons( $options );
}


/**
 * Return Share buttons HTML based on Options
 * @param $options string formatted active services
 */
function beastthemes_companion_share_get_buttons( $options ){

    /* bail if empty. */
    if( ! $options ) return;

    /* available services */
    $services = beastthemes_companion_share_services();

    /* var. */
    $buttons = array();

    /* make array */
    $options = explode( ',', $options );

    /* loop load */
    foreach( $options as $option ){
        $option = explode( ':', $option );
        if( isset( $option[0] ) && isset( $option[1] ) && array_key_exists( $option[0], $services ) && '1' == $option[1] ){
            $buttons[] = $option[0];
        }
    }

    /* bail if not found. */
    if( ! $buttons ) return;
    ob_start();
?>
    <div class="beastthemes_companion-share">
        <ul>
            <li><strong><?php esc_html_e( 'Share:  ', 'beastthemes_companion' ); ?>&nbsp;</strong></li>
            <?php foreach( $buttons as $button ) {
                $fn_callback = $services[$button]['callback'];
            ?>
                <?php if ( function_exists( $fn_callback ) ){ ?>
                <li class="beastthemes_companion-share-<?php echo sanitize_html_class( $button );?>">
                    <?php call_user_func( $fn_callback ); ?>
                </li>
                <?php } // check callback ?>
            <?php } // end foreach ?>
        </ul>
    </div><!-- .beastthemes_companion-share -->
<?php
    return ob_get_clean();
}


/**
 * Facebook Share HTML
 */
function beastthemes_companion_share_facebook(){
    $base_url = 'https://www.facebook.com/sharer.php';
    $args = array(
        'u' => esc_url( get_permalink() ),
        't' => urlencode( the_title_attribute( 'echo=0' ) ),
    );
    $url = add_query_arg( $args, $base_url );
?>
<a class="beastthemes_companion-share-button beastthemes_companion-share-button-facebook" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="nofollow external"><span class="beastthemes_companion-share-text"><?php _e( 'Facebook', 'beastthemes_companion' ); ?></span></a>
<?php
}


/**
 * Twitter Share HTML
 */
function beastthemes_companion_share_twitter(){
    $base_url = 'https://twitter.com/intent/tweet';
    $args = array(
        'url'  => esc_url( get_permalink() ),
        'text' => urlencode( the_title_attribute( 'echo=0' ) ),
    );

    $options = get_option( 'beastthemes_companion_share' );
    if( isset( $options['twitter_username'] ) ){
        $username = beastthemes_companion_share_sanitize_twitter_username( $options['twitter_username'] );
        if( !empty( $username ) ){
            $args['via'] = urlencode( $options['twitter_username'] );
        }
    }

    $url = add_query_arg( $args, $base_url );
?>
<a class="beastthemes_companion-share-button beastthemes_companion-share-button-twitter" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="nofollow external"><span class="beastthemes_companion-share-text"><?php _e( 'Twitter', 'beastthemes_companion' ); ?></span></a>
<?php
}


/**
 * Google+ Share HTML
 */
function beastthemes_companion_share_google_plus(){
    $base_url = 'https://plus.google.com/share';
    $args     = array(
        'url' => esc_url( get_permalink() ),
    );
    $url = add_query_arg( $args, $base_url );
?>
<a class="beastthemes_companion-share-button beastthemes_companion-share-button-google_plus" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="nofollow external"><span class="beastthemes_companion-share-text"><?php _e( 'Google+', 'beastthemes_companion' ); ?></span></a>
<?php
}