$(document).ready(function () {
    load_more();
    scroll_logo();
    new_tab();

    if($('body').hasClass('page-solutions') || $('body').hasClass('page-service') ){
        $('body').addClass('page-solution-service');
    }

    scrollTop_id ($('.thumbnail-services1'),$('.page-service .entry-content .et-boc:nth-child(1)'));
    scrollTop_id ($('.thumbnail-services2'),$('.page-service .entry-content .et-boc:nth-child(2)'));
    scrollTop_id ($('.thumbnail-services3'),$('.page-service .entry-content .et-boc:nth-child(3)'));
    scrollTop_id ($('.thumbnail-services4'),$('.page-service .entry-content .et-boc:nth-child(4)'));

    scrollTop_id ($('.thumbnail-solutions1'),$('.page-solutions .entry-content .et-boc:nth-child(1)'));
    scrollTop_id ($('.thumbnail-solutions2'),$('.page-solutions .entry-content .et-boc:nth-child(2)'));
    scrollTop_id ($('.thumbnail-solutions3'),$('.page-solutions .entry-content .et-boc:nth-child(3)'));
    scrollTop_id ($('.thumbnail-solutions4'),$('.page-solutions .entry-content .et-boc:nth-child(4)'));

    if($(window).width() < 767){
        scrollTop_height( $('.link-element1'), 0);
        scrollTop_height( $('.link-element2'), 0);
        scrollTop_height( $('.link-element3'), 542);
        scrollTop_height( $('.link-element4'), 542);
    }else{
        scrollTop_height( $('.link-top'), 0);
    }

});

function load_more() {
    $('.blog_post').slice(5).show().addClass('hidden');
    var postHidden = ".blog_post.hidden";
    var btnLoad = $('#load-btn');

    if ($(postHidden).length !== 0) {
        btnLoad.show();
    } else {
        btnLoad.hide();
    }

    btnLoad.on('click', function (e) {
        e.preventDefault();
        var count = 1;
        $('.blog_post.hidden').each(function () {
            if (count > 5) {
                return false;
            }
            $(this).removeClass('hidden');
            count++
        });
        if ($(postHidden).length === 0) {
            btnLoad.fadeOut('slow');
        }
    });
};

function scroll_logo() {
    if (window.matchMedia('(max-width: 980px)').matches) {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            var header = $('header .logo').height();
            if (scroll > header) {
                $("#page-container").addClass("scrollDown");
            } else {
                $("#page-container").removeClass("scrollDown");
            }
        });
    }
}

function new_tab() {
    $("a[href^='http'], a[href^='https']").not('[target="_blank"]').on('click', function (e) {
        var href = $(this).attr('href');
        var currentSite = window.location.hostname;
        if (href.indexOf(currentSite) == -1) {
            e.preventDefault();
            window.open(href, '_blank');
        }
    });
}

function none_element(){
    $('.page-solution-service .entry-content .et-boc:nth-child(1)').css('display','none');
    $('.page-solution-service .entry-content .et-boc:nth-child(2)').css('display','none');
    $('.page-solution-service .entry-content .et-boc:nth-child(3)').css('display','none');
    $('.page-solution-service .entry-content .et-boc:nth-child(4)').css('display','none');
    $('.page-solution-service .entry-content .et-boc:nth-last-child(1)').css('display','block');
}

function scrollTop_id (x, y){
    x.click(function () {
        none_element();
        y.css('display','block');
            $('html, body').animate({
                scrollTop: y.offset().top
                }, 1000);
    });
}

function scrollTop_height(x, y){
    x.click(function () {
        $('html, body').animate({
            scrollTop: $('body').offset().top + y
            }, 1000);
            setTimeout(function(){ 
                none_element();
            }, 1000);
    });
}

var antwalk1 = $('#ant-walk1');
var x = 0;

var antwalk2 = $('#ant-walk2');
var y = -2;

var antwalk3 = $('#ant-walk3');
var z = -3;

var antwalk4 = $('#ant-walk4');
var k = -4;

if($('body').hasClass('page-home')){
    var animate1 = setInterval(frame1, 8000);
    var animate2 = setInterval(frame2, 8000);
    var animate3 = setInterval(frame3, 8000);
    var animate4 = setInterval(frame4, 8000);
}

var ant_services = [
    { id: 1, target:'right', x:1460, y:60, action:'', html_id: "#ant-services1", speed: 3 }

    ,{id: 2, target:'right', x:1160, y:60, action:'', html_id: "#ant-services2", speed: 3 }

    ,{ id: 3,  target:'left', x:500, y:60, action:'', html_id: "#ant-services3", speed: 3 }

    ,{ id: 4, target:'left', x:900, y:60, action:'', html_id: "#ant-services4", speed: 4 }
];

var ant_clients = [
    { id: 1, target:'right', x:1360, y:60,action:'', html_id: "#ant-client1", speed: 3}

    ,{ id: 2, target:'left', x:1360, y:60, action:'', html_id: "#ant-client2", speed: 4 }

    ,{ id: 3, target:'left', x:400, y:60, action:'', html_id: "#ant-client3", speed: 3}

    ,{ id: 4, target:'left', x:1000, y:60, action:'', html_id: "#ant-client4",speed: 4}
];

var ant_contacts = [

];


var ant_2017= [
    { id: 1, target:'right', x:100, y:-150, action:'', html_id: "#ant-2018-1", speed: 3}
    ,{ id: 1, target:'right', x:30, y:-150, action:'', html_id: "#ant-2018-2", speed: 5}

    ,{ id: 1, target:'right', x:0, y:-125, action:'', html_id: "#ant-2017-1", speed: 4}
    ,{ id: 1, target:'right', x:50, y:-125, action:'', html_id: "#ant-2017-2", speed: 3}
    ,{ id: 1, target:'right', x:20, y:-125, action:'', html_id: "#ant-2017-3", speed: 5}

    ,{ id: 2, target:'left', x:50, y:-150, action:'', html_id: "#ant-2016-1", speed: 3}

    ,{ id: 1, target:'right', x:50, y:-150, action:'', html_id: "#ant-2015-1", speed: 5}
    ,{ id: 1, target:'right', x:200, y:-150, action:'', html_id: "#ant-2015-2", speed: 4}

    ,{ id: 2, target:'left', x:200, y:-55, action:'', html_id: "#ant-2014-1", speed: 3}
    ,{ id: 2, target:'left', x:0, y:-55, action:'', html_id: "#ant-2014-2", speed: 4}

    ,{ id: 1, target:'right', x:100, y:-90, action:'', html_id: "#ant-2013-1", speed: 4}
    ,{ id: 1, target:'right', x:70, y:-90, action:'', html_id: "#ant-2013-2", speed: 3}
    ,{ id: 1, target:'right', x:200, y:-90, action:'', html_id: "#ant-2013-3", speed: 3}

    ,{ id: 2, target:'left', x:10, y:-120, action:'', html_id: "#ant-2012-1", speed: 3}
];
    
    $(function() {
        setInterval (function(){
            updateAntObj();
            showObj();
        }, 100);
    });

    if($(window).width() > 767){
        loop_add_Obj(10, 1500, 460, 200, 10);
    }

    function frame1() {
        if (x < 4) {
            x++;
            antwalk1.css('animation-name', 'ant-walk' + x);
        } else {
            x = -1;
        }
    }
    
    function frame2() {
        if (y < 4) {
            y++;
            antwalk2.css('animation-name', 'ant-walk' + y);
        } else {
            y = -1;
        }
    }

    
    function frame3() {
        if (z < 4) {
            z++;
            antwalk3.css('animation-name', 'ant-walk' + z);
        } else {
            z = -1;
        }
    }

    function frame4() {
        if (k < 4) {
            k++;
            antwalk4.css('animation-name', 'ant-walk' + k);
        } else {
            k = -1;
        }
    }
    
    function add_moreObj(obj, id_obj, target_obj, x_obj, y_obj, html_id_obj, speed_obj, askew_obj){
        obj.push({
            id: id_obj, target: target_obj, x: x_obj,  y: y_obj, action:'',  html_id: html_id_obj,  speed: speed_obj, askew: askew_obj});
    }

    function loop_add_Obj(loop, max_x, min_x, max_y, min_y ){
        var i = 0;
        var check;
        var target_obj;
        var askew_obj;
        var images = $('#ant-walk1').attr('src');
        for (i = 1; i <= loop; i++) { 
            var html_id_obj = 'ant-contact' + i;
            $("#contacts .contacts").append('<img id ='+ html_id_obj +' class="ant-move" src ="'+images+'"></img>');
            var id_obj = i;
            check = Math.floor((Math.random() * 2) + 1);
            if(check === 1){
                target_obj = 'left';
                askew_obj ='up';
            }else{
                target_obj = 'right';
                askew_obj ='down';
            }
            var x_obj = Math.random() * (max_x - min_x + 1) + min_x;
            var y_obj = Math.random() * (max_y - min_y + 1) + min_y;
            var speed_obj = Math.floor((Math.random() * 5) + 3);
            html_id_obj = '#ant-contact' + i;
            add_moreObj(ant_contacts, id_obj, target_obj, x_obj, y_obj, html_id_obj, speed_obj, askew_obj);  
        }
    }
    
    var hw = window.innerHeight;
    
    function updateAntObj() {
        var ww = window.innerWidth - 70;
        if(ww>1361){
            if($('body').hasClass('page-home')){
                forEach_UpdateObj(ant_services, 1460, 280);
                forEach_UpdateObj(ant_clients, 1360, 280);
                forEach_UpdateObj(ant_contacts, 1500, 280);
            }
            if($('body').hasClass('page-about')){
                forEach_UpdateObj(ant_2017, 400, -20);
            }
        }else {
            if($('body').hasClass('page-home')){
                forEach_UpdateObj(ant_services, ww, 0);
                forEach_UpdateObj(ant_clients, ww, 0);
                forEach_UpdateObj(ant_contacts, ww, 0);
            }
            if (window.innerWidth > 767){
                if($('body').hasClass('page-about')){
                    forEach_UpdateObj(ant_2017, 350, -20);
                }
            }
        }
    }

    function showObj() {
        forEach_ShowObj(ant_services);
        forEach_ShowObj(ant_clients);
        forEach_ShowObj(ant_contacts);
        if (window.innerWidth > 767){
            forEach_ShowObj(ant_2017);
        }
    }

    function forEach_UpdateObj(Obj, max, min){
        Object.keys(Obj).forEach(function(key) {
            var value = Obj[key];
            if(value.x < min){
                value.target = 'left';
            } 
            if(value.x > max){
                value.target = 'right';
            } 

            if(value.target =='right'){
                value.x -= value.speed;
                $(value.html_id + ' ').css('transform', 'rotateY(0deg)');
            }else if(value.target =='left'){
                value.x += value.speed;
                $(value.html_id + ' ').css('transform', 'rotateY(180deg)');
            }

            if(value.id > 2){
                if(value.y>150){
                    value.askew = 'down';
                }
                if(value.y<10){
                    value.askew = 'up';
                }
                if(value.askew =='down'){
                    value.y -= 0.5;
                }else if(value.askew =='up'){
                    value.y += 0.5;
                }
            }
        });
    }

    function forEach_ShowObj(Obj){
        Object.keys(Obj).forEach(function(key) {
            Object.keys(Obj).forEach(function(key) {
                var value = Obj[key];
                $(value.html_id + ' ').css('left', value.x +'px');
                $(value.html_id + ' ').css('bottom', value.y +'px');
            });
        });
    }