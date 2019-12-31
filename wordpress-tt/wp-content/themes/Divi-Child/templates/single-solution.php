<?php
/**
 * Created by Antking Pte Ltd.
 * User: Vu Nguyen
 * Date: 12/27/18
 * Time: 13:00
 *
 * Template Name: Single Solution
 * Template Post Type: solution
 **/

get_header(); 
$post_id = get_the_ID();
?>
<div id = "container-post-solution">
    <div class="content-post-solution">
        <?php while ( have_posts() ): the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
</div>

<?php
get_footer();
?>