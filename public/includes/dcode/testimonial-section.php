<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_testimonial_html {
    public static function beastthemes_companion_testimonial_section() {
        ?>
        <!--Testimonial-Section-->
        <section class="testimonial-wrapper">
        <!-- <div class="cube-group">
       <div class="cube"></div>
       <div class="cube"></div>
       <div class="cube"></div>
       <div class="cube"></div>
      <div class="cube"></div>
    </div> -->
          <div class="container">
          <div class="row">  
          <div class="col-lg-6 d-flex align-items-center">  
             <div class="section-header text-left wow fadeInLeft  heading-div m-0">
                  <h2 class="section-title  ">
                    <?php echo esc_html( get_theme_mod( 'rdcode_testi_title', 'Happy Client' ) ); ?>
                  </h2>
                <?php if ( ! empty ( get_theme_mod( 'rdcode_testi_desc' ) ) ) { ?>
                  <p class="section-dec"><?php echo esc_html( get_theme_mod( 'rdcode_testi_desc' ) ); ?></p>
                <?php } ?>
              </div>
              </div>
              <div class="col-lg-6">  
                <div class="mx-auto testimonial-slider wow fadeInRight">
                  <?php
                    if ( ! empty ( get_theme_mod( 'rdcode_testi_items' ) ) ) {
                      $testimonial_items = json_decode( get_theme_mod( 'rdcode_testi_items' ) );
                      foreach ( $testimonial_items as $key => $value ) {

                        $array = array();
                        foreach( $value as $key ) {
                            array_push( $array, $key );
                        }

                        if ( ! empty ( $array ) ) {
                    ?>
                    <!-- slider-item -->
                  <!-- slider-item -->
                  <div class="testimonial-content">
                      <div class="testimonial-content-inner">
                        <?php if ( ! empty ( $array[0] ) ) { ?>
                        <div class="content-center d-flex">
                          <div class="autor-img "> 
                              <img class="img-fluid rounded-circle" src="<?php echo esc_attr( esc_url( $array[0] ) ); ?>" alt="client-image" />
                          </div>
                          <div class="author-info ">
                            <?php if ( ! empty( $array[4] ) && $array[4] != 0 ) { ?>
                            <div class="star-ratting">
                              <?php if ( $array[4] == 1 ) { ?>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                              <?php } elseif ( $array[4] == 2 ) { ?>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                              <?php } elseif ( $array[4] == 3 ) { ?>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                              <?php } elseif ( $array[4] == 4 ) { ?>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                              <?php } elseif ( $array[4] == 5 ) { ?>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                                  <a href="#"> <i class="fas fa-star"></i> </a>
                              <?php } ?>                
                            </div>
                              <?php } if ( ! empty ( $array[1] ) ) { ?>
                                <h4 class="author-name "><a href="#"><?php echo esc_html( $array[1] ); ?></a></h4>
                              <?php } if ( ! empty ( $array[2] ) ) { ?>
                                <h5 class="author-sub "><?php echo esc_html( $array[2] ); ?></h5>
                              <?php } ?>
                          </div>
                      </div>
                        <?php } if ( ! empty ( $array[3] ) ) { ?>
                        <p class="author-dec ">    <i class="fas fa-quote-left "></i>
                        <?php echo esc_html( $array[3] ); ?>
                        </p>
                        <?php } if ( ! empty ( $array[1] ) || ! empty ( $array[2] ) ) { ?>
                        
                        <?php } ?>
                      </div>
                    </div>
                    <?php 
                        }
                      }
                    }
                  ?>
                </div> 
              </div>
          </div>
      </section>
      <!--End-Testimonial-Section-->
    <?php 
    }
}

/**
 * Team section.
 *
 */
if( ! function_exists( 'beastthemes_home_testimonial' ) ) :

    /**
     * Team HTML
     *
     * @since 1.0.0
     */
    function beastthemes_home_testimonial() {
      /* Executes the action for sliders section hook named 'beastthemes_companion_testimonial' */
      do_action( 'beastthemes_companion_testimonial');
    }

endif;
add_action( 'beastthemes_testimonial_sec', 'beastthemes_home_testimonial', 5 );
?>