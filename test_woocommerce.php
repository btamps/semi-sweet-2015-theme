<?php get_header(); ?>
<!-- Blog Posts -->
<div class="container-fluid blog-box">
  <div class="row">

    <!-- Content Wrapper -->
    <div class="col-sm-8 content-wrapper">
      <div class="row">
      	<article class="col-md-12 post-wrapper">
        <?php woocommerce_content(); ?>
		</article>
      </div>  <!-- row end -->
    </div> <!-- content-wrapper end -->

    <?php get_sidebar(); ?>

  </div> <!-- row end -->
</div> <!-- blog-box end -->

<?php get_footer(); ?>