$(function () {
    'use strict';
    $('.scroll-btn .scroll-bar a').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('#' + $(this).data('scroll')).offset().top
        },1200);
    });
});