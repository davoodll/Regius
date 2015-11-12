

jQuery(function ($) {
    //Navigation toggle
    $("#toggle").click(function () {
        $(this).toggleClass("on");
        $("#menu").slideToggle();
    });
    $(window).load(function () {
        iheader = $('.right-header-main').outerHeight();
        $(".inner_home .ak-container").css({"min-height": iheader});
    });
    // $(document).off( 'click', '.add_to_cart_button' );
    // $(document).on( 'click', '.add_to_cart_button', function() {
    //     $("body .sub-menu").perfectScrollbar();
    // });

    //$("body .sub-menu").perfectScrollbar();

    $('.search-icon a').click(function () {
        $('.search-box').addClass('active');
    });

    $('.search-box .close').click(function () {
        $('.search-box').removeClass('active');
    });

    // Woocommerce single page thumbinal image slide
    $('.single-img .img-wrap .images > .thumbnails').slick({
        infinite: false,
        centerMode: false,
        useCss: false,
        easing: 'linear',
        edgeFriction: '0.15',
        lazyLoad: 'ondemand',
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        cssEase: 'ease',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

// end

    $('.new-prod-slide').slick({
        infinite: false,
        centerMode: false,
        useCss: false,
        easing: 'linear',
        edgeFriction: '0.15',
        lazyLoad: 'ondemand',
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        cssEase: 'ease',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.feature-cat-product').slick({
        infinite: false,
        centerMode: false,
        useCss: false,
        easing: 'linear',
        edgeFriction: '0.15',
        lazyLoad: 'ondemand',
        speed: 500,
        slidesToShow: 2,
        slidesToScroll: 1,
        cssEase: 'ease',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    new WOW().init();

    $('#ak-top').css('right', -65);
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('#ak-top').css('right', 20);
        } else {
            $('#ak-top').css('right', -65);
        }
    });

    $("#ak-top").click(function () {
        $('html,body').animate({scrollTop: 0}, 600);
    });

    $('.ticker-wrapper').show();

$('.navigation').addClass("clearfix");

});//doc close
