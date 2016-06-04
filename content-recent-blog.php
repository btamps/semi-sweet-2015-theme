<div class="recent-blog-box">
  <div class="container-fluid content-box">
    <div class="row">
      <h2 class="title"><span>Fresh From the Blog</span></h2>
      <?php
      global $post;
      $args = array( 'posts_per_page' => 3 );
      $myposts = get_posts( $args );
      foreach ( $myposts as $post ) :
        setup_postdata( $post ); ?>

      <!-- Recent Posts -->
      <div class="col-sm-6 col-md-3">
        <a class="thumbnail"href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail(); ?>
          <div class="caption">
            <span class="date"><?php echo get_the_date( 'M j, Y' ); ?></span>
            <h3><?php the_title(); ?></h3>
          </div>
        </a>
      </div>
      <?php endforeach; wp_reset_postdata(); ?>

      <div class="ad-column-block col-sm-6 col-md-3">
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- Bottom Side Bar -->
              <ins class="adsbygoogle"
              style="display:inline-block;width:300px;height:250px"
              data-ad-client="ca-pub-3606452520556010"
              data-ad-slot="9689893130"></ins>
          <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
      </div>
    </div>
    <p><a href="/blog" class="btn btn-more">See All Posts</a></p>
  </div>
</div>
