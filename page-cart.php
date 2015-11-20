<?php 
/*
 * Template Name: Cart Page
 * Description: Page template for woocommerce cart page
 */

get_header(); ?>
<!-- Blog Posts -->
<div class="container-fluid blog-box">
  <div class="row">

    <!-- Content Wrapper -->
    <div class="col-sm-8 content-wrapper">
      <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="col-md-12 post-wrapper">
        <header>
            <h1 itemprop="name"><?php the_title(); ?></h1>
        </header>
          <?php the_content(); ?>
          
        </article>
        <?php endwhile; else: ?>

          <p>There are no posts or pages here.</p>

        <?php endif; ?>

      </div>  <!-- row end -->
    </div> <!-- content-wrapper end -->

  </div> <!-- row end -->
</div> <!-- blog-box end -->

<?php get_footer(); ?>