<div class="row">
    <div class="wrapper-bg sidebar-post-box">
      <h3>Fresh Posts</h3>
        <?php

            if ( is_home() ) {
              $args = array(
                'post_type' => 'post',
                'offset' => 1,
                'posts_per_page' => 5
              );
            } else {
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'post__not_in' => array($post->ID)
              );
            }

            $the_query = new WP_Query( $args );

        ?>
        <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <article class="sidebar-post">
            <a href="<?php the_permalink(); ?>" class="thumb">
                <?php the_post_thumbnail(); ?>
                <div class="sidebar-post-body">
                    <h4 class="sidebar-post-heading"><?php the_title(); ?></h4>
                </div>
            </a>
        </article>

        <?php endwhile; endif; ?>

    </div> <!-- sidebar-post-box end -->
</div> <!-- row end -->
