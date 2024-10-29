/*--------------------------------------------------
Project:        Yuno
Version:        1.0
Author:         Beastthemes
---------------------------------------------------*/

(function($) {
    "use strict";

    var Swipes = new Swiper('main .swiper-container', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });

    /* Testimonial Slider */
    var swiper = new Swiper('.testimonial-slider', {
        effect: 'slide',
        slidesPerView: beasttheme_yuno_script.testi_col,
        autoplay: 3000,
        spaceBetween: 20,
        autoHeight: true, //enable auto height
        autoHeight: true,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
        }
    });

    /* Blog Slider */
    var swiper = new Swiper('.blog-slider', {
        effect: 'slide',
        slidesPerView: beasttheme_yuno_script.blog_col,
        autoplay: 3000,
        autoHeight: true, //enable auto height
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.swiper_btn_outside.swiper-button-next',
            prevEl: '.swiper_btn_outside.swiper-button-prev',
        },
        breakpoints: {
            1024: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });

    /* Tilt Animation Effect */
    VanillaTilt.init(document.querySelectorAll(".outer"), {
        max: 60,
        speed: 400,
        perspective: 200,
        reverse: true,
    });

})(jQuery);