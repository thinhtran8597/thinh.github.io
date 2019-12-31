<?php
/**
 * Created by Antking Pte Ltd.
 * User: Vu Nguyen
 * Date: 12/27/18
 * Time: 13:00
 *
 * Template Name: Single Service
 * Template Post Type: services
 **/

get_header(); 
$post_id = get_the_ID();
?>
<div id = "container-post-service">
    <div class="content-post-service">
        <?php while ( have_posts() ): the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
</div>

<?php
get_footer();
?>