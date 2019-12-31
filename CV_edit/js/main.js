$(function () {
    'use strict';
    $('.navbar-nav li a').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('#' + $(this).data('scroll')).offset().top
        },1200);
    });
    $('.scroll-btn').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('#' + $(this).data('scroll')).offset().top
        },1200);
    });
    $(window).on('scroll', function(event) {
        if ($(this).scrollTop() > 600) { $('.back-to-top').fadeIn(200) } else { $('.back-to-top').fadeOut(200) }
    });

    $('.back-to-top').on('click', function(event) {
        event.preventDefault();

        $('html, body').animate({ scrollTop: 0, }, 0.25 * $(window).scrollTop());
    });
    $('.navbar-toggler').on('click', function(event) {

        $('.navbar-collapse').addClass('nav_');
    });

    $(window).on('resize', function () {
        // if($('.navbar-collapse')[0].classList.contains("nav_")){
        //     $('.navbar-collapse').toggleClass('nav_');
        // }
        if($('.navbar-collapse')[0].classList.contains("show")){
            $('.navbar-collapse').removeClass("nav_");
        }
        console.log($('.navbar-expand-lg .navbar-toggler').attr("display"))
    })

    var before = $(window).width();
    $(window).resize(function () {
        var after = $(this).width();
        if (after != before) {
            $('#navbarNav').removeClass('show');
            $('button.navbar-toggler').addClass('collapsed');
        }
    });
});