<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

<div class="container-fluid content-box">
  <div class="row">
    <?php
      $classes = get_body_class();
      if (in_array('archive',$classes)) {
        // shop results
        get_template_part( 'content', 'main-products' );
      } else {
        // blog results
        get_template_part( 'content', 'results-blog' );
        get_sidebar( 'archive' );
      }
    ?>
  </div> <!-- row end -->
</div> <!-- content-box end -->

<?php get_footer(); ?>
