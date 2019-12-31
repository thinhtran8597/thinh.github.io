<?php
/**
 * Created by Antking Pte Ltd.
 * User: Son Do
 * Date: 9/27/18
 * Time: 10:29
 */


add_shortcode( 'blog', 'get_blog_post' );
function get_blog_post() {
	if ( function_exists( 'types_render_field' ) ) {
		$blogArgs = array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'order'          => 'DESC',
			'posts_per_page' => - 1,
		);

		$html   = '';
		$index  = 1;
		$order  = 1;
		$events = new WP_Query( $blogArgs );
		if ( $events->have_posts() ):
			while ( $events->have_posts() ): $events->the_post();

				$color_1 = types_render_field( 'blog-color-1', [ 'output' => 'raw' ] );
				$color_1 = str_replace( '#', '', $color_1 );
				$color_1 = hex2RGB( $color_1 );
				$color_2 = types_render_field( 'blog-color-2', [ 'output' => 'raw' ] );
				$color_2 = str_replace( '#', '', $color_2 );
				$color_2 = hex2RGB( $color_2 );
				$html .= '<div class="blog_post blog_' . $order . ' blog_style_' . $index . '" >'
				. '<a href="' . get_permalink() . '">'
				. '<div class="content">'
				. '<p class="date">' . get_the_date( 'd F Y' ) . '</p>'
				. '<p class="title">' . get_the_title() . '</p>'
				. '<div class="read-more">'
				. '<img src="' . get_stylesheet_directory_uri() . '/images/read-more.png" />'
				. '</div>'
				. '</div>'
				. '</a>'
				. '<div class="hover-line"></div>'
				. '</div>'
				. '<style>'
				. '.blog_' . $order . ':after{background-image: url(' . get_the_post_thumbnail_url() . ');}'
				. '.blog_' . $order . ':before{'
				. 'background: rgba(' . $color_1["r"] . ' , ' . $color_1["g"] . ' , ' . $color_1["b"] . ', .61);'
				. 'background: -moz-linear-gradient(top, rgba(' . $color_1["r"] . ', ' . $color_1["g"] . ', ' . $color_1["b"] . ', .61) 0%, rgba(' . $color_2["r"] . ', ' . $color_2["g"] . ', ' . $color_2["b"] . ', .61) 100%);'
				. 'background: -webkit-linear-gradient(top, rgba(' . $color_1["r"] . ', ' . $color_1["g"] . ', ' . $color_1["b"] . ', .61) 0%, rgba(' . $color_2["r"] . ', ' . $color_2["g"] . ', ' . $color_2["b"] . ', .61) 100%);'
				. 'background: linear-gradient(to bottom, rgba(' . $color_1["r"] . ', ' . $color_1["g"] . ', ' . $color_1["b"] . ', .61) 0%, rgba(' . $color_2["r"] . ', ' . $color_2["g"] . ', ' . $color_2["b"] . ', .61) 100%);'
				. 'filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'' . types_render_field( 'blog-color-1', [] ) . '\', endColorstr=\'' . types_render_field( 'blog-color-2', [] ) . '\', GradientType=0);'
				. '}'
				. '</style >';
				$index ++;
				$order ++;
				if ( $index === 6 ) {
					$index = 1;
				} 
			endwhile;

			return $html;
		endif;
	}
}

function custom_get_cate() {
	$html  = '';
	$i     = 0;
	$cates = get_the_category();
	$ind   = count( $cates );
	foreach ( $cates as $category ) {
		$i ++;
		$category_link = get_category_link( $category->cat_ID );
		$html          .= '<a href="' . $category_link . '">' . $category->cat_name;
		if ( $i < $ind and $ind > 1 ) {
			$html .= ', </a>';
		} else {
			$html .= '</a>';
		}
	}
	echo $html;
}

function hex2RGB( $hex ) {
	preg_match( "/^#{0,1}([0-9a-f]{1,6})$/i", $hex, $match );
	if ( ! isset( $match[1] ) ) {
		return false;
	}

	if ( strlen( $match[1] ) == 6 ) {
		list( $r, $g, $b ) = array( $hex[0] . $hex[1], $hex[2] . $hex[3], $hex[4] . $hex[5] );
	} elseif ( strlen( $match[1] ) == 3 ) {
		list( $r, $g, $b ) = array( $hex[0] . $hex[0], $hex[1] . $hex[1], $hex[2] . $hex[2] );
	} else if ( strlen( $match[1] ) == 2 ) {
		list( $r, $g, $b ) = array( $hex[0] . $hex[1], $hex[0] . $hex[1], $hex[0] . $hex[1] );
	} else if ( strlen( $match[1] ) == 1 ) {
		list( $r, $g, $b ) = array( $hex . $hex, $hex . $hex, $hex . $hex );
	} else {
		return false;
	}

	$color      = array();
	$color['r'] = hexdec( $r );
	$color['g'] = hexdec( $g );
	$color['b'] = hexdec( $b );

	return $color;
}