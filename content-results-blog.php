<!-- Content Wrapper -->
<div class="col-sm-8 content-wrapper">
  <div class="row">
  <div class="archive-search-box">
    <h1>Search Archive</h1>

    <form role="search" method="get" class="search-form archive-search-bar" action="<?php echo home_url(); ?>">
      <label for="search-input"><i class="fa fa-search"></i></label>
      <input type="search" id="search-input" class="form-control search-field" placeholder="Search all posts" value="" name="s" title="Search" />
    </form>
  </div>

  <h2 class="page-title">
    <?php printf( __( 'Search Results for: “%s”', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?>
  </h2>
  <?php
    $current_cat = single_cat_title("", false);
    echo "<h2 class='cat-result'>Category: “{$current_cat}”</h2>";
  ?>
  <?php
    $current_tag = single_tag_title("", false);
    echo "<h2 class='tag-result'>All posts tagged with: “{$current_tag}”</h2>";
  ?>
  </div>
  <div class="row">
  <?php

    if($pagename == 'archive') {
      // default page state
      // showtop 20 posts here...
      query_posts('posts_per_page=>-1');
    }

  ?>
  <?php while(have_posts()) : the_post(); ?>

    <article class="col-md-12 post-box" itemscope itemtype="https://schema.org/Blog">
      <div class="thumbnail">
          <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
          <meta itemprop="image" content="<?php echo $url; ?>" />
          <a href="<?php the_permalink(); ?>">
            <figure class="feature-image">
              <?php the_post_thumbnail(); ?>
            </figure>
          </a>
          <div class="caption">
            <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date( 'M j, Y' ); ?></a>
            <h2 itemprop="name">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></p>
            <p>
              <a href="<?php the_permalink(); ?>" Class="btn btn-more">Read More &raquo;</a>
            </p>
          </div>
      </div>
    </article>

  <?php endwhile; ?>
  </div>  <!-- row end -->
</div> <!-- content-wrapper end -->
