 <!-- Sidebar Wrapper -->
        <div class="col-sm-4 sidebar"> 
          <div class="row">
            <div class="wrapper-bg newsletter">
              <div class="inner">
                <h3>Subcribe to the Newsletter</h3>  
                <h4>Get new blog &amp; new cookie cutter updates delivered to your inbox.</h4>
                <form action="//semisweetdesigns.us12.list-manage.com/subscribe/post?u=fe76ad92bdd35d5808d870eb6&amp;id=d48439dd50" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" novalidate>
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email Address">
                  </div>
                  <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn"><i class="fa fa-envelope"></i></button>
                </form>
              </div>
            </div>
          </div>  
          <div class="row">
            <div class="wrapper-bg sidebar-post-box">
              <div class="search-box">
                <form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <div>
                    <label class="sr-only" for="search">Search Blog</label>
                    <input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search Blog" />
                    <button type="submit" id="searchsubmit" class="btn"><i class="fa fa-search"></i></button>
                    <p class="archive-message">Or visit the <a href="archive">archive</a></p>
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
            'posts_per_page' => 5
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
          
          <?php get_template_part( 'google', 'ad' ); ?>

          <div class="row">
            <div class="wrapper-bg sidebar-post-box">
              <h3>Featured Posts</h3>
               <?php
                $args = array(
                  'post_type' => 'post',
                  'category_name' => 'featured'
                );
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
          <div class="row">
            <div class="ad-300x250 two">
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

          <div class="row">
            <div class="wrapper-bg sidebar-post-box">
              <h3>Getting Started</h3>
               <?php
                $args = array(
                  'post_type' => 'post',
                  'category_name' => 'the-basics'
                );
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

          <div class="row">
            <div class="ad-300x250 three">
              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <!-- 3rd bottom ad -->
              <ins class="adsbygoogle"
                   style="display:inline-block;width:300px;height:250px"
                   data-ad-client="ca-pub-3606452520556010"
                   data-ad-slot="1841391533"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
            </div>
          </div> <!-- row end -->

        </div> <!-- sidebar end -->