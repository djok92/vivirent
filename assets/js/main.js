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

        handler.each(function () {
            $(this).select2({
                minimumResultsForSearch: 20
            });
        });
    })();


    /**
     * Rating stars
     */

    var Rating = function () {
        var handler = $('.Rating .Rating__Star');

        if (!handler.length) {
            return;
        }

        handler.click(function () {
            var total = $(this).parent().children('.Rating__Star').length;
            var index = $(this).index();
            console.log(index);
            $('.Rating .Rating__Star').removeClass('filled');
            for (var i = index; i < total; i++) {
                $('.Rating .Rating__Star').eq(i).addClass('filled');
            }
            var Rating = $('input[name="rating"]').val(parseInt($('.Rating .Rating__Star.filled').length));
            console.log(Rating);
        });
    };
    Rating();

    /**
     *  Accordion for Homepage
     */

    (function () {

        var handler = $('.Specification.accordion');
        if (!handler.length) {
            return;
        }

        handler.accordion({
            "transitionSpeed": 400
        });

    })();


    /**
     *  Smooth scroll
     */

    (function () {

        var handler = $('[data-scroll]');
        if (!handler.length) {
            return;
        }

        handler.each(function () {
            $(this).click(function (e) {
                e.preventDefault();

                var target = $($(this).data('scroll'));
                var offset = target.offset().top;

                $('html,body').stop().animate({scrollTop: (offset)}, 900);
            });
        });
    })();


    /**
     * PickmeUp Calendar position Fix
     */

    (function () {

        var handler = $('.pickmeup');
        if (!handler.length) {
            return;
        }

        handler.each(function (index) {
            var currentHandler = $(this);
            $('.datepicker-holder').each(function (position) {
                if (index === position) {
                    currentHandler.appendTo($(this));
                }
            });
        });
    })();


    /**
     * Fixed images for mobiles
     */

    (function () {

        var handler = $('#fixedImg');
        if (!handler.length) {
            return;
        }

        function adaptHeight() {
            var parent = handler.parent();
            var parentHeight = parent.outerHeight();

            handler.css('height', parentHeight);
        }

        adaptHeight();
        $(window).resize(function () {
            adaptHeight();
        });
    })();


    /**
     *  Accordion for Homepage
     */

    (function () {

        var handler = $('.Villa.accordion');
        if (!handler.length) {
            return;
        }

        handler.accordion({
            "transitionSpeed": 400
        });


        (function () {

            var handler = $('.Villa.accordion');
            if (!handler.length) {
                return;
            }
            function getPosition(element) {
                //  var xPosition = 0;
                var yPosition = 0;

                while (element) {
                    //  xPosition += (element.offsetLeft - element.scrollLeft + element.clientLeft);
                    yPosition += (element.offsetTop - element.scrollTop + element.clientTop);
                    //Loop through as long as element have parents
                    element = element.offsetParent;
                }
                return {
                    //    x: xPosition,
                    y: yPosition
                };
            }

            //Get Elements positions object
            var positions = [];
            handler.each(function () {
                positions.push(getPosition($(this)[0]));
            });

            handler.each(function (index) {
                $(this).on('click', function () {
                    var itemHeight = $(this).find('.apartments-box').outerHeight();
                    var isOpen = $(this).hasClass('open');

                    if (isOpen) {
                        $.each(positions, function (positionIndex, positionValue) {
                            if (index === positionIndex) {
                                $('html,body').animate({scrollTop: positionValue.y + itemHeight}, 600);
                            }
                        });
                    }
                });
            });

            $('.ApartmentsVilla').each(function () {
                $(this).click(function (e) {
                    e.stopPropagation();
                });
            });
        })();


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

            if (!$(sliders.homeSlider).length) {
                return;
            }

            $(sliders.homeSlider).flexslider({
                animation: "fade",
                controlNav: "thumbnails"
            });

            $('.flex-direction-nav').appendTo('.hero-holder');

        })();

        // (function () {
        //     /**
        //      *  Region Slider
        //      */
        //     if (!$(sliders.regionSlider).length) {
        //         return;
        //     }
        //
        //     var slider = new Swiper(sliders.regionSlider, {
        //         speed: 400,
        //         spaceBetween: 0,
        //         effect: 'fade'
        //     });
        //
        // })();


        (function () {
            /**
             *  Apartment Slider
             */
            var handler = $('#galleryWithThumbs');
            if (!handler.length) {
                return;
            }
            handler.flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });


            $('.flex-control-thumbs').wrap("<div class='galleryThumbs'><div class='container'></div></div>");

        })();


        (function () {
            /**
             *  Gallery Slider
             */
            var handler = $('.GallerySlider');
            if (!handler.length) {
                return;
            }

            handler.flexslider({
                animation: "fade",
                controlNav: "bullets"
            });

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
                        //markTarget([nav, targets], index);
                        hashUpdate($(this).data('hash'));
                    }
                });
            });

            $(window).on('hashchange', function () {
                hashChange();
            });

            hashChange();
        }


        function hashUpdate(hash) {

            if (typeof hash !== 'undefined') {
                window.location.hash = '#' + hash;
            }
        }

        function hashChange() {

            var i = 0;

            tabs.find('> li').each(function () {

                var hash = $(this).data('hash') || '';

                if (hash === window.location.hash.substring(1)) {
                    markTarget([nav, targets], i);
                    index = i;
                }

                i++;
            });
        }

    })();


    // $('.acf-map').each(function () {
    //     map = new_map($(this));
    // });

}); // $document.ready


hidePageLoading = function () {
    $('#xLoader').fadeOut(300);
};

// Google map

/*
 *  new_map
 *
 *  This function will render a Google Map onto the selected jQuery element
 *
 *  @type	function
 *  @date	8/11/2013
 *  @since	4.3.0
 *
 *  @param	$el (jQuery element)
 *  @return	n/a
 */

function new_map($el) {

    // var
    var $markers = $el.find('.marker');


    // vars
    var args = {
        zoom: 16,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };


    // create map
    var map = new google.maps.Map($el[0], args);


    // add a markers reference
    map.markers = [];


    // add markers
    $markers.each(function () {

        add_marker($(this), map);

    });


    // center map
    center_map(map);


    // return
    return map;

}

/*
 *  add_marker
 *
 *  This function will add a marker to the selected Google Map
 *
 *  @type	function
 *  @date	8/11/2013
 *  @since	4.3.0
 *
 *  @param	$marker (jQuery element)
 *  @param	map (Google Map object)
 *  @return	n/a
 */

function add_marker($marker, map) {

    // var
    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

    // create marker
    var marker = new google.maps.Marker({
        position: latlng,
        map: map
    });

    // add to array
    map.markers.push(marker);

    // if marker contains HTML, add it to an infoWindow
    if ($marker.html()) {
        // create info window
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function () {

            infowindow.open(map, marker);

        });
    }

}

/*
 *  center_map
 *
 *  This function will center the map, showing all markers attached to this map
 *
 *  @type	function
 *  @date	8/11/2013
 *  @since	4.3.0
 *
 *  @param	map (Google Map object)
 *  @return	n/a
 */

function center_map(map) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each(map.markers, function (i, marker) {

        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

        bounds.extend(latlng);

    });

    // only 1 marker?
    if (map.markers.length === 1) {
        // set center of map
        map.setCenter(bounds.getCenter());
        map.setZoom(16);
    }
    else {
        // fit to bounds
        map.fitBounds(bounds);
    }

}

// global var
var map = null;