 <!-- Sidebar Wrapper -->
        <div class="col-sm-4 sidebar"> 
          <div class="row">
            <div class="wrapper-bg newsletter">
              <div class="inner">
                <h3>Join the Newsletter</h3>  
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
              <h3>Categories</h3>
              <ul class="list-category">
                <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                  $cat_link = get_category_link( $category->term_id );
                  echo "<li><a href='{$cat_link}' title='{$category->name} Tag' class='{$category->slug}'>{$category->name}</a></li>";
                }
                ?>
                 <?php //wp_list_categories(); ?>
              </ul>
            </div>

            <div class="wrapper-bg sidebar-post-box">
              <h3>Tags</h3>
              <ul class="list-tags">
                <?php
                $tags = get_tags();
                foreach ( $tags as $tag ) {
                  $tag_link = get_tag_link( $tag->term_id );
                  echo "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>{$tag->name}</a></li>";
                }
                ?>
              </ul>
            </div>
          </div>
          
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