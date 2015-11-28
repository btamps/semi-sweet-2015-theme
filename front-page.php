<?php
/*
Template Name: Front Page
*/
?>
<?php get_header(); ?>

<!-- Main jumbotron -->
    <div class="jumbotron">
      <div class="container-fluid">
        <div class="hero-message-box">
          <h4>New In Shop</h4>
          <h1>Cookie Cutters</h1>
          <p>The new shop is open for business! Check out all the new custom cookie cutter designs available now.</p>
          <p><a class="btn btn-primary btn-lg disabled" href="<?php bloginfo('url'); ?>/shop" role="button">Shop Now</a></p>
        </div>
      </div>
    </div>
    
    <!-- Blog Posts -->

    <div class="container-fluid blog-box">
      <div class="row">
        <h2 class="title"><span>Fresh From the Blog</span></h2>
        
        <?php
        global $post;
        $args = array( 'posts_per_page' => 1 );
        $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : 
          setup_postdata( $post ); ?>      

        <!-- First Post -->
        <div class="col-sm-6 col-md-12">
          <div class="thumbnail">
            <div class="first-post row">    
              <a href="<?php the_permalink(); ?>" class="first-post-image col-md-6">
                <?php the_post_thumbnail(); ?>
              </a>
              <div class="caption first-post-caption col-md-6">
                <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date( 'M j, Y' ); ?></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
              <p>
                <a href="<?php the_permalink(); ?>" Class="btn btn-more">Read More &raquo;</a>      
              </p>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; wp_reset_postdata(); ?>

        <?php
        global $post;
        $args = array( 'posts_per_page' => 3, 'offset'=> 1 );
        $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : 
          setup_postdata( $post ); ?>      

        <!-- Rest of Posts -->
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>
            <div class="caption">
              <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date( 'M j, Y' ); ?></a>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
            <p>
              <a href="<?php the_permalink(); ?>" class="btn btn-more">Read More &raquo;</a>      
            </p>
            </div>
          </div>
        </div>
        <?php endforeach; wp_reset_postdata(); ?>

      </div>
      <div class="row">
        <div class="col-sm-12">
          <a href="/blog" class="btn btn-default btn-block">All Posts &raquo;</a>
        </div>
      </div>
    </div>

    <div class="container-fluid basics">
      <div class="row">
        <h2 class="title"><span>Getting Started</span></h2>
        
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
              <a href="https://semisweetdesigns.com/2014/02/23/cookie-decorating-supplies-beginners/">                
                <img src="https://semisweetdesigns.com/wp-content/uploads/2014/09/cookie-decorating-supplies-title.jpg" alt="A Beginner’s Guide to Cookie Decorating Supplies">
              </a>
              <div class="caption">
                <h4><a href="https://semisweetdesigns.com/2014/02/23/cookie-decorating-supplies-beginners/">Tools</a></h4>
                <h3><a href="https://semisweetdesigns.com/2014/02/23/cookie-decorating-supplies-beginners/">A Beginner’s Guide to Cookie Decorating Supplies</a></h3>
              </div>
            </div>
          </div>

          <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
              <a href="https://semisweetdesigns.com/2013/10/03/updated-royal-icing-recipe/">                
                <img src="https://semisweetdesigns.com/wp-content/uploads/2014/08/royal-icing-recipe-title-new.jpg" alt="Royal Icing Recipe">
              </a>
              <div class="caption">
                <h4><a href="https://semisweetdesigns.com/2013/10/03/updated-royal-icing-recipe/">Icing</a></h4>
                <h3><a href="https://semisweetdesigns.com/2013/10/03/updated-royal-icing-recipe/">Royal Icing Recipe</a></h3>
              </div>
            </div>
          </div>

          <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
              <a href="https://semisweetdesigns.com/2013/09/08/updated-roll-out-sugar-cookie-recipe/">                
                <img src="https://semisweetdesigns.com/wp-content/uploads/2013/09/sugar_cookie_recipe-title.jpg" alt="Roll-Out Sugar Cookie Recipe">
              </a>
              <div class="caption">
                <h4><a href="https://semisweetdesigns.com/2013/09/08/updated-roll-out-sugar-cookie-recipe/">Dough</a></h4>
                <h3><a href="https://semisweetdesigns.com/2013/09/08/updated-roll-out-sugar-cookie-recipe/">Roll-Out Sugar Cookie Recipe</a></h3>
              </div>
            </div>
          </div>

      </div>
    </div>
<?php get_footer(); ?>
