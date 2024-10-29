<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_testimonial_html {
    public static function beastthemes_companion_testimonial_section() {

        $testi_title    = get_theme_mod( 'yuno_testi_title' );
        $testi_subtitle = get_theme_mod( 'yuno_testi_subtitle' );
        $testi_desc     = get_theme_mod( 'yuno_testi_desc' );

        ?>
        <!--Testimonial-Section-->
        <section class="testimonioal-section">
            <div class="container">
                <?php if ( ! empty ( $testi_title ) || ! empty ( $testi_subtitle ) || ! empty ( $testi_desc ) ) { ?>
                <div class="section-title text-center">
                    <?php if ( ! empty ( $testi_title ) ) { ?>
                    <h5><?php echo esc_html( $testi_title ); ?></h5>
                    <?php } if ( ! empty ( $testi_subtitle ) ) { ?>
                    <h2><?php echo esc_html( $testi_subtitle ); ?></h2>
                    <?php } if ( ! empty ( $testi_desc ) ) { ?>
                    <p><?php echo esc_html( $testi_desc ); ?></p>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="swiper-container testimonial-slider">
                    <div class="swiper-wrapper">
                        <?php 
                           if ( ! empty ( get_theme_mod( 'yuno_testi_items' ) ) ) {
                              $slider_items = json_decode( get_theme_mod( 'yuno_testi_items' ) );
                              foreach ( $slider_items as $key => $value ) {
                                 $array = array();
                                foreach($value as $key){
                                    array_push( $array, $key );
                                }
                        ?>
                        <div class="swiper-slide">
                            <figure class="testimonioa-item">
                                <div class="quote-icon fas fa-quote-left"></div>
                                <?php if ( ! empty( $array[4] ) && $array[4] != 0 ) { ?>
                                <div class="ratting">
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
                                <?php } if ( ! empty ( $array[3] ) ) { ?>
                                <p class="testimonioa-content">
                                    <?php echo esc_html( $array[3] ); ?>
                                </p>
                                <?php } ?>
                                <figcaption>
                                    <?php if ( ! empty ( $array[0] ) ) { ?>
                                    <div class="author-image">
                                        <img src="<?php echo esc_attr( esc_url( $array[0] ) ); ?>" class="img-fluid" alt="product_img">
                                    </div>
                                    <?php } if ( ! empty ( $array[1] ) || ! empty ( $array[2] ) ) { ?>
                                    <div class="author-content">
                                        <?php if ( ! empty ( $array[1] ) ) { ?>
                                        <h4 class="author-name"> <a href="#"><?php echo esc_html( $array[1] ); ?></a> </h4>
                                        <?php } if ( ! empty ( $array[2] ) ) { ?>
                                        <h5 class="author-post"><?php echo esc_html( $array[2] ); ?></h5>
                                        <?php } ?>
                                    </div>
                                    <?php } ?>
                                </figcaption>
                            </figure>
                        </div>
                        <?php } } ?>
                    </div>
                    <!-- next / prev arrows -->
                </div>
            </div>
        </section>
      <!--End-Testimonial-Section-->
    <?php 
    }
}

/**
 * Testimonial section.
 *
 */
if( ! function_exists( 'beastthemes_home_testimonial' ) ) :

    /**
     * Testimonial HTML
     *
     * @since 1.0.0
     */
    function beastthemes_home_testimonial() {
        /* Executes the action for sliders section hook named 'beastthemes_companion_testimonial' */
        do_action( 'beastthemes_companion_testimonial');
    }

endif;
add_action( 'yuno_testimonial_sec', 'beastthemes_home_testimonial', 5 );
?>