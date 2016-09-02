<?php

/*
	Template Name: Archive Page

*/
get_header(); ?>

<div class="container-fluid content-box">
  <div class="row">
    <?php
      if ($pagename === 'archive') {
        // archive page
        get_template_part( 'content', 'archive-blog' );
      } else {
        // results page
        get_template_part( 'content', 'results-blog' );
      }
    ?>


    <?php get_sidebar( 'archive' ); ?>

  </div> <!-- row end -->
</div> <!-- blog-box end -->

<?php get_footer(); ?>
