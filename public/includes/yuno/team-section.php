<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_team_html {
    public static function beastthemes_companion_team_section() {

        $service_title    = get_theme_mod( 'yuno_team_title' );
        $service_subtitle = get_theme_mod( 'yuno_team_subtitle' );
        $service_desc     = get_theme_mod( 'yuno_team_desc' );

        ?>
        <!--Team-->
        <section class="team-section">
            <div class="container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#FF0066" d="M33.4,-20.5C48.7,-18,70.4,-9,74,3.6C77.6,16.2,63.1,32.4,47.7,44.4C32.4,56.5,16.2,64.5,-2,66.5C-20.2,68.5,-40.5,64.6,-51.4,52.5C-62.3,40.5,-63.9,20.2,-64.3,-0.4C-64.7,-21,-63.9,-42,-53,-44.6C-42,-47.1,-21,-31.1,-6,-25C9,-19,18,-23,33.4,-20.5Z" transform="translate(100 100)" />
                </svg>
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
                <div class="row">
                    <?php 
                       if ( ! empty ( get_theme_mod( 'yuno_teams_items' ) ) ) {
                          $service_items = json_decode( get_theme_mod( 'yuno_teams_items' ) );
                          $count         = 1;
                          foreach ( $service_items as $key => $value ) {
                            $array = array();
                            foreach($value as $key){
                                array_push( $array, $key );
                            }
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <figure class="team-member">
                            <?php if ( ! empty ( $array[0] ) ) { ?>
                            <div class="team-img">
                                <img src="<?php echo esc_attr( esc_url( $array[0] ) ); ?>" class="img-fluid" alt="<?php echo esc_attr( $array[1] ); ?>">
                            </div>
                            <?php } ?>
                            <figcaption>
                                <?php if ( ! empty ( $array[1] ) ) { ?>
                                <h4 class="team-title"> <a href="#"><?php echo esc_html( $array[1] ); ?></a> </h4>
                                <?php } if ( ! empty ( $array[2] ) ) { ?>
                                <p class="team-dec"><?php echo esc_html( $array[2] ); ?></p>
                                <?php } if ( ! empty ( $array[3] ) || ! empty ( $array[4] ) || ! empty ( $array[5] ) || ! empty ( $array[6] ) ) { ?>
                                <ul class="nav social-media">
                                    <li class="nav-item">
                                        <a href="<?php echo esc_attr( $array[3] ); ?>" class="nav-link" data-bs-toggle="tooltip" data-bs-original-title="" title=""><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo esc_attr( $array[4] ); ?>" class="nav-link" data-bs-toggle="tooltip" data-bs-original-title="" title=""><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo esc_attr( $array[5] ); ?>" class="nav-link" data-bs-toggle="tooltip" data-bs-original-title="" title=""><i class="fab fa-google-plus-g"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo esc_attr( $array[6] ); ?>" class="nav-link" data-bs-toggle="tooltip" data-bs-original-title="" title=""><i class="fab fa-twitter"></i></a>
                                    </li>
                                </ul>
                                <?php } ?>
                            </figcaption>
                        </figure>
                    </div>
                    <?php }
                    }
                ?>
                </div>
            </div>
        </section>
        <!---End-Team-Section-->
    <?php 
  }
}

/**
 * Team section.
 *
 */
if( ! function_exists( 'beastthemes_home_team' ) ) :

  /**
   * Team HTML
   *
   * @since 1.0.0
   */
  function beastthemes_home_team() {
    do_action( 'beastthemes_companion_team');
  }

endif;
add_action( 'yuno_team_sec', 'beastthemes_home_team', 10 );
?>