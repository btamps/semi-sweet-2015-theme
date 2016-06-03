<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

<div class="container-fluid content-box">
  <div class="row">
    <?php if ( is_search() ) {
      //put your search results markup here (you can copy some code from archive-product.php file and also from content-product.php to create a standard markup
        get_template_part( 'content', 'main-products' );

      } else {
        get_template_part( 'content', 'results-blog' );
        get_sidebar( 'archive' );
      }
    ?>

  </div> <!-- row end -->
</div> <!-- content-box end -->

<?php get_footer(); ?>
