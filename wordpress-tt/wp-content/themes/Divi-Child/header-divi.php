<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<?php
	elegant_description();
	elegant_keywords();
	elegant_canonical();

	/**
	 * Fires in the head, before {@see wp_head()} is called. This action can be used to
	 * insert elements into the beginning of the head before any styles or scripts.
	 *
	 * @since 1.0
	 */
	do_action( 'et_head_meta' );

	$template_directory_uri = get_template_directory_uri();
	$child_directory_uri = get_stylesheet_directory_uri();
	?>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
    
    <script type="text/javascript">
        document.documentElement.className = 'js';
    </script>


    <?php wp_head(); ?>
    <script src= "https://www.google.com/recaptcha/api.js" ></script>
</head>
<body <?php body_class(); ?>>
<?php
$product_tour_enabled = et_builder_is_product_tour_enabled();
$page_container_style = $product_tour_enabled ? ' style="padding-top: 0px;"' : ''; ?>
<div id="page-container"<?php echo $page_container_style; ?>>
    <header class="container">
        <div class="logo">
            <div id="header-logo" style="max-width: 1525px; margin: 0 auto">
				<?php
				$logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo
					? $user_logo
					: $template_directory_uri . '/images/logo-ant.png';

				ob_start();
				?>
                <a href="<?php echo get_site_url() ?>/home">
                    <img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                        id="logo"
                        data-height-percentage="<?php echo esc_attr( et_get_option( 'logo_height', '54' ) ); ?>"/>
                    <img class="full-logo" src="<?php echo $child_directory_uri ?>/images/logo-antking.png" alt="logo company antking">
                </a>
                <?php add_menu_top('default-menu'); ?>
                <div id="myNav" class="overlay">

                    <?php echo menu_header('menu header'); ?>


                </div>
                <div class="opennav icon-open turn-off" onclick="myFunction(this)">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                    <p>MENU</p>
                </div>
            </div>

    </header>

	<?php if ( is_page_template( 'templates/single-blog.php' ) ) { ?>
        <div class="header-logo">
<!--            <img class="animated" src="--><?php //echo $child_directory_uri ?><!--/images/blog-heading.png" alt="headerlogo">-->
        </div>
	<?php } else {
        $lgheader = get_post_meta( get_the_ID(), 'wpcf-header-logo', true );
        $title_h1 = get_post_meta( get_the_ID(), 'wpcf-title-h1', true );
		if ( ! empty( $lgheader ) ) { ?>
            <div class="header-logo ">
                <img class="animated tada" src=" <?php echo $lgheader ?>" alt="headerlogo">
                <?php if ( ! empty( $title_h1 ) ) { ?>
                        <h1 class = "title-h1"><?php echo $title_h1 ?></h1>
                <?php }?>
            </div>
        <?php } else if ( ! empty( $title_h1 ) ) { ?>
            <div class="header-logo ">
                <h1 class = "title-h1"><?php echo $title_h1 ?></h1>
            </div>
        <?php }
	} ?>


    <div id="et-main-area">

<?php
/**
 * Fires after the header, before the main content is output.
 *
 * @since 3.10
 */
do_action( 'et_before_main_content' );
