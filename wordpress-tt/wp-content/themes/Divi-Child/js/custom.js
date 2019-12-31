jQuery(document).ready(function ($) {

    if($(window).width() > 980) {
        // add_fadedown(post4,post3, post2, post1, post5);
        // post4.addClass('active');
        $("#content-postservice .post-service").addClass('fadeOut');
        $("#content-postservice .post-service:nth-last-child(1)").addClass('active').removeClass("fadeOut").addClass("fadeIn");

        $('body').on('click', '#name-title .title-service', function () {
            $('#content-postservice .post-service').removeClass('active');
            var divClass = $(this).attr('class');
            var num = divClass.substr(divClass.length - 1);
            $('#content-postservice').find('.post-service' + num).removeClass('active').addClass('active');
            $("#content-postservice .post-service").removeClass("fadeIn").removeClass("fadeOut");
            $("#content-postservice .post-service").addClass("fadeOut");
            setTimeout( function() {
                $('#content-postservice').find('.post-service' + num).removeClass("fadeOut");
                $('#content-postservice').find('.post-service' + num).addClass("fadeIn");
            }, 500);

            $(this).css('opacity', '1');
            var length = $('#content-postservice .post-service').length;
            var opacity = 1;
            var ruduce_opacity = 1 / length;
            for (var index = 1; index < length; index++) {
                if(num < length){
                    num++;
                    console.log(num);
                    opacity = opacity - ruduce_opacity;
                    $('#name-title .title-service' + num).css({'opacity': opacity});
                }else{
                    if(num == length ){
                        console.log('ok');
                        num = 1;
                        console.log(num);
                        opacity = opacity - ruduce_opacity;
                        $('#name-title .title-service' + num).css({'opacity': opacity});
                    }
                }
            }

        });
    }

    $('.slider-client').slick({
        dots: true,
        infinite: true,
        arrows: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 2,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });

    // ------------- VARIABLES ------------- //
    function isIE() {
        var ua = navigator.userAgent;
        /* MSIE used to detect old browsers and Trident used to newer ones*/
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
        return is_ie;
    }

    function is_touch_device() {
        try {
            document.createEvent("TouchEvent");

            return true;
        } catch (e) {
            return false;
        }
    }
    if($(window).width() > 767 && $(window).height() > 500) {
        var supportTouch = $.support.touch,
            scrollEvent = "touchmove scroll",
            touchStartEvent = supportTouch ? "touchstart" : "mousedown",
            touchStopEvent = supportTouch ? "touchend" : "mouseup",
            touchMoveEvent = supportTouch ? "touchmove" : "mousemove";
        $.event.special.swipeupdown = {
            setup: function() {
                var thisObject = this;
                var $this = $(thisObject);
                $this.bind(touchStartEvent, function(event) {
                    var data = event.originalEvent.touches ?
                        event.originalEvent.touches[ 0 ] :
                        event,
                        start = {
                            time: (new Date).getTime(),
                            coords: [ data.pageX, data.pageY ],
                            origin: $(event.target)
                        },
                        stop;

                    function moveHandler(event) {
                        if (!start) {
                            return;
                        }
                        var data = event.originalEvent.touches ?
                            event.originalEvent.touches[ 0 ] :
                            event;
                        stop = {
                            time: (new Date).getTime(),
                            coords: [ data.pageX, data.pageY ]
                        };

                        // prevent scrolling
                        if (Math.abs(start.coords[1] - stop.coords[1]) > 10) {
                            event.preventDefault();
                        }
                    }
                    $this
                        .bind(touchMoveEvent, moveHandler)
                        .one(touchStopEvent, function(event) {
                            $this.unbind(touchMoveEvent, moveHandler);
                            if (start && stop) {
                                if (stop.time - start.time < 1000 &&
                                    Math.abs(start.coords[1] - stop.coords[1]) > 30 &&
                                    Math.abs(start.coords[0] - stop.coords[0]) < 75) {
                                    start.origin
                                        .trigger("swipeupdown")
                                        .trigger(start.coords[1] > stop.coords[1] ? "swipeup" : "swipedown");
                                }
                            }
                            start = stop = undefined;
                        });
                });
            }
        };
        $.each({
            swipedown: "swipeupdown",
            swipeup: "swipeupdown"
        }, function(event, sourceEvent){
            $.event.special[event] = {
                setup: function(){
                    $(this).bind(sourceEvent, $.noop);
                }
            };
        });
    }

    $('section').on('swipedown',function(){
        event_swipe = 1;
        parallaxScroll(60);
        event_swipe = 2;
    });
    $('section').on('swipeup',function(){
        event_swipe = 0;
        parallaxScroll(60);
        event_swipe = 2;
    });

    var event_swipe;

    if(is_touch_device() && $(window).width() > 767 && $(window).height() > 500){
        $('body').addClass('device-touch');
        $('section').swipe( { swipeStatus:swipe2, allowPageScroll:"vertical"});
        function swipe2(event, phase, direction, distance) {
            if(direction == 'up' && distance > 100){
                event_swipe = 0;
                parallaxScroll(60);
                event_swipe = 2;
            }else if(direction == 'down' && distance > 100){
                event_swipe = 1;
                parallaxScroll(60);
                event_swipe = 2;
            }else {

            }
        }
    }

    if(isIE()) {
        $('body').addClass('ie-r');
    }

    if($(window).width() < 767 || isIE() || $(window).height() < 500) {
        $('body').addClass('ie');
        $('.content-projects'), $('.content-clients'), $('.content-services'),  $('.content-contacts').removeClass('opacity');
    }else {
        $('#landing').addClass('background');
        $('#services').addClass('background');
        $('#clients').addClass('background');
        $('#projects').addClass('background');
        $('#contacts').addClass('background');
        var ticking = false;
        var isFirefox = (/Firefox/i.test(navigator.userAgent));
        var isIe = (/MSIE/i.test(navigator.userAgent)) || (/Trident.*rv\:11\./i.test(navigator.userAgent));
        var scrollSensitivitySetting = 30; //Increase/decrease this number to change sensitivity to trackpad gestures (up = less sensitive; down = more sensitive)
        var slideDurationSetting = 600; //Amount of time for which slide is "locked"
        var currentSlideNumber = 0;
        var totalSlideNumber = $(".background").length;

        // ------------- DETERMINE DELTA/SCROLL DIRECTION ------------- //
        function parallaxScroll(evt) {
            if (isFirefox) {
                //Set delta for Firefox
                delta = evt.detail * (-120);
            } else if (isIe) {
                //Set delta for IE
                delta = -evt.deltaY;
            } else {
                //Set delta for all other browsers
                delta = evt.wheelDelta;
            }

            if (ticking != true) {
                if (delta <= -scrollSensitivitySetting || event_swipe === 0) {
                    //Down scroll
                    ticking = true;
                    if (currentSlideNumber !== totalSlideNumber - 1 && currentSlideNumber !== 5) {
                        currentSlideNumber++;
                        nextItem();
                    } else if(currentSlideNumber === 4){
                        $('#contacts').addClass('background-footer');
                        currentSlideNumber++;
                    }
                    slideDurationTimeout(slideDurationSetting);
                }
                if (delta >= scrollSensitivitySetting || event_swipe === 1) {
                    //Up scroll
                    ticking = true;
                    if (currentSlideNumber !== 0 ) {
                        currentSlideNumber--;
                    }
                    previousItem();
                    slideDurationTimeout(slideDurationSetting);
                }
            }
            if (currentSlideNumber === 0 ) {
                $('.content-services').removeClass('opacity');
                $('body').removeClass('menu-white');
                $('#landing').addClass('reduce-duration');
                $('#services').removeClass('reduce-duration');
            }
            if (currentSlideNumber === 1 ) {
                opacity_content($('.content-services'), $('.content-clients'), $('.content-projects'), $('.content-contacts'));
                $('body').addClass('menu-white');
                $('#services').addClass('reduce-duration');
                $('#landing').removeClass('reduce-duration');
                $('#clients').removeClass('reduce-duration');
            }
            if (currentSlideNumber === 2 ) {
                opacity_content($('.content-projects'), $('.content-clients'), $('.content-services'),  $('.content-contacts'));
                $('#projects').addClass('reduce-duration');
                $('#clients').removeClass('reduce-duration');
                $('#contacts').removeClass('reduce-duration');
            }
            if (currentSlideNumber === 3 ) {
                opacity_content($('.content-clients'), $('.content-services'), $('.content-projects'), $('.content-contacts'));
                $('#clients').addClass('reduce-duration');
                $('#services').removeClass('reduce-duration');
                $('#projects').removeClass('reduce-duration');
            }
            if (currentSlideNumber === 4 ) {
                opacity_content($('.content-contacts'), $('.content-clients'), $('.content-services'), $('.content-projects'));
                $('#main-footer').css('z-index','-1');
                $('#contacts').addClass('reduce-duration');
                $('#projects').removeClass('reduce-duration');
            }
            if (currentSlideNumber > 4 ) {
                setTimeout(function(){
                    if (currentSlideNumber > 4 ) {
                        $('#main-footer').css('z-index','5');
                    }
                }, 1000);
            }
        }

        function opacity_content(x, y, z, t){
            setTimeout(function(){
                x.addClass('opacity');
            }, 700);
            y.removeClass('opacity');
            z.removeClass('opacity');
            t.removeClass('opacity');
        }

        // ------------- SET TIMEOUT TO TEMPORARILY "LOCK" SLIDES ------------- //
        function slideDurationTimeout(slideDuration) {
            setTimeout(function() {
                ticking = false;
            }, slideDuration);
        }

        // ------------- ADD EVENT LISTENER ------------- //
        var mousewheelEvent = isFirefox ? "DOMMouseScroll" : "wheel";
        window.addEventListener(mousewheelEvent, _.throttle(parallaxScroll, 60), false);

        // ------------- SLIDE MOTION ------------- //
        function nextItem() {
            var $previousSlide = $(".background").eq(currentSlideNumber - 1);
            $previousSlide.removeClass("up-scroll").addClass("down-scroll");
            $('.container-services').css('opacity','1');
        }

        function previousItem() {
            var $currentSlide = $(".background").eq(currentSlideNumber);
            $currentSlide.removeClass("down-scroll").addClass("up-scroll");
            $('#contacts').removeClass('background-footer');
        }

    }
});


function opacity(x, y, z, m, n, xo1, xo2, xo3, xo4, xo5) {
    x.css({'opacity': xo1});
    y.css({'opacity': xo2});
    z.css({'opacity': xo3});
    m.css({'opacity': xo4});
    n.css({'opacity': xo5});
}

$('.services-mobile').slick({
    dots: true,
    infinite: true,
    fade: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    arrow: false,
});


var title = '.title-service';

$(title).mouseover(function () {
    var divClass = $(this).attr('class');
    var num = divClass.substr(divClass.length - 1);
    $('#content-postservice .post-service').removeClass('fadeOut').removeClass('fadeIn').addClass('fadeOut');
    $('#content-postservice').find('.post-service' + num).removeClass('fadeOut').addClass('fadeIn');
});

$(title).mouseout(function () {
    $('.post-service').removeClass('fadeIn').addClass('fadeOut');
    $('#content-postservice').find('.active').removeClass('fadeOut').addClass('fadeIn');
});

