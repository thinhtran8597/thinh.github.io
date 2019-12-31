<?php

/**
 * Template Name: Home Template
 * Created by Antking Pte Ltd.
 * User: Vu Nguyen
 * Date: 9/10/18
 * Time: 9:00
 */

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());
?>


<div id="parallax" class="header-content d-flex align-items-center">
    <div class="header-shape shape-one layer" data-depth="0.10">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape1', true); ?>" alt="Shape">
    </div>
    <div class="header-shape shape-tow layer" data-depth="0.30">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape2', true); ?>" alt="Shape">
    </div>
    <div class="header-shape shape-three layer" data-depth="0.40">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape3', true); ?>" alt="Shape">
    </div>
    <div class="header-shape shape-fore layer" data-depth="0.60">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape2', true); ?>" alt="Shape">
    </div>
    <div class="header-shape shape-five layer" data-depth="0.20">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape1', true); ?>" alt="Shape">
    </div>
    <div class="header-shape shape-six layer" data-depth="0.15">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape4', true); ?>" alt="Shape">
    </div>
    <div class="header-shape shape-seven layer" data-depth="0.50">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape5', true); ?>" alt="Shape">
    </div>
    <div class="header-shape shape-eight layer" data-depth="0.40">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape3', true); ?>" alt="Shape">
    </div>
    <div class="header-shape shape-nine layer" data-depth="0.20">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape6', true); ?>" alt="Shape">
    </div>
    <div class="header-shape shape-ten layer" data-depth="0.30">
        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-shape3', true); ?>" alt="Shape">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6">
                <div class="header-content-right">
                    <h4 class="sub-title">Hello, I’m</h4>
                    <h1 class="title"><?php echo get_post_meta(get_the_ID(), 'wpcf-enter-name', true); ?></h1>
                    <p> Web Developer</p>
                    <a class="main-btn" href="#work">View my Work</a>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-1">
                <div class="header-image d-none d-lg-block">
                    <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-avatar-img', true); ?>" alt="hero">
                </div>
            </div>
        </div>
    </div>
</div>

<section id="about" class="about-area pt-125 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2 class="title"><?php echo get_post_meta(get_the_ID(), 'wpcf-about-me', true); ?></h2>
                    <p><?php echo get_post_meta(get_the_ID(), 'wpcf-describe-about', true); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content mt-50">
                    <h5 class="about-title"><?php echo get_post_meta(get_the_ID(), 'wpcf-hi-there', true); ?></h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'wpcf-describe-hi-there', true); ?></p>
                    <ul class="clearfix">
                        <li>
                            <div class="single-info d-flex align-items-center">
                                <div class="info-icon">
                                    <i class="lni-calendar"></i>
                                </div>
                                <div class="info-text">
                                    <p>
                                        <span>Date of birth:</span> <?php echo get_post_meta(get_the_ID(), 'wpcf-birth-date', true); ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="single-info d-flex align-items-center">
                                <div class="info-icon">
                                    <i class="lni-envelope"></i>
                                </div>
                                <div class="info-text">
                                    <p>
                                        <span>Email:</span> <?php echo get_post_meta(get_the_ID(), 'wpcf-email', true); ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="single-info d-flex align-items-center">
                                <div class="info-icon">
                                    <i class="lni-phone-handset"></i>
                                </div>
                                <div class="info-text">
                                    <p>
                                        <span>Phone:</span> <?php echo get_post_meta(get_the_ID(), 'wpcf-phone', true); ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="single-info d-flex align-items-center">
                                <div class="info-icon">
                                    <i class="lni-map-marker"></i>
                                </div>
                                <div class="info-text">
                                    <p>
                                        <span>Location:</span> <?php echo get_post_meta(get_the_ID(), 'wpcf-location', true); ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-lg-6">
                <div class="about-skills pt-25">
                    <?php $getposts = new WP_query();
                    $getposts->query('post_status=publish&showposts=5&post_type=skill'); ?>
                    <?php global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title"><?php the_title(); ?></h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter"><?php echo get_post_meta(get_the_ID(), 'wpcf-enter-percent', true); ?></span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line"
                                         data-width="<?php echo get_post_meta(get_the_ID(), 'wpcf-enter-percent', true); ?>"></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="service" class="services-area gray-bg pt-125 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center pb-30">
                    <h2 class="title">My Services</h2>
                    <p><?php $obj = get_post_type_object('service');
                        echo $obj->description; ?></p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php $getposts = new WP_query();
            $getposts->query('post_status=publish&showposts=10&post_type=service'); ?>
            <?php global $wp_query;
            $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="<?php echo get_post_meta(get_the_ID(), 'wpcf-icon', true); ?>"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><?php the_title(); ?></a></h4>
                            <p><?php echo get_post_meta(get_the_ID(), 'wpcf-enter-description', true); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>


<section id="call-to-action" class="call-to-action pt-125 pb-130 bg_cover"
         style="background-image: url(../work/call-to-action.jpg)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9">
                <div class="call-action-content text-center">
                    <h2 class="action-title">Have any project on mind?</h2>
                    <p><?php echo get_post_meta(get_the_ID(), 'wpcf-have-any-project', true); ?></p>
                    <ul>
                        <li><a class="main-btn custom" href="#">download cv</a></li>
                        <li><a class="main-btn custom-2" href="#">hire me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="work" class="work-area pt-125 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title pb-25">
                    <h2 class="title">My Recent Works</h2>
                    <p><?php
                        $obj = get_post_type_object('work');
                        echo $obj->description;
                        ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $getposts = new WP_query();
            $getposts->query('post_status=publish&showposts=10&post_type=work'); ?>
            <?php global $wp_query;
            $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-work1', true); ?>" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup"
                                           href="<?php echo get_post_meta(get_the_ID(), 'wpcf-work1', true); ?>"><i
                                                    class="<?php echo get_post_meta(get_the_ID(), 'wpcf-icon-work1', true); ?>"></i></a>
                                    </li>
                                    <li><a href="#"><i
                                                    class="<?php echo get_post_meta(get_the_ID(), 'wpcf-icon-work2', true); ?>"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="work-more text-center mt-50">
                    <a class="main-btn" href="#">more works</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="pricing" class="pricing-area gray-bg pt-125 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center pb-25">
                    <h2 class="title">My Pricing Plans</h2>
                    <p><?php $obj = get_post_type_object('price');
	                    echo $obj->description; ?></p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
		    <?php $getposts = new WP_query();
		    $getposts->query('post_status=publish&showposts=10&post_type=price'); ?>
		    <?php global $wp_query;
		    $wp_query->in_the_loop = true; ?>
		    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
            <div class="col-lg-4 col-md-8 col-sm-9">
                <div class="single-pricing text-center mt-30">
                    <div class="pricing-package">
                        <h4 class="package-title"><?php the_title()?> </h4>
                    </div>
                    <div class="pricing-body">
                        <div class="pricing-text">
                            <p><?php echo get_post_meta(get_the_ID(), 'wpcf-description-table', true); ?></p>
                            <span class="price"><?php echo get_post_meta(get_the_ID(), 'wpcf-money-pay', true); ?></span>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li>Unlimited Tasks</li>
                                <li>Unlimited Public</li>
                                <li>Private Projects</li>
                                <li>Unlimited Teams</li>
                                <li>All Integrations</li>
                                <li>Public API</li>
                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a class="main-btn" href="#contact">get quote</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;
			    wp_reset_postdata(); ?>
        </div>
    </div>
</section>


<section id="blog" class="blog-area pt-125 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center pb-25">
                    <h2 class="title">From The Blog</h2>
                    <p><?php $obj = get_post_type_object('blogs');
	                    echo $obj->description; ?></p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
	        <?php $getposts = new WP_query();
	        $getposts->query('post_status=publish&showposts=10&post_type=blogs'); ?>
	        <?php global $wp_query;
	        $wp_query->in_the_loop = true; ?>
	        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
            <div class="col-lg-4 col-md-8 col-sm-9">
                <div class="single-blog mt-30">
                    <div class="blog-image">
                        <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-img-blog', true); ?>" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title"><a href="<?php echo get_post_meta(get_the_ID(), 'wpcf-link-blog1', true); ?>">Hired
                                Releases 2023 Brand Health.</a></h4>
                        <span>July 26, 2022</span>
                    </div>
                </div>
            </div>
	        <?php endwhile;
	        wp_reset_postdata(); ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-more text-center mt-50">
                    <a class="main-btn" href="#">More posts</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="contact-area pt-125 pb-130 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center pb-25">
                    <h2 class="title">Get In Touch</h2>
                    <p><?php $obj = get_post_type_object('touch');
	                    echo $obj->description; ?></p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
	        <?php $getposts = new WP_query();
	        $getposts->query('post_status=publish&showposts=10&post_type=touch'); ?>
	        <?php global $wp_query;
	        $wp_query->in_the_loop = true; ?>
	        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="contact-box text-center mt-30">
                    <div class="contact-icon">
                        <i class="<?php echo get_post_meta(get_the_ID(), 'wpcf-icon', true); ?>"></i>
                    </div>
                    <div class="contact-content">
                        <h6 class="contact-title"><?php the_title()?> </h6>
                        <p><?php echo get_post_meta(get_the_ID(), 'wpcf-location', true); ?></p>
                    </div>
                </div>
            </div>
	        <?php endwhile;
	        wp_reset_postdata(); ?>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-form pt-30">
                    <form id="contact-form" action="contact.php">
                        <div class="single-form">
                            <input type="text" name="name" placeholder="Name">
                        </div>
                        <div class="single-form">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="single-form">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <p class="form-message"></p>
                        <div class="single-form">
                            <button class="main-btn" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-map mt-60">
                    <div class="gmap_canvas">
                        <iframe id="gmap_canvas"
                                src="<?php echo get_post_meta(get_the_ID(), 'wpcf-map', true); ?>"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="header-social">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-social-icon">
                    <ul>
                        <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                        <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                        <li><a href="#"><i class="lni-behance-original"></i></a></li>
                        <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    <?php get_footer(); ?>
