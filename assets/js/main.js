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

    (function () {

        var handler = $('select.select2');
        if (!handler.length) {
            return;
        }

        $('select.select2').select2({
            minimumResultsForSearch: -1
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

    })();

    /**
     *  Datepicker
     */


    (function () {

        var handler = $('#date_arival');
        if (!handler.length) {
            return;
        }
        $('#date_arival').datepicker({
            format: 'DD.MM.YYYY',
//            collapse: false,
//            keepOpen: true,
//            debug: true
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



    (function () {

        // Scroll down smoothly (menu items)
        $('a[href^="#"]').click(function (e) {

            e.preventDefault();

            var target = $($(this).attr('href'));
            if (target.length === 0) {
                return false;
            }

            var offset = target.offset().top;
            var margin = parseInt(target.css('margin-top').replace('px', ''));
            var padding = parseInt(target.css('padding-top').replace('px', ''));

            $('html,body').animate({scrollTop: (offset )}, 1000);
        });
    })($);


}); // $document.ready

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

