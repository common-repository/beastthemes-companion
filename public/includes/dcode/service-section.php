<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_service_html {
  public static function beastthemes_companion_service_section() {
      $rdcode_service_col = get_theme_mod( 'rdcode_service_col', 'col-lg-4' );
      ?>
      <!---Services-Section-->
      <section class="services section pb-50 bg-gray">

      <ul class="element-ani">
 				<li class="size_1"></li>
 				<li class="size_2"></li>
 				<li class="size_3"></li>
 				<li class="size_4"></li>
 			</ul>
        <div class="container">
          <div class="section-header heading-div text-center wow flipInX">
              <h2 class="section-title">
                <?php echo esc_html( get_theme_mod( 'rdcode_service_title', 'Best Services' ) ); ?>
              </h2>
            <?php if ( ! empty ( get_theme_mod( 'rdcode_service_desc' ) ) ) { ?>
              <p class="section-dec"><?php echo esc_html( get_theme_mod( 'rdcode_service_desc' ) ); ?></p>
            <?php } ?>
          </div>
          <div class="row">
          
             <?php
               if ( ! empty ( get_theme_mod( 'rdcode_services_items' ) ) ) {

                  $service_items = json_decode( get_theme_mod( 'rdcode_services_items' ) );
                  $service_icon  = get_theme_mod( 'rdcode_service_icon_hide', 'show' );
                  $service_title = get_theme_mod( 'rdcode_service_title_hide', 'show' );
                  $service_desc  = get_theme_mod( 'rdcode_service_content_hide', 'show' );

                  foreach ( $service_items as $key => $value ) {

                    $array = array();
                    foreach($value as $key){
                        array_push( $array, $key );
                    }

                    if ( ! empty ( $array ) ) {
                    ?>
                    <div class="<?php echo esc_attr( $rdcode_service_col ); ?> col-md-6 mb-30">
                     
                        <div class="card hover-shadow shadow wow fadeInUp">
                            <div class="card-body service-box text-center px-4 py-5">
                              <?php if ( ! empty ( $array[0] ) && ! empty ( $service_icon ) && $service_icon == 'show' ) { ?>
                              <div class="service-icon"> 
                                <i class="<?php echo esc_attr( $array[0] ); ?> icon"></i>
                              </div>
                              <?php } if ( ! empty ( $array[1] ) && ! empty ( $service_title ) && $service_title == 'show' ) { ?>
                              <h4 class="service-title">  
                                <a href="<?php $url = ( ! empty ( $array[3] ) ) ? esc_url_raw( $array[3] ) : esc_attr( '#' );  echo $url; ?>"> <?php echo esc_html( $array[1] ); ?></a>
                              </h4>
                              <?php } if ( ! empty ( $array[2] ) && ! empty ( $service_desc ) && $service_desc == 'show' ) { ?>
                              <p class="service-dec"><?php echo esc_html( $array[2] ); ?></p>
                              <?php } ?>
                           </div>
                        </div>
                
                    </div>
                    <?php
                    }
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
add_action( 'beastthemes_service_sec', 'beastthemes_home_service', 10 );
?>