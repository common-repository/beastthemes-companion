<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_slider_html {
    public static function beastthemes_companion_slider_section() {
        ?>
        <!-- Start-Slider-Section -->
        <main>
            <div class="swiper-container">
                <!-- swiper slides -->
                <div class="swiper-wrapper">
                <?php 
                   if ( ! empty ( get_theme_mod( 'yuno_sliders_items' ) ) ) {
                      $slider_items = json_decode( get_theme_mod( 'yuno_sliders_items' ) );
                      foreach ( $slider_items as $key => $value ) {
                         $array = array();
                        foreach( $value as $key ) {
                            array_push( $array, $key );
                        }
                        if ( ! empty ( $array ) && ! empty ( $array[0] ) ) {
                    ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_attr( esc_url( $array[0] ) ); ?>" class="img-fluid" alt="img">
                        <div class=" slider-overlay ">
                            <div class="container content-center">
                                <div class="slide-content ">
                                    <?php if ( ! empty ( $array[1] ) ) { ?>
                                    <h2 class="title"><?php echo esc_html( $array[1] ); ?></h2>
                                    <?php } if ( ! empty ( $array[2] ) ) { ?>
                                    <h3 class="sub-title" data-animation="fadeInUp" data-delay="500ms"><?php echo esc_html( $array[2] ); ?></h3>
                                    <?php } if ( ! empty ( $array[3] ) && ! empty ( $array[6] ) ) { ?>
                                    <div class="slider-btn">
                                        <?php if ( ! empty ( $array[3] ) && ! empty ( $array[4] ) ) { ?>
                                        <a href="<?php echo esc_attr( esc_url( $array[4] ) ); ?>" <?php if ( $array[5] == 'yes' ) { echo esc_attr( 'target=_blank' ); } ?> data-animation="fadeInUp" data-delay="800ms" class="btn btn-theme btn-lg"><?php echo esc_html( $array[3] ); ?><i class="fas fa-long-arrow-alt-right"></i> </a>
                                        <?php } if ( ! empty ( $array[6] ) && ! empty ( $array[7] ) ) { ?>
                                        <a href="<?php echo esc_attr( esc_url( $array[7] ) ); ?>" <?php if ( isset( $array[8] ) && $array[8] == 'yes' ) { echo esc_attr( 'target=_blank' ); } ?> data-animation="fadeInUp" data-delay="800ms" class="btn btn-theme btn-lg btn-white"><?php echo esc_html( $array[6] ); ?><i class="fas fa-long-arrow-alt-right"></i> </a>
                                        <?php } ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                      }
                   }
                ?>
                </div>
                <!-- !swiper slides -->

                <!-- next / prev arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
                <!-- !next / prev arrows -->

                <!-- pagination dots -->
                <div class="swiper-pagination"></div>
                <!-- !pagination dots -->
            </div>
        </main>
        <!-- End-Slider-Section -->
    <?php 
    }
}

/**
 * Slider section.
 *
 */
if( ! function_exists( 'beastthemes_home_slider' ) ) :

    /**
     * Slider HTML
     *
     * @since 1.0.0
     */
    function beastthemes_home_slider() {
        $slider_home = absint( get_theme_mod( 'yuno_slider_home', '1' ) ) ;
        if( $slider_home == "1" ) {
            /* Executes the action for sliders section hook named 'beastthemes_companion_slider' */
            do_action( 'beastthemes_companion_slider');
        } else {
            echo '<div class="margin-110  clearfix"></div>';
        }
    }

endif;
add_action( 'yuno_slider_sec', 'beastthemes_home_slider', 5 );
?>