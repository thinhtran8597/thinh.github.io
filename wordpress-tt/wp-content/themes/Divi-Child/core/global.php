<?php
/**
 * Created by Antking Pte Ltd.
 * User: Vu Nguyen
 * Date: 9/10/18
 * Time: 9:10
 */

add_filter( 'et_project_posttype_args', 'remove_projects_post_type', 10, 1 );
function remove_projects_post_type( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	) );
}

/* Disable GG Fonts of Divi */
add_action( 'wp_enqueue_scripts', 'disable_divi_fonts', 20 );
function disable_divi_fonts() {
	wp_dequeue_style( 'divi-fonts' );
}

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	return $classes;
}

add_filter( 'body_class', 'add_slug_body_class' );

function nt80_menu_normal( $name ) {
	$html      = '';
	$menuItems = wp_get_nav_menu_items( $name );
	if ( is_array( $menuItems ) ) {
		$html .= '<ul class="menu">';
		foreach ( $menuItems as $index => $menuItem ) {
			$html .= '<li class="menu-item"><a href="' . $menuItem->url . '"><i class="icon-menu ' . $menuItem->post_name . '"></i></a></li>';
		}
		$html .= '</ul>';
	}

	return $html;
}

function menu_social( $name ) {
	$html      = '';
	$arrs = ['link','facebook'];
	$i = 0;
	$menuItems = wp_get_nav_menu_items( $name );
	if ( is_array( $menuItems ) ) {
		$html .= '<ul class="menu-social">';
		foreach ( $menuItems as $index => $menuItem ) {
			$html .= '<li class="menu-item"><a href="' . $menuItem->url . '"><div class="icon-menu ' . $arrs[$i] . '"></div></a></li>';
			$i++;
		}
		$html .= '</ul>';
	}

	return $html;
}

function menu_contact( $name ) {
	$html      = '';
	$arrs = ['email','phone'];
	$i = 0;
	$menuItems = wp_get_nav_menu_items( $name );
	if ( is_array( $menuItems ) ) {
		$html .= '<ul class="menu-contact">';
		foreach ( $menuItems as $index => $menuItem ) {
			$html .= '<li class="menu-item-contact"><a href="' . $menuItem->url . '"><div class="icon-contact ' . $arrs[$i]  . '"></div>
			<p>'.$menuItem->title.'</p>
			</a></li>';
			$i++;
		}
		$html .= '</ul>';
	}

	return $html;
}


if ( ! function_exists( 'create_header' ) ) {
	function create_header() { ?>
        <div class="site-name">
			<?php
			if ( is_home() ) {
				printf( '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
					get_bloginfo( 'url' ),
					get_bloginfo( 'description' ),
					get_bloginfo( 'sitename' ) );
			} else {
				printf( '<h5><a href="%1$s" title="%2$s">%3$s</a></h5>',
					get_bloginfo( 'url' ),
					get_bloginfo( 'description' ),
					get_bloginfo( 'sitename' ) );
			}
			?>
        </div>
		<?php

	}
}
register_nav_menu( 'primary-menu', __( 'Primary Menu', 'Divi' ) );
register_nav_menu( 'default-menu', __( 'Top Menu', 'Divi' ) );

if ( ! function_exists( 'add_menu_top' ) ) {
    function add_menu_top( $menu ) {
        $menu = array(
            'theme_location'  => $menu,
            'container'       => 'div',
            'container_class' => "menu-content",
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
        );
        wp_nav_menu( $menu );
    }
}

if ( ! function_exists( 'add_menu' ) ) {
	function add_menu( $menu ) {
		$menu = array(
			'theme_location'  => $menu,
			'container'       => 'div',
			'container_class' => "overlay-content",
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
		);
		wp_nav_menu( $menu );
	}
}

function menu_header( $menu_header ) {
	$html      = '';
	$menuItems = wp_get_nav_menu_items( $menu_header );
	if ( is_array( $menuItems ) ) {
		foreach ( $menuItems as $index => $menuItem ) {
            $html .= '<li class="nav-item"><a class="page-scroll" href="' . $menuItem->url . '">'.$menuItem->title.'</a></li>';
		}
	}
	return $html;
}

function menu_footer( $menu_footer ) {
    $html      = '';
    $menuItems = wp_get_nav_menu_items( $menu_footer );
    if ( is_array( $menuItems ) ) {
        foreach ( $menuItems as $index => $menuItem ) {
            $html .= '<li><a href="' . $menuItem->url . '"><i class="lni-facebook-filled"></i></a></li>';
        }
    }
    return $html;
}
