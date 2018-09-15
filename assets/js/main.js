$ = jQuery.noConflict();
$(document).ready(function () {
    'use strict';
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

    (function () {
        var hanlder = $('#bookingForm');

        if (!hanlder.length) {
            return;
        }
        var offsetTop = hanlder.offset().top;
        var bookingElements = hanlder.children('form').find('.booking-form__item');


        bookingElements.each(function () {
            $(this).click(function () {
                $('html,body').stop().animate({scrollTop: (offsetTop)}, 500);
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


    // var offsetTopDate = parseFloat($('#period-prices-wrapper').offset().top);
    // var dateButtons = $('.pmu-days .pmu-button');
    // dateButtons.each(function () {
    //     $(this).click(function () {
    //         console.log(offsetTopDate);
    //         $('html,body').stop().animate({scrollTop: (offsetTopDate)}, 500);
    //     });
    // });
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
            regionSlider: '#region-slider'
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
            });

            $('.flex-direction-nav').appendTo('.hero-holder');

        })();

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
                    var offsetTop = $(this).offset().top;
                    if ($(this).index() !== index) {
                        index = current = $(this).index();
                        //markTarget([nav, targets], index);
                        hashUpdate($(this).data('hash'));
                    }
                    $('html,body').stop().animate({scrollTop: (offsetTop)}, 500);
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


    (function () {
        var handler = $('.sideBoxInfo');
        if (!handler.length) {
            return;
        }

        function sidebarHanlder() {
            if ($(window).width() > 1200) {
                var handlerOffset = handler.offset().top - 50;
                $(window).bind('scroll.sidebarScroll', function () {
                    var windowScroll = $(this).scrollTop();
                    if (windowScroll > handlerOffset) {
                        handler.addClass('Fixed');
                    } else {
                        handler.removeClass('Fixed');
                    }
                });
            } else {
                console.log('remooooveClass');
                handler.removeClass('Fixed');
                $(window).unbind('.sidebarScroll');
            }
        }

        sidebarHanlder();
        $(window).on('resize', function () {
            sidebarHanlder();
        });


    })();
}); // $document.ready


hidePageLoading = function () {
    $('#xLoader').fadeOut(300);
};
