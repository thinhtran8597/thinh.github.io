<?php
/**
 * Created by Antking Pte Ltd.
 * User: Son Do
 * Date: 8/28/18
 * Time: 15:50
 */

function get_link_all() {
	echo $link = types_render_field( 'link-all', [] );
}

add_shortcode( 'services', 'services_slider' );
function services_slider() {
	if ( function_exists( 'types_render_field' ) ) {
		$eventArgs = array(
			'post_type'     => 'services',
			'post_status'   => 'publish',
			'post_per_page' => - 1
		);

		$string = '';
		$index  = 1;
		$events = new WP_Query( $eventArgs );
		if ( $events->have_posts() ):
			while ( $events->have_posts() ): $events->the_post();
				$string .= '<div class="title-service title-service' . $index . '">' . get_the_title() . '</div>';
				$index ++;
			endwhile;
			echo $string;
		endif;
	}
}

add_shortcode( 'content_postservices', 'content_services' );
function content_services() {
	if ( function_exists( 'types_render_field' ) ) {
		$sevicesArgs = array(
			'post_type'     => 'services',
			'post_status'   => 'publish',
			'post_per_page' => - 1
		);

		$string   = '';
		$index    = 1;
		$services = new WP_Query( $sevicesArgs );
		if ( $services->have_posts() ):
			while ( $services->have_posts() ): $services->the_post();
				$string .= '<div class="post-service animated post-service' . $index . '"> 
						<div class="thumbnail-service thumbnail-service' . $index . '">' . get_the_post_thumbnail() . '</div> 
						<div class="content-service content-service' . $index . '"> <p>' . get_the_content() . '</p> </div> </div>';
				$index ++;
			endwhile;
			echo $string;
		endif;
	}
}

add_shortcode( 'clients', 'clients_slider' );
function clients_slider() {
	if ( function_exists( 'types_render_field' ) ) {
		$clientArgs = array(
			'post_type'     => 'clients',
			'post_status'   => 'publish',
			'post_per_page' => - 1
		);

		$string  = '';
		$index   = 1;
		$index1  = 1;
		$slider  = '';
		$clients = new WP_Query( $clientArgs );

		if ( $clients->have_posts() ):
			while ( $clients->have_posts() ): $clients->the_post();
				$string .= '<div class="thumbnail-client thumbnail-client' . $index . '">' . get_the_post_thumbnail() . '</div>' ;
				if ( $index % 2 === 0 ) {
					$slider .= '<div class="inner-clients inner-clients' . $index1 . '">' . $string . '</div>';
					$index1 ++;
					$string = '';
				}
				$index ++;

			endwhile;
			echo $slider;
		endif;
	}
}

add_shortcode( 'project', 'content_projects' );
function content_projects() {
	if ( function_exists( 'types_render_field' ) ) {
		$projectsArgs = array(
			'post_type'      => 'works',
			'post_status'    => 'publish',
			'posts_per_page' => 3,
			'order_by'       => 'date',
			'order'          => 'ASC'
		);

		$string   = '';
		$return   = '';
		$number   = 1;
		$index    = 1;
		$x        = 1;
		$projects = new WP_Query( $projectsArgs );
		if ( $projects->have_posts() ):
			while ( $projects->have_posts() ): $projects->the_post();
				$string .= '<div class="thumbnail-projects projects-image' . $index . '  thumbnail-projects' . $x . '">
			<a href="' . get_permalink() . '">
			<div class="effect-projects effect-projects' . $index . '"></div>
			<div class="scale-projects scale-projects' . $index . '"></div>
			<h2>' . get_the_title() . '</h2>
			<img src="./wp-content/themes/Divi-Child/images/view-project.png" alt=""></a></div> 
			<style>
			.projects-image' . $index . '::after {
				background-image: url(' . get_the_post_thumbnail_url() . ');
			</style>
			';
				if ( $index % 3 === 0 ) {
					$return .= '<div class="inner-projects inner-projects' . $number . '">' . $string . '</div>';
					$number ++;
					$string = '';
					$x      = 0;
				}
				$index ++;
				$x ++;
			endwhile;
			echo $return;
		endif;
	}
}

add_shortcode( 'works', 'content_works' );
function content_works() {
	if ( function_exists( 'types_render_field' ) ) {
		$worksArgs = array(
			'post_type'     => 'works',
			'post_status'   => 'publish',
			'post_per_page' => - 1,
			'order_by'      => 'date',
			'order'         => 'ASC'

		);

		$string = '';
		$return = '';
		$number = 1;
		$index  = 1;
		$x      = 1;
		$works  = new WP_Query( $worksArgs );
		if ( $works->have_posts() ):
			while ( $works->have_posts() ): $works->the_post();
				$string .= '<div class="thumbnail-works thumbnail-image' . $index . '  thumbnail-works' . $x . '">
			<a href="' . get_permalink() . '"><div class="effect-works effect-works' . $index . '"></div>
			<div class="scale-works scale-works' . $index . '"></div>
			<h2>' . get_the_title() . '</h2>
			<img src="../wp-content/themes/Divi-Child/images/view-project-work.png" alt=""></a></div> 
			<style>
			.thumbnail-image' . $index . '::after {
				background-image: url(' . get_the_post_thumbnail_url() . ');
			</style>
			';
				if ( $index % 5 === 0) {
					$return .= '<div class="inner-works inner-works' . $number . '">' . $string . '</div>';
					$number ++;
					$string = '';
					$x      = 0;
				}
				$index ++;
				$x ++;
			endwhile;
			$index = $index - 1;
			if($index % 5 != 0){
				if($index % 5 === 1){
					$return .= '<div class="inner-works inner-one-post inner-works' . $number . '">' . $string . '</div>';
				}else if($index % 5 === 2){
					$return .= '<div class="inner-works inner-two-post inner-works' . $number . '">' . $string . '</div>';
				}else if($index % 5 === 4){
					$return .= '<div class="inner-works inner-four-post inner-works' . $number . '">' . $string . '</div>';
				}else{
					$return .= '<div class="inner-works inner-works' . $number . '">' . $string . '</div>';
				}
			}
			echo $return;
		endif;
	}
}

add_shortcode( 'works_post', 'works_posts' );
function works_posts( $id = null ) {
	if ( function_exists( 'types_render_field' ) ) {
		$clientArgs = array(
			'post_type'      => 'works',
			'post_status'    => 'publish',
			'posts_per_page' => 2,
			// 'showposts'=> 2,
			'post__not_in'   => array( $id ),
		);

		$string  = '';
		$index   = 1;
		$clients = new WP_Query( $clientArgs );
		// var_dump($clients);
		if ( $clients->have_posts() ) {
			while ( $clients->have_posts() ): $clients->the_post();
				$string .= '  <div class="thumbnail-postworks thumbnail-imgpost' . $index . '">
			<a href="' . get_permalink() . '"><div class="effect-postworks effect-postworks' . $index . '"></div>
			<div class="scale-postworks scale-postworks' . $index . '"></div>
			<h2>' . get_the_title() . '</h2>
			<img src="../../wp-content/themes/Divi-Child/images/view-project-work.png" alt=""></a></div> 
			<style>
			.thumbnail-imgpost' . $index . ' {
				background-image: url(' . get_the_post_thumbnail_url() . ');
			}
			</style>';
				$index ++;
			endwhile;
			echo $string;
		}
	}
}

function custom_get_cate_work() {
	$html  = '';
	$cates = get_the_category();
	foreach ( $cates as $category ) {
		$category_link = get_category_link( $category->cat_ID );
		$html          .= '<a href="' . $category_link . '">' . $category->cat_name . '</a>';
		break;
	}
	echo $html;
}


add_shortcode( 'page_services', 'content_page_services' );
function content_page_services() {
	$return = '';
	if ( function_exists( 'types_render_field' ) ) {
		$servicesArgs = array(
			'post_type'     => 'services',
			'post_status'   => 'publish',
			'post_per_page' => - 1,
			'order_by'      => 'date',
			'order'         => 'ASC'

		);

		$string = '';
		$number = 1;
		$index  = 1;
		$x      = 1;
		$services  = new WP_Query( $servicesArgs );
		if ( $services->have_posts() ):
			while ( $services->have_posts() ): $services->the_post();
				$frame = get_post_meta( get_the_ID(), 'wpcf-frame-service', true);
				$string .= '<div class="thumbnail-services thumbnail-image' . $index . '  thumbnail-services' . $x . '">
			<a><div class="effect-services effect-services' . $index . '"></div>
			<div class="scale-services scale-services' . $index . '"></div>
			<h2>' . get_the_title() . '</h2>
			</a></div> 
			<style>
			.thumbnail-image' . $index . '::after {
				background-image: url('. $frame .');
			}
			</style>
			';
				if ( $index % 5 === 0) {
					$return .= '<div class="inner-services inner-services' . $number . '">' . $string . '</div>';
					$number ++;
					$string = '';
					$x      = 0;
				}
				$index ++;
				$x ++;
			endwhile;
			$index = $index - 1;
			if($index % 5 != 0){
				if($index % 5 === 1){
					$return .= '<div class="inner-services inner-one-post inner-services' . $number . '">' . $string . '</div>';
				}else if($index % 5 === 2){
					$return .= '<div class="inner-services inner-two-post inner-services' . $number . '">' . $string . '</div>';
				}else if($index % 5 === 4){
					$return .= '<div class="inner-services inner-four-post inner-services' . $number . '">' . $string . '</div>';
				}else{
					$return .= '<div class="inner-services inner-services' . $number . '">' . $string . '</div>';
				}
			};
		endif;
	}
	return $return;
}

add_shortcode( 'page_solutions', 'content_page_solutions' );
function content_page_solutions() {
	$return = '';
	if ( function_exists( 'types_render_field' ) ) {
		$solutionsArgs = array(
			'post_type'     => 'solution',
			'post_status'   => 'publish',
			'post_per_page' => - 1,
			'order_by'      => 'date',
			'order'         => 'ASC'

		);

		$string = '';
		$number = 1;
		$index  = 1;
		$x      = 1;
		$solutions  = new WP_Query( $solutionsArgs );
		if ( $solutions->have_posts() ):
			while ( $solutions->have_posts() ): $solutions->the_post();
				$string .= '<div class="thumbnail-solutions thumbnail-image' . $index . '  thumbnail-solutions' . $x . '">
			<a><div class="effect-solutions effect-solutions' . $index . '"></div>
			<div class="scale-solutions scale-solutions' . $index . '"></div>
			<h2>' . get_the_title() . '</h2>
			</a></div> 
			<style>
			.thumbnail-image' . $index . '::after {
				background-image: url(' . get_the_post_thumbnail_url() . ');
			}
			</style>
			';
				if ( $index % 5 === 0) {
					$return .= '<div class="inner-solutions inner-solutions' . $number . '">' . $string . '</div>';
					$number ++;
					$string = '';
					$x      = 0;
				}
				$index ++;
				$x ++;
			endwhile;
			$index = $index - 1;
			if($index % 5 != 0){
				if($index % 5 === 1){
					$return .= '<div class="inner-solutions inner-one-post inner-solutions' . $number . '">' . $string . '</div>';
				}else if($index % 5 === 2){
					$return .= '<div class="inner-solutions inner-two-post inner-solutions' . $number . '">' . $string . '</div>';
				}else if($index % 5 === 4){
					$return .= '<div class="inner-solutions inner-four-post inner-solutions' . $number . '">' . $string . '</div>';
				}else{
					$return .= '<div class="inner-solutions inner-solutions' . $number . '">' . $string . '</div>';
				}
			};
		endif;
	}
	return $return;
}

add_shortcode( 'content_solutions', 'the_content_solutions' );
function the_content_solutions() {
	$return = '';
	$string = '';
	if ( function_exists( 'types_render_field' ) ) {
		$solutionsArgs = array(
			'post_type'     => 'solution',
			'post_status'   => 'publish',
			'post_per_page' => - 1,
			'order_by'      => 'date',
			'order'         => 'ASC'

		);

		$number = 1;
		$index  = 1;
		$x      = 1;
		$solutions  = new WP_Query( $solutionsArgs );
		if ( $solutions->have_posts() ):
			while ( $solutions->have_posts() ): $solutions->the_post();
				$string .= '<div class="content">' . the_content() . '</div>';
	
			endwhile;
		endif;
	}
	return $string;
}


add_shortcode( 'content_services', 'the_content_services' );
function the_content_services() {
	$return = '';
	$string = '';
	if ( function_exists( 'types_render_field' ) ) {
		$servicesArgs = array(
			'post_type'     => 'services',
			'post_status'   => 'publish',
			'post_per_page' => - 1,
			'order_by'      => 'date',
			'order'         => 'ASC'

		);

		$number = 1;
		$index  = 1;
		$x      = 1;
		$services  = new WP_Query( $servicesArgs );
		if ( $services->have_posts() ):
			while ( $services->have_posts() ): $services->the_post();
				$string .= '<div class="content">' . the_content() . '</div>';
	
			endwhile;
		endif;
	}
	return $string;
}

add_shortcode( 'content_contacts', 'the_content_contacts' );
function the_content_contacts() {
    $string = '';
    if ( function_exists( 'types_render_field' ) ) {
        $contactArgs = array(
            'post_type'     => 'contacts',
            'post_status'   => 'publish',
            'post_per_page' => - 1,
            'order_by'      => 'date',
            'order'         => 'ASC'

        );

        $contacts  = new WP_Query( $contactArgs );
        if ( $contacts->have_posts() ):
            while ( $contacts->have_posts() ): $contacts->the_post();
                $string .= '<div class="content-contact">' . the_content() . '</div>';

            endwhile;
        endif;
    }
    return $string;
}
