
function myFunction(x) {
    x.classList.toggle("change");
}

jQuery(document).ready(function ($) {
    $('.icon-open').click(function () {
        if($('.icon-open').hasClass('opennav')) {
            $('#myNav').css('display', 'block');
            $('#myNav').css('width', '100%');
            $('.icon-open').addClass('closebtn');
            $('.icon-open').removeClass('opennav');
            $('body').addClass('body-overflow');
            $('#myNav .overlay-content .menu').removeClass('opacity-animate');
            $('#myNav .overlay-content .menu').addClass('opacity-animate1');
            setTimeout(function () {
                $('.bar').css('background-color', 'white');
                $('.icon-open p').css('display', 'none');
            }, 500);
        }else {
            $('#myNav .overlay-content .menu').removeClass('opacity-animate1');
            $('#myNav .overlay-content .menu').addClass('opacity-animate');
            $('.icon-open').addClass('opennav');
            $('.icon-open').removeClass('closebtn');
            $('body').removeClass('body-overflow');
            setTimeout(function () {
                $('#myNav').css('width', '0%');
                $('.bar').css('background-color', 'black');
                $('.icon-open p').css('display', 'block');
            }, 500);
            setTimeout(function () {
                $('#myNav').css('display', 'none');
            }, 1000);
        }
    });

        var number = 1;
        if($(".page-work .inner-works").length === number){
            $(".load-more").css('display','none');
        }
        $(".load-more").click(function () {
            number ++;
            $(".page-work .inner-works"+ number).css('display', 'flex');
            if($(".page-work .inner-works").length === number){
                $(".load-more").css('display','none');
            }
        });

        $('.logo-contact span').addClass('animated tada');
        if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
            $('body').addClass('ios');
        }

        setTimeout(function(){ 
            $(".header-logo img").removeClass("tada");
        }, 1000);
        $(".header-logo img").hover(function(){
            $(".header-logo img").css("animation-iteration-count", "infinite");
            $(".header-logo img").addClass("tada");
            }, function(){
            $(".header-logo img").removeClass("tada");
        });

        setTimeout(function(){ 
            $('.effect-tada').css('visibility', 'hidden');
        }, 1800);
        setInterval(function(){ 
            $('.effect-tada').css('visibility', 'visible');
            setTimeout(function(){ 
                $('.effect-tada').css('visibility', 'hidden');
            }, 1800);
        }, 4000);

        function isIE() {
            var ua = navigator.userAgent;
            /* MSIE used to detect old browsers and Trident used to newer ones*/
            var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
            return is_ie; 
        }

        if(isIE()) { 
            $('body').addClass('ie-r');
        }

    $('#menu-top-menu>li').mouseenter(function() {
        $(this).find('.sub-menu').css('display', 'block');
        $(this).mouseleave(function() {
            $(this).find('.sub-menu').css('display', 'none');
        });
    });

    $(window).scroll(function() {

        var x = document.getElementsByClassName("logo");
        var hlogo = $('header.container > .logo').height();

        if ($(this).scrollTop() > hlogo ) {
            x[0].style.backgroundColor = "#fffbeb";
            x[0].style.paddingTop = "15px";
            $('.page-head-scrolled').css('top', hlogo + 40 + 'px');
        } else {
            x[0].style.backgroundColor = "#fefded00";
            x[0].style.paddingTop = "30px";
        }
    });

});

