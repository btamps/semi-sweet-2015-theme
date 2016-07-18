<div class="row">
    <div class="wrapper-bg sidebar-post-box">
        <div class="search-box">
            <p class="archive-message"><a href="archive">Visit Archive</a></p>
            <form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div>
                    <label class="sr-only" for="search">Search Blog</label>
                    <input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search Blog" />
                    <button type="submit" id="searchsubmit" class="btn"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>

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
