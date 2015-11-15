<?php
/*
Template Name: My Blog
*/
?>
<?php get_header(); ?>
<!-- Blog Posts -->
<div class="container-fluid blog-box">
  <div class="row">

    <!-- Content Wrapper -->
    <div class="col-sm-8 content-wrapper">
      <div class="row">
      
        <?php
          $query_args = array(
          'showposts'     => 1 // here you can add limit by categry etc
          );
          $query = new WP_Query( $query_args );
          $query->the_post();
          $recent_post_ID = $post->ID; // this is your most recent post ID

          if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
        <?php if ($post->ID == $recent_post_ID) : ?>

        <article class="col-md-12 post-wrapper" itemscope itemtype="http://schema.org/Blog">
          <header>
            <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
            <meta itemprop="image" content="<?php echo $url; ?>" />
            <figure href="" class="feature-image">
              <?php the_post_thumbnail(); ?>
            </figure>
            <h1 itemprop="name">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h1>
            <p>By <a href="">Mike Tamplin</a> on <?php echo get_the_date( 'M j, Y' ); ?></p>
            <p class="comment-count"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
          </header>
          <?php the_content(); ?>     
        </article>
        
        <?php else : ?>

          <article class="col-md-12 post-wrapper" itemscope itemtype="http://schema.org/Blog">
          <header>
            <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
            <meta itemprop="image" content="<?php echo $url; ?>" />
            <figure href="" class="feature-image">
              <?php the_post_thumbnail(); ?>
            </figure>
            <h1 itemprop="name">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h1>
            <p>By <a href="">Mike Tamplin</a> on <?php echo get_the_date( 'M j, Y' ); ?></p>
            <p class="comment-count"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
          </header>
          <?php the_content(); ?>     
        </article>

      <?php endif; ?>

      <?php endwhile; ?>

      <?php
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
       ?>

<?php else: ?>

  <p>There are no posts or pages here.</p>

<?php endif; ?>

      </div>  <!-- row end -->
    </div> <!-- content-wrapper end -->

    <?php get_sidebar(); ?>

  </div> <!-- row end -->
</div> <!-- blog-box end -->

<?php get_footer(); ?>