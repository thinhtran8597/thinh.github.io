<?php
/**
 * Created by Antking Pte Ltd.
 * User: Vu Nguyen
 * Date: 10/1/18
 * Time: 13:00
 *
 * Template Name: Single Work
 * Template Post Type: works
 **/

get_header(); 
$post_id = get_the_ID();
?>
<div class = "container-post">
    <div class="header-work">
    <?php $imgheader = get_post_meta( get_the_ID(), 'wpcf-header-work', true); ?>
    <div style="background-image:url(<?php echo $imgheader ?>)" class="skew-header">
    </div>
    </div>
    <div class="title-post-work">
        <?php if ( has_category() ) { ?>
                <div class="categories">
                <h3><?php custom_get_cate_work(); ?></h3>
                <h1 class="title"><?php echo get_the_title() ?></h1>
                </div>
			<?php } ?>
    </div>
    <div class="content-post">
        <?php while ( have_posts() ): the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        
        <h2>MORE PROJECT</h2>
        <div class = "more-project">
        <?php echo works_posts($post_id) ?>
        </div>
        <div class="inner-back"><a href="/work"><h4 class="back-project">Back to All Projects</h4></a></div>

    </div>
</div>

<?php
get_footer();
?>