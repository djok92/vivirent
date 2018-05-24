$ = jQuery.noConflict();
$(document).ready(function () {
    hidePageLoading();

    /**
     * Menu handler
     */

    (function () {

        var handler = $('.main-nav');
        if (!handler.length) {
            return;
        }

        handler.mmenu({
            "extensions": [
                "theme-dark",
                "position-right"
            ],
            "counters": true
        }, {
            offCanvas: {
                pageSelector: "#wrapper"
            },
            clone: true
        });

    })();

    var menu = $('.main-nav').data('mmenu');

    $('#menu-button').click(function () {
        console.log(menu);
        if (typeof menu !== 'undefined') {
            menu.open();
        }
    });


    (function () {

        var handler = $('select.select2');
        if (!handler.length) {
            return;
        }

        $('select.select2').select2({
            minimumResultsForSearch: -1
        });
        // $('select.select2').select2().on('select2:open', function () {
        //     var container = $('.select2-container').last();
        //     container.addClass('');
        // });
    })();


    /**
     *  Datepicker
     */

    $('#datepicker').datepicker({
        format: 'dd.mm.yyyy',
        container: '.datepicker-holder'
    });


    (function () {

        var handler = $('#date_arival');
        if (!handler.length) {
            return;
        }
        $('#date_arival').datepicker({
            format: 'DD.MM.YYYY',
        });

    })();


    /**
     *  Accordion
     */

    (function () {

        var handler = $('.accordion');
        if (!handler.length) {
            return;
        }

        handler.accordion({
            "transitionSpeed": 400
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

            $('html,body').animate({scrollTop: offset}, 1000);
        });
    })($);


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
            keyboardNavEnabled: true,
            autoPlay: {
                enabled: true,
                pauseOnHover: false,
                delay: 4000
            }

        });
        $('#apartman-slider').find('.rsNav').wrapInner('<div class="container"><div class="row"><div class="col-md-9"></div></div></div>');
        slider.find('.rsOverflow').prepend(slider.find('.rsNav'));

    })();


    /**
     *  Swiper Sliders
     */

    (function () {
        var sliders = {
            homeSlider: '#home-slider',
            regionSlider: '#region-slider',
        };
        (function () {
            /**
             *  Home Slider
             */
            if ($(sliders.homeSlider).length) {
                return;
            }

            var slider = new Swiper(sliders.homeSlider, {
                speed: 400,
                spaceBetween: 100,
                effect: 'fade',
                navigation: {
                    nextEl: '.homeSliderNext',
                    prevEl: '.homeSliderPrev'
                }
            });

        })();

        (function () {
            /**
             *  Region Slider
             */
            if ($(sliders.regionSlider).length) {
                return;
            }

            var slider = new Swiper(sliders.regionSlider, {
                speed: 400,
                spaceBetween: 0,
                effect: 'fade'
            });

        })();


        (function () {
            /**
             *  Apartment Slider
             */
            var handler = $('.gallery-top');
            if (!handler.length) {
                return;
            }
            var galleryTop = new Swiper('.gallery-top', {
                spaceBetween: 10,
                effect: 'fade',
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 10,
                centeredSlides: true,
                slidesPerView: 'auto',
                touchRatio: 0.2,
                slideToClickedSlide: true,
            });
            galleryTop.controller.control = galleryThumbs;
            galleryThumbs.controller.control = galleryTop;

        })();


    })();


    /**
     *  Tabs
     */

    (function () {

        var tabs = $('ul.tabs');
        if (!tabs.length) {
            return;
        }

        function getElementType(object) {
            return object.get(0).tagName.toLowerCase();
        }

        var markTarget = function (targets, index) {
            var previous;
            $.each(targets, function (i, target) {

                if (getElementType(target) === 'div') {

                    previous = target.parent().find('.current');
                    previous.removeAttr('style').fadeOut(500);

                    target.eq(index).fadeIn(500);
                }

                target.removeClass('current');
                target.eq(index).addClass('current');
            });
        };
        if (tabs.length) {
            var nav = tabs.children('li');
            var targets = tabs.parent().find('.tabs-holder').children();
            var index, current = nav.find('.current').index();
            tabs.find('> li').each(function () {
                $(this).click(function () {
                    if ($(this).index() !== index) {
                        index = current = $(this).index();
                        markTarget([nav, targets], index);
                    }
                });
            });
        }
    })();


}); // $document.ready


hidePageLoading = function () {
    $('#xLoader').fadeOut(300);
};


// Google map

// (function ($) {
//     /*
//      *  new_map
//      *
//      *  This function will render a Google Map onto the selected jQuery element
//      *
//      *  @type	function
//      *  @date	8/11/2013
//      *  @since	4.3.0
//      *
//      *  @param	$el (jQuery element)
//      *  @return	n/a
//      */
//
//     function new_map($el) {
//         // var
//         var $markers = $el.find('.marker');
//         // vars
//         var args = {
//             zoom: 16,
//             center: new google.maps.LatLng(0, 0),
//             mapTypeId: google.maps.MapTypeId.ROADMAP
//         };
//         // create map
//         var map = new google.maps.Map($el[0], args);
//         // add a markers reference
//         map.markers = [];
//
//         // add markers
//         $markers.each(function () {
//
//             add_marker($(this), map);
//         });
//
//         // center map
//         center_map(map);
//         // return
//         return map;
//     }
//
//     /*
//      *  add_marker
//      *
//      */
//     function add_marker($marker, map) {
//         // var
//         var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
//         // create marker
//         var marker = new google.maps.Marker({
//             position: latlng,
//             map: map
//         });
//         // add to array
//         map.markers.push(marker);
//         // if marker contains HTML, add it to an infoWindow
//         if ($marker.html()) {
//             // create info window
//             var infowindow = new google.maps.InfoWindow({
//                 content: $marker.html()
//             });
//             // show info window when marker is clicked
//             google.maps.event.addListener(marker, 'click', function () {
//
//                 infowindow.open(map, marker);
//             });
//         }
//     }
//
//     function center_map(map) {
//         // vars
//         var bounds = new google.maps.LatLngBounds();
//         // loop through all markers and create bounds
//         $.each(map.markers, function (i, marker) {
//             var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
//             bounds.extend(latlng);
//         });
//
//         // only 1 marker?
//         if (map.markers.length == 1) {
//             // set center of map
//             map.setCenter(bounds.getCenter());
//             map.setZoom(16);
//         } else {
//             // fit to bounds
//             map.fitBounds(bounds);
//         }
//     }
//
//     // global var
//     var map = null;
//
//     $(document).ready(function () {
//
//         $('.acf-map').each(function () {
//
//             // create map
//             map = new_map($(this));
//         });
//     });
// })(jQuery);
