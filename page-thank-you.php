<?php
/*
Template Name: Thank Page
*/
get_header(); ?>

<!-- Blog Posts -->
<div class="container-fluid content-box">
  <div class="row">

    <!-- Content Wrapper -->
    <div class="col-sm-8 content-wrapper">
      <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="col-md-12 post-wrapper">
        <header>
            <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
            <meta itemprop="image" content="<?php echo $url; ?>" />
            <figure class="feature-image">
              <?php the_post_thumbnail(); ?>
            </figure>
            <h1 itemprop="name">
              Thank You!
            </h1>
        </header>
            <p>Your message has been sent. I’ll be in touch soon.</p>

        </article>
        <?php endwhile; else: ?>

          <p>There are no posts or pages here.</p>

        <?php endif; ?>

      </div>  <!-- row end -->
    </div> <!-- content-wrapper end -->

    <?php get_sidebar(); ?>

  </div> <!-- row end -->
</div> <!-- blog-box end -->

<?php get_footer(); ?>
