<!-- Content Wrapper -->
<div class="col-sm-8 content-wrapper">
  <div class="row">
    <div class="archive-search-box">
      <h2>Narrow Your Search:</h2>
      <ul class="list-tags">
      <?php
          $tags = get_tags();
          foreach ( $tags as $tag ) {
              $tag_link = get_tag_link( $tag->term_id );
              echo "<li><a href='{$tag_link}' title='{$tag->name}' class='{$tag->slug}'>{$tag->name}</a></li>";
          }
      ?>
      </ul>
    </div>
  </div>  <!-- row end -->

  <div class="row feed">

    <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 20,
        'paged' => $paged
      );
      $the_query = new WP_Query( $args );
    ?>
    <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <article class="post-box" itemscope itemtype="https://schema.org/Blog">
      <div class="thumbnail">
          <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
          <meta itemprop="image" content="<?php echo $url; ?>" />
          <a href="<?php the_permalink(); ?>">
            <figure class="feature-image">
              <img src="<?php the_field('square_featured_image'); ?>" alt="<?php the_title(); ?>">
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

  <?php else: ?>

  <article>
    <h1>Sorry...</h1>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  </article>

  <?php endif; ?>

  </div> <!-- row end -->

  <?php
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
