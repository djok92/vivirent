$ = jQuery.noConflict();
$(document).ready(function () {

    hidePageLoading();

    scrollhandler();


    $(window).scroll(function () {

        scrollhandler();
    });

    /**
     *  Home slider 
     */

    (function () {

        var handler = $('#home-slider');
        if (!handler.length) {
            return;
        }

        $('#home-slider').royalSlider({
            transitionType: 'fade',
            usePreloader: true,
            imageScaleMode: 'none',
            imageAlignCenter: false,
            autoScaleSlider: true,
            autoScaleSliderWidth: 1920,
            autoScaleSliderHeight: 920,
            loop: true,
            arrowsNav: false,
            controlNavigation: 'none',
            keyboardNavEnabled: true

        });

    })();


    /**
     * Apartman slider 
     */

    (function () {

        var handler = $('#apartman-slider');
        if (!handler.length) {
            return;
        }

        var slider = $('#apartman-slider').royalSlider({
            transitionType: 'fade',
            usePreloader: true,
            imageScaleMode: 'none',
            imageAlignCenter: false,
            autoScaleSlider: true,
            autoScaleSliderWidth: 1920,
            autoScaleSliderHeight: 920,
            loop: true,
            arrowsNav: false,
            controlNavigation: 'thumbnails',
            thumbs: {
                spacing: 8
            },
            keyboardNavEnabled: true

        });
        $('#apartman-slider').find('.rsNav').wrapInner('<div class="container"><div class="row"><div class="col-md-9"></div></div></div>');
        slider.find('.rsOverflow').prepend(slider.find('.rsNav'));

    })();

    /**
     *  Region slider 
     */

    (function () {

        var handler = $('#region-slider');
        if (!handler.length) {
            return;
        }

        $('#region-slider').royalSlider({
            transitionType: 'fade',
            usePreloader: true,
            imageScaleMode: 'none',
            imageAlignCenter: false,
            autoScaleSlider: true,
            autoScaleSliderWidth: 1920,
            autoScaleSliderHeight: 600,
            loop: true,
            arrowsNav: false,
            controlNavigation: 'none',
            keyboardNavEnabled: true

        });
//        var slider = $('#region-slider').data('royalSlider');
//        var i;
//
//
//        $('.slide-nav').each(function () {
//            for (i = 0; i < slider.numSlides; ) {
//                console.log("aa");
//                console.log($('.slide-nav_' + i));
//                slider.goTo(i);
//                i++;
//            }
//        });



    })();

    /**
     *  Datepicker
     */

    (function () {

        var handler = $('.date-picker input');
        if (!handler.length) {
            return;
        }
        $('.date-picker input').datepicker({
            format: "dd/mm/yyyy"
        });


    })();

    var config = {
        sensitivity: 10,
        interval: 5000,
        timeout: 50000
    };
    $('menu > ul > li').hover(function () {
        $(this).children('ul.sub-menu').stop().fadeIn(300);
    }, function () {
        $(this).find('ul.sub-menu').stop().fadeOut(300);
    }, config);

    $('menu > ul > li > ul > li').hover(function () {
        $(this).children('ul.sub-menu').fadeIn(300);
        $(this).addClass('active');
    }, function () {
        $(this).find('ul.sub-menu').fadeOut(300);
        $(this).removeClass('active');
    }, config);

});

hidePageLoading = function () {
    $('#xLoader').fadeOut(300);
};

scrollhandler = function () {
    if ($(window).scrollTop() > 0) {
        $('.booking-form').addClass('fixed');
    } else {
        $('.booking-form').removeClass('fixed');
    }
};