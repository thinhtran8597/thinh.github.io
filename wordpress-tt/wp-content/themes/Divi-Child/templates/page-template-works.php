<?php
/**
 * Template Name: Template Works
 * Created by Antking Pte Ltd.
 * User: Vu Nguyen
 * Date: 9/10/18
 * Time: 9:00
 */

// do_action( 'css_pagehome' );

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
?>
<h1 style="display:none" >Works</h1>
<div class="container-works">
<?php content_works() ?>
<div class = "load-more"> <h4>LOAD MORE</h4> </div>
</div> 

<?php

get_footer();
?>
