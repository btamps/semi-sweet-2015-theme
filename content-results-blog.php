<!-- Content Wrapper -->
<div class="col-sm-8 content-wrapper">
  <div class="row">

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

  <div class="row feed">

  <?php while(have_posts()) : the_post(); ?>

    <article class="post-box" itemscope itemtype="https://schema.org/Blog">
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
          </div>
      </div>
    </article>

  <?php endwhile; ?>

  </div>  <!-- row end -->

  <?php
    global $the_query;

    $total_pages = $the_query->max_num_pages;

    if ($total_pages > 1){

      $big = 999999999; // need an unlikely integer

      echo '<div class="pagination-row">';
      echo '<div class="pagination-nav">';

      echo paginate_links( array(
      	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      	'format' => '?paged=%#%',
      	'current' => max( 1, get_query_var('paged') ),
      	'total' => $the_query->max_num_pages,
        'prev_text' => __('Prev'),
      	'next_text' => __('Next'),
        'mid_size' => 1
      ) );

      echo '</div>';
      echo '</div>';
    }
  ?>
</div> <!-- content-wrapper end -->
