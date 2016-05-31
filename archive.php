<?php

/*
	Template Name: Archive Page

*/
get_header(); ?>

<div class="container-fluid blog-box">
  <div class="row">

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

      <h2 class="recent-result">Recent posts:</h2>
      <?php
        $current_cat = single_cat_title("", false);
        echo "<h2 class='cat-result'>Category: “{$current_cat}”</h2>";
      ?>
      <?php
        $current_tag = single_tag_title("", false);
        echo "<h2 class='tag-result'>All posts tagged with: “{$current_tag}”</h2>";
      ?>

      <?php

      	if($pagename == 'archive') {
          // default page state
          // showtop 20 posts here...
          query_posts('posts_per_page=20');
        }

      ?>
      </div>
      <div class="row">
      <?php while(have_posts()) : the_post(); ?>

        <article class="col-md-6 post-box" itemscope itemtype="http://schema.org/Blog">
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
                <p><?php echo wp_trim_words( get_the_content(), 24, '...' ); ?></p>
                <p>
                  <a href="<?php the_permalink(); ?>" Class="btn btn-more">Read More &raquo;</a>
                </p>
              </div>
          </div>
        </article>

      <?php endwhile; ?>
      <?php
        if ($pagename !== 'archive') {

          global $wp_query;

          $total_pages = $wp_query->max_num_pages;

          if ($total_pages > 1){

            $current_page = max(1, get_query_var('paged'));

            echo '<div class="page_nav">';

            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text' => 'Newer <em>Posts</em>',
                'next_text' => 'Older <em>Posts</em>'
              ));

            echo '</div>';

          }
        }
       ?>
      </div>  <!-- row end -->
    </div> <!-- content-wrapper end -->

    <?php get_sidebar( 'archive' ); ?>

  </div> <!-- row end -->
</div> <!-- blog-box end -->

<?php get_footer(); ?>
