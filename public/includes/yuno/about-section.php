<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_about_html {
  public static function beastthemes_companion_about_section() {

        $about_img_bg   = get_theme_mod( 'yuno_about_img_bg' );
        $about_title    = get_theme_mod( 'yuno_about_title' );
        $about_subtitle = get_theme_mod( 'yuno_about_subtitle' );
        $about_desc     = get_theme_mod( 'yuno_about_desc' );
        $about_btn_text = get_theme_mod( 'yuno_about_btn_text' );
        $about_btn_link = get_theme_mod( 'yuno_about_btn_link' );

        if ( ! empty ( $about_img_bg ) ) {
            $class = 'col-md-6';
        } else {
            $class = 'col-md-12';
        }

        ?>
        <!---About-Section-->
        <section class="about-section">
            <div class="container">
                <div class="row">
                    <?php if ( ! empty ( $about_img_bg ) ) { ?>
                    <div class="col-md-6">
                        <div class="about-img">
                            <img src="<?php echo esc_attr( esc_url( $about_img_bg ) ); ?>" class="img-fluid" alt="about-img">
                        </div>
                    </div>
                    <?php } ?>

                    <div class="<?php echo esc_attr( $class ); ?>">
                        <div class="about-content">
                            <div class="section-title">
                                <?php if ( ! empty ( $about_title ) ) { ?>
                                <h5><?php echo esc_html( $about_title ); ?></h5>
                                <?php } if ( ! empty ( $about_subtitle ) ) { ?>
                                <h2><?php echo esc_html( $about_subtitle ); ?></h2>
                                <?php } if ( ! empty ( $about_desc ) ) { ?>
                                <p><?php echo esc_html( $about_desc ); ?></p>
                                <?php } ?>
                            </div>

                            <?php if ( ! empty ( $about_btn_text ) ) { ?>
                            <ul class="nav flex-column about-list">
                                <li class="nav-item">
                                    <a href="<?php echo esc_attr( esc_url( $about_btn_link ) ); ?>" class="btn btn-theme"><?php echo esc_html( $about_btn_text ); ?></a>
                                </li>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <!---End-About-Section-->
  <?php 
  }
}

/**
 * Service section.
 *
 */
if( ! function_exists( 'beastthemes_home_about' ) ) :

  /**
   * Service HTML
   *
   * @since 1.0.0
   */
  function beastthemes_home_about() {
    /* Executes the action for about section hook named 'beastthemes_companion_about' */
    do_action( 'beastthemes_companion_about');
  }

endif;
add_action( 'yuno_about_sec', 'beastthemes_home_about', 10 );
?>