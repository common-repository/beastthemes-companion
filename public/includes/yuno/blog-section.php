<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_blog_html {
    public static function beastthemes_companion_blog_section() {

        $blog_title         = get_theme_mod( 'yuno_blog_title' );
        $blog_subtitle      = get_theme_mod( 'yuno_blog_subtitle' );
        $blog_desc          = get_theme_mod( 'yuno_blog_desc' );
        $blog_excerpt_hide  = get_theme_mod( 'yuno_blog_excerpt_hide' );
        $blog_readmore_hide = get_theme_mod( 'yuno_blog_readmore_hide' );
    ?>
    <section class="blog-section bg-gray">
            <div class="container">
                <?php if ( ! empty ( $blog_title ) || ! empty ( $blog_subtitle ) || ! empty ( $blog_desc ) ) { ?>
                <div class="section-title text-center">
                    <?php if ( ! empty ( $blog_title ) ) { ?>
                    <h5><?php echo esc_html( $blog_title ); ?></h5>
                    <?php } if ( ! empty ( $blog_subtitle ) ) { ?>
                    <h2><?php echo esc_html( $blog_subtitle ); ?></h2>
                    <?php } if ( ! empty ( $blog_desc ) ) { ?>
                    <p><?php echo esc_html( $blog_desc ); ?></p>
                    <?php } ?>
                </div>
                <?php } ?>
                
          
            <div class="slider_container">
                <div class="swiper-container blog-slider">
                    <div class="swiper-wrapper">
                        <?php 
                            /**
                            * Setup query to show the 'Posts' post type with ‘8’ posts.
                            * Output the title with an excerpt.
                            */
                            $count = get_theme_mod( 'yuno_no_of_blogs', '3' );
                            if ( empty ( $count ) ) {
                                $count = -1;
                            }
                            $args  = array(  
                            'post_type'           => 'post',
                            'post_status'         => 'publish',
                            'posts_per_page'      => $count,
                            'ignore_sticky_posts' => 1 
                            );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                        ?>
                        <div class="swiper-slide">
                            <article class="blog-item">
                                <figure>
                                <div class="post-thumbnail blog-item-img">
                                    <?php 
                                        if ( has_post_thumbnail() ) {
                                            echo '<a href="'.esc_attr( esc_url( get_the_permalink() ) ).'" rel="lightbox">'; 
                                                the_post_thumbnail( '', array( 'class' => 'blog-img img-fluid' ) );
                                            echo '</a>';
                                        }
                                    ?>
                                    </div>
                                    <figcaption class="blog-body">
                                    
                                        <div class="blog_item_inner <?php if ( ! has_post_thumbnail() ) { echo esc_attr( 'meta-tags','beastthemes_companion' ); } ?>">
                                            <a class="post-author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" tooltip="<?php echo esc_html( get_the_author() ); ?>">
                                                <img src="<?php echo esc_url( get_avatar_url( 'ID' ) ); ?>" class="post-author-img" alt="<?php echo esc_html( get_the_author() ); ?>">
                                            </a>
                                            
                                            
                                            <h4 class="blog-title">
                                            <a href="<?php echo esc_attr( esc_url( get_the_permalink() ) ); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        </div>
                                        
                                            
                                        <div class="post-date">
                                            <time class="entry-date published updated" datetime="<?php echo esc_html( get_the_date() ); ?>">
                                                <span><?php echo esc_html( get_the_date( 'd' ) ); ?></span> 
                                                <small><?php echo esc_html( get_the_date( 'M' ) ); ?><br><?php echo esc_html( get_the_date( 'Y' ) ); ?></small>
                                            </time>
                                        </div>
                                            
                                            <div class="post-info content-center">
                                                <div class="post-taxonomies">
                                                    <a href="javascript:void(0)" class="post-tag"><i class="fas fa-layer-group"></i></a>
                                                    <?php 
                                                        $categories_list = get_the_category_list( esc_html__( ', ', 'beastthemes_companion' ) );
                                                        if ( $categories_list ) {
                                                            echo wp_kses_post( $categories_list );
                                                        }
                                                    ?>
                                                    <a href="javascript:void(0)" class="post-tag"><i class="fas fa-tags"></i></a>
                                                    <?php 
                                                        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'beastthemes_companion' ) );
                                                        if ( $tags_list ) {
                                                            echo wp_kses_post( $tags_list );
                                                        }
                                                    ?>
                                                </div>
                                                <a href="#" class="post-comment"><i class="fas fa-comment-dots"></i>&nbsp;
                                                    <?php echo esc_html( get_comments_number( get_the_ID() ) ); ?>
                                                </a> 
                                            </div>
                                        <?php 
                                            if ( ! empty( $blog_excerpt_hide ) && $blog_excerpt_hide == 'show' ) { 
                                                the_excerpt(); 
                                            } if ( ! empty ( $blog_readmore_hide ) && $blog_readmore_hide == 'show' ) {
                                        ?>
                                        <a href="<?php echo esc_attr( esc_url( get_the_permalink() ) ); ?>" class="btn btn-theme">
                                            <?php echo esc_html( yuno_theme_mod_option( 'yuno_archive_read_more_text' ) ); ?>
                                            <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                        <?php } ?>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
  
            <!-- !next / prev arrows -->

            <!-- pagination dots -->
            <div class="swiper-pagination"></div>
            <!-- !pagination dots -->
                </div>
                                     <!-- next / prev arrows -->
            <div class="swiper-button-next swiper_btn_outside swiper-button-white"></div>
            <div class="swiper-button-prev swiper_btn_outside swiper-button-white"></div>
            </div>
            </div>
        </section>
    <?php }
}

/**
 * Blog section.
 *
 */
if( ! function_exists( 'beastthemes_home_blog' ) ) :

    /**
     * Blog HTML
     *
     * @since 1.0.0
     */
    function beastthemes_home_blog() {
        /* Executes the action for sliders section hook named 'beastthemes_companion_blog' */
        do_action( 'beastthemes_companion_blog');
    }

endif;
add_action( 'yuno_blog_sec', 'beastthemes_home_blog', 5 );