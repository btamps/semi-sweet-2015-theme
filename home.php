<?php get_header(); ?>

<div class="row">
  <div id="content-body">
    <!-- Main Content -->
    <section id="main-content">

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
      <article class="post">
        <header>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="subhead">
            <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date( 'M j, Y' ); ?></a>
            <div class="header-comments">
                <?php
                  comments_popup_link('<span class="comment-count">&nbsp;</span> No comments', '<span class="comment-count">1</span> Comment', '<span class="comment-count">%</span> Comments');
                ?>
              </div>
          </div>
        </header>

        <figure class="featured-image">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
        </figure>

          <?php the_content("Continue reading"); ?>

         <?php else : ?>
          <article class="post excerpt">
            <header>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <div class="subhead">
                <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date( 'M j, Y' ); ?></a>
                <div class="header-comments">
                    <?php
                      comments_popup_link('<span class="comment-count">&nbsp;</span> No comments', '<span class="comment-count">1</span> Comment', '<span class="comment-count">%</span> Comments');
                    ?>
                  </div>
              </div>
            </header>

            <figure class="featured-image">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
            </figure>
           <?php the_excerpt(); ?>
           <p><a href="<?php the_permalink(); ?>" class="more-link">Continue reading</a></p>

        <?php endif; ?>

      </article>
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

    </section>

    <?php get_sidebar(); ?>

  </div>
</div>



<?php get_footer(); ?>
