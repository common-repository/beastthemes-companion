<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_service_html {
    public static function beastthemes_companion_service_section() {

        $service_title        = get_theme_mod( 'yuno_service_title' );
        $service_subtitle     = get_theme_mod( 'yuno_service_subtitle' );
        $service_desc         = get_theme_mod( 'yuno_service_desc' );
        $service_icon_hide    = get_theme_mod( 'yuno_service_icon_hide' );
        $service_title_hide   = get_theme_mod( 'yuno_service_title_hide' );
        $service_content_hide = get_theme_mod( 'yuno_service_content_hide' );
        $yuno_service_col     = get_theme_mod( 'yuno_service_col', 'col-lg-4' );
        $yuno_service_style   = get_theme_mod( 'yuno_service_style', 'light' );

       ?>
       <!---Services-Section-->
       <section class="service-section bg-gray">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#162238" d="M39.3,-69.6C52.1,-60.6,64.5,-52.5,72.6,-41.1C80.8,-29.6,84.6,-14.8,82.1,-1.4C79.7,12,70.9,23.9,60.5,31.5C50.2,39.1,38.3,42.4,27.9,46C17.6,49.6,8.8,53.6,-2.1,57.2C-13,60.9,-26,64.3,-39.8,62.6C-53.6,61,-68.1,54.3,-71.8,43.1C-75.6,31.8,-68.6,15.9,-61.5,4.1C-54.4,-7.7,-47.1,-15.4,-45,-29.4C-42.9,-43.5,-45.8,-63.9,-39.1,-76.5C-32.5,-89,-16.2,-93.7,-1.5,-91.1C13.2,-88.5,26.4,-78.6,39.3,-69.6Z" transform="translate(100 100)" />
              </svg>
            <div class="container">
                <?php if ( ! empty ( $service_title ) || ! empty ( $service_subtitle ) || ! empty ( $service_desc ) ) { ?>
                <div class="section-title text-center">
                    <?php if ( ! empty ( $service_title ) ) { ?>
                    <h5><?php echo esc_html( $service_title ); ?></h5>
                    <?php } if ( ! empty ( $service_subtitle ) ) { ?>
                    <h2><?php echo esc_html( $service_subtitle ); ?></h2>
                    <?php } if ( ! empty ( $service_desc ) ) { ?>
                    <p><?php echo esc_html( $service_desc ); ?></p>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="row <?php echo esc_attr( $yuno_service_style ); ?>">
                    <?php 
                       if ( ! empty ( get_theme_mod( 'yuno_services_items' ) ) ) {
                          $service_items = json_decode( get_theme_mod( 'yuno_services_items' ) );
                          $count         = 1;
                          foreach ( $service_items as $key => $value ) {
                            $array = array();
                            foreach($value as $key){
                                array_push( $array, $key );
                            }
                    ?>
                    <div class="<?php echo esc_attr( $yuno_service_col ); ?> col-md-6">
                        <figure class="service-box <?php if ( $count == 3 ) { echo esc_attr( 'active' ); } ?> your-element" data-tilt data-tilt-max="20" data-tilt-speed="1500" data-tilt-perspective="1800">
                            <?php if ( ! empty ( $array[0] ) && ! empty ( $service_icon_hide ) && $service_icon_hide == 'show' ) { ?>
                            <div class="service-icon">
                                <i class="<?php echo esc_attr( $array[0] ); ?>">  </i>
                            </div>
                            <?php } ?>
                            <figcaption>
                                <?php if ( ! empty ( $array[1] ) && ! empty ( $service_title_hide ) && $service_title_hide == 'show' ) { ?>
                                <h4 class="service-title">
                                    <a href="<?php $url = ( ! empty ( $array[4] ) ) ? esc_url_raw( $array[4] ) : esc_attr( '#' );  echo $url; ?>"> <?php echo esc_html( $array[1] ); ?></a>
                                </h4>
                                <?php } if ( ! empty ( $array[2] ) && ! empty ( $service_content_hide ) && $service_content_hide == 'show' ) { ?>
                                <p class="service-dec"><?php echo esc_html( $array[2] ); ?></p>
                                <?php } if ( ! empty ( $array[3] ) ) { ?>
                                <a href="<?php $url = ( ! empty ( $array[4] ) ) ? esc_url_raw( $array[4] ) : esc_attr( '#' );  echo $url; ?>" <?php if ( isset( $array[5] ) && $array[5] == 'yes' ) { echo esc_attr( 'target=_blank' ); } ?> class="btn btn-theme btn-md"><?php echo esc_html( $array[3] ); ?><i class="fas fa-long-arrow-alt-right"></i> </a>
                                <?php } ?>
                            </figcaption>
                        </figure>
                    </div>
                    <?php $count++;
                      }
                   }
                ?>
                </div>
            </div>
        </section>
      <!---End-Services-Section-->
  <?php 
  }
}

/**
 * Service section.
 *
 */
if( ! function_exists( 'beastthemes_home_service' ) ) :

  /**
   * Service HTML
   *
   * @since 1.0.0
   */
  function beastthemes_home_service() {
    /* Executes the action for service section hook named 'beastthemes_companion_service' */
    do_action( 'beastthemes_companion_service');
  }

endif;
add_action( 'yuno_service_sec', 'beastthemes_home_service', 10 );
?>