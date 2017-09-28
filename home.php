<?php
/*
Template Name: My Blog
*/
?>
<?php get_header(); ?>
<!-- Blog Posts -->
<div class="container-fluid content-box">
  <div class="row">

    <!-- Content Wrapper -->
    <div class="col-sm-8 content-wrapper">
      <div class="row feed">

        <?php
          $query_args = array(
          'posts_per_page' => 20
          );
          $query = new WP_Query( $query_args );
          $query->the_post();
          $recent_post_ID = $post->ID; // this is your most recent post ID

          if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
        <?php if ($post->ID == $recent_post_ID) : ?>

        <!-- Single out the most-recent post -->
        <article class="most-recent post-box" itemscope itemtype="https://schema.org/Blog">
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

        <?php else : ?>

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

      <?php endif; ?>

      <?php endwhile; ?>

      </div>  <!-- row end -->
        <?php
          $total_pages = $query->max_num_pages;

          if ($total_pages > 1){

            $big = 999999999; // need an unlikely integer

            echo '<div class="pagination-row">';
            echo '<div class="pagination-nav">';

            echo paginate_links( array(
            	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            	'format' => '?paged=%#%',
            	'current' => max( 1, get_query_var('paged') ),
            	'total' => $query->max_num_pages,
              'prev_text' => __('Prev'),
            	'next_text' => __('Next'),
              'mid_size' => 1
            ) );

            echo '</div>';
            echo '</div>';
          }
        ?>

        <?php else: ?>

          <p>There are no posts or pages here.</p>

        <?php endif; ?>
    </div> <!-- content-wrapper end -->

    <?php get_sidebar( 'home' ); ?>

  </div> <!-- row end -->
</div> <!-- blog-box end -->

<?php get_footer(); ?>
