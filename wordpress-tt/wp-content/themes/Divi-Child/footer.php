
<?php
/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */

do_action('et_after_main_content');

if ('on' == et_get_option('divi_back_to_top', 'false')) : ?>

    <span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif; ?>
</div>

<footer id="main-footer" class="footer-area">
    <div class="footer-widget pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="footer-content text-center">
                        <a href="index.html">
                            <img src="<?php echo get_post_meta(get_the_ID(), 'wpcf-logo', true); ?>" alt="Logo">
                        </a>
                        <p class="mt-"><?php $obj = get_post_type_object('enter-footer');
	                        echo $obj->description; ?></p>
                        <ul>
                            <li><a href="#"><i class="<?php echo get_post_meta(get_the_ID(), 'wpcf-icon', true); ?>"></i></a></li>
                            <li><a href="#"><i class="<?php echo get_post_meta(get_the_ID(), 'wpcf-icon-work1', true); ?>"></i></a></li>
                            <li><a href="#"><i class="<?php echo get_post_meta(get_the_ID(), 'wpcf-icon-work2', true); ?>"></i></a></li>
                            <li><a href="#"><i class="<?php echo get_post_meta(get_the_ID(), 'wpcf-icon4', true); ?>"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text text-center pt-20">
                        <p>Copyright © 2022. All rights reserved by You!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    <!-- #et-main-area -->

<?php wp_footer(); ?>
</body>
</html>
