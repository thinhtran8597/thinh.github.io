<?php
/**
 * Created by Antking Pte Ltd.
 * User: Son Do
 * Date: 8/24/18
 * Time: 14:06
 */

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles()
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() . '/css/library/bootstrap.min.css');
    wp_enqueue_style('lineicons-style', "https://cdn.lineicons.com/1.0.1/LineIcons.min.css");
    wp_enqueue_style('magnific-popup-style', get_stylesheet_directory_uri() . '/css/library/magnific-popup.css');
    wp_enqueue_style('default-style', get_stylesheet_directory_uri() . '/css/library/default.css');
    wp_enqueue_style('css-style', get_stylesheet_directory_uri() . '/css/library/style.css');
}

add_action( 'wp_footer', 'my_theme_enqueue_scripts' );
function my_theme_enqueue_scripts() {
	wp_enqueue_script( 'jquery-3.3.1', get_stylesheet_directory_uri() . '/js/library/jquery-3.3.1.min.js' );
    wp_enqueue_script( 'modernizr-js', get_stylesheet_directory_uri() . '/js/modernizr-3.6.0.min.js' );
    wp_enqueue_script( 'jquery-js', get_stylesheet_directory_uri() . '/js/jquery-1.12.4.min.js' );
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js' );
    wp_enqueue_script( 'popper-js', get_stylesheet_directory_uri() . '/js/popper.min.js' );
    wp_enqueue_script( 'magnific-popup-js', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.min.js' );
    wp_enqueue_script( 'parallax-js', get_stylesheet_directory_uri() . '/js/parallax.min.js' );
    wp_enqueue_script( 'waypoints-js', get_stylesheet_directory_uri() . '/js/waypoints.min.js' );
    wp_enqueue_script( 'counterup-js', get_stylesheet_directory_uri() . '/js/jquery.counterup.min.js' );
    wp_enqueue_script( 'ajax-contact-js', get_stylesheet_directory_uri() . '/js/ajax-contact.js' );
    wp_enqueue_script( 'appear-js', get_stylesheet_directory_uri() . '/js/jquery.appear.min.js' );
    wp_enqueue_script( 'scrolling-nav-js', get_stylesheet_directory_uri() . '/js/scrolling-nav.js' );
    wp_enqueue_script( 'easing-js', get_stylesheet_directory_uri() . '/js/jquery.easing.min.js' );
    wp_enqueue_script( 'validator-js', get_stylesheet_directory_uri() . '/js/validator.min.js' );
    wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js' );
}

function add_css_pagehome() {
	wp_enqueue_style( 'pagehome-style', get_stylesheet_directory_uri() . '/css/style-pagehome.css' );
}
add_action( 'css_pagehome', 'add_css_pagehome' );


function add_css_pageworks() {
	wp_enqueue_style( 'pageworksstyle', get_stylesheet_directory_uri() . '/css/style-pageworks.css' );
}
add_action( 'css_pageworks', 'add_css_pageworks' );



