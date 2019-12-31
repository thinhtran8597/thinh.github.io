<?php
/**
 * Created by Antking Pte Ltd.
 * User: Son Do
 * Date: 9/27/18
 * Time: 16:03
 *
 * Template Name: Single Blog
 * Template Post Type: post
 **/

get_header();

$color_1 = types_render_field( 'blog-color-1', [ 'output' => 'raw' ] );
$color_1 = str_replace( '#', '', $color_1 );
$color_1 = hex2RGB( $color_1 );
$color_2 = types_render_field( 'blog-color-2', [ 'output' => 'raw' ] );
$color_2 = str_replace( '#', '', $color_2 );
$color_2 = hex2RGB( $color_2 );

?>
    <style>
        .entry-header:after {
            background-image: url('<?php echo get_the_post_thumbnail_url() ?>');
        }

        .entry-header:before {
            background: rgba(<?php echo $color_1['r'] ?>, <?php echo $color_1['g'] ?>, <?php echo $color_1['b'] ?>, .61);
            background: -moz-linear-gradient(top, rgba(<?php echo $color_1['r'] ?>, <?php echo $color_1['g'] ?>, <?php echo $color_1['b'] ?>, .61) 0%, rgba(<?php echo $color_2['r'] ?>, <?php echo $color_2['g'] ?>, <?php echo $color_2['b'] ?>, .61) 100%);
            background: -webkit-linear-gradient(top, rgba(<?php echo $color_1['r'] ?>, <?php echo $color_1['g'] ?>, <?php echo $color_1['b'] ?>, .61) 0%, rgba(<?php echo $color_2['r'] ?>, <?php echo $color_2['g'] ?>, <?php echo $color_2['b'] ?>, .61) 100%);
            background: linear-gradient(to bottom, rgba(<?php echo $color_1['r'] ?>, <?php echo $color_1['g'] ?>, <?php echo $color_1['b'] ?>, .61) 0%, rgba(<?php echo $color_2['r'] ?>, <?php echo $color_2['g'] ?>, <?php echo $color_2['b'] ?>, .61) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo types_render_field( 'blog-color-1', [] ); ?>', endColorstr='<?php echo types_render_field( 'blog-color-2', [] ); ?>', GradientType=0);
        }
    </style>
    <div id="main-content">
        <div class="entry-header et_pb_row">
            <div class="back-btn">
                <a href="/blog"></a>
            </div>
        </div>
        <div class="entry-content et_pb_row">
            <div class="title-post">
                <p class="date"><?php echo get_the_date( 'd F Y' ) ?></p>
                <h1 class="title"><?php echo get_the_title() ?></h1>
            </div>
            <div class="content-post">
				<?php while ( have_posts() ): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
            </div>
        </div>
        <div class="entry-footer et_pb_row">
			<?php if ( has_category() ) { ?>
                <div class="categories">
                    <p>Article Categories:</p>
                    <div class="list-cates">
						<?php custom_get_cate() ?>
                    </div>
                </div>
			<?php } ?>
        </div>
    </div> <!-- #main-content -->

<?php get_footer();