<?php
/*
Template Name: Search Page
*/

get_header(); ?>

<div class="row">
  <div id="content-body">
    <!-- Main Content -->
    <section id="main-content">

<!-- Start Loop  -->
<?php
  $args = array( 'numberposts' => '1' );
  $recent_posts = wp_get_recent_posts( $args );
  $latest_post_id=$recent_posts[0]['ID'];

  if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
      <?php if ($post->ID == $latest_post_id) : ?>
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
      <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
      <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
<?php else: ?>

  <p>There are no posts or pages here.</p>

<?php endif; ?>

    </section><!-- Main Content End -->

    <?php get_sidebar(); ?>

  </div>
</div>



<?php get_footer(); ?>
