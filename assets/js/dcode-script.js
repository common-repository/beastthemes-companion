(function($) {
    'use strict';

    // hero-slide
    $('.hero-slide').slick({
        draggable: true,
        arrows: true,
        dots: true,
        fade: true,
        speed: 900,
        infinite: true,
        autoHeight: true,
        autoplay: true,
        cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
        touchThreshold: 100
    });

    // blog-slider
    $('.blog-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        spaceBetween: 20,
        slidesToShow: beasttheme_dcode_script.blog_col,
        autoHeight: true,
        slidesToScroll: 1,
        arrows: true,

        responsive: [{

                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },

            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // testimonial-slider
    $('.testimonial-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        arrows: false,
        adaptiveHeight: true,
        autoHeight: true
    });

    // clients logo slider
    $('.client-logo-slider').slick({
        infinite: true,
        slidesToShow: beasttheme_dcode_script.client_col,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        arrows: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    var $container = $('.d-grid');
    // initialize
    $container.masonry({
      columnWidth: '',
      itemSelector: '.d-grid-item'
    });

})(jQuery);