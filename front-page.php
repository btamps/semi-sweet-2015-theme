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
          <h4>Shop Now</h4>
          <h1>Cookie Cutters &amp; More</h1>
          <p>New cookie cutters are added weekly. Visit the shop and check out the latest designs.</p>
          <p><a class="btn btn-primary btn-lg" href="<?php bloginfo('url'); ?>/shop" role="button">Shop Now</a></p>
        </div>
      </div>
    </div>

    <!-- Recent Products Posts -->
    <div class="container-fluid content-box">
      <div class="row">
        <h2 class="title"><span>New in the Shop</span></h2>
        <ul class="home-recent-products">
            <?php
                $args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 4 , 'orderby' =>'date','order' => 'DESC' );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

                    <li class="col-xs-6 col-md-3 product">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                          <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />'; ?>
                          <div class="caption">
                            <h3><?php the_title(); ?></h3>
                      	    <span class="price"><?php echo $product->get_price_html(); ?></span>
                          </div>
                      </a>
                    </li><!-- /col-md-3 -->

            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </ul><!-- /home-recent-products -->
      </div>
      <p><a class="btn btn-more" href="<?php bloginfo('url'); ?>/shop" role="button">See All Products</a></p>
    </div>

    <!-- Blog Posts -->
    <?php get_template_part( 'content', 'recent-blog' ); ?>

    <div class="container-fluid basics content-box">
      <div class="row">
        <h2 class="title"><span>Getting Started</span></h2>

          <div class="col-sm-4 col-md-4">
            <a class="thumbnail" href="https://semisweetdesigns.com/2014/02/23/cookie-decorating-supplies-beginners/">
                <img src="https://semisweetdesigns.com/wp-content/uploads/2014/09/cookie-decorating-supplies-title.jpg" alt="A Beginner’s Guide to Cookie Decorating Supplies">
              <div class="caption">
                <h4>Tools</h4>
                <h3>A Beginner’s Guide to Cookie Decorating Supplies</h3>
              </div>
            </a>
          </div>

          <div class="col-sm-4 col-md-4">
            <a class="thumbnail" href="https://semisweetdesigns.com/2013/10/03/updated-royal-icing-recipe/">
              <img src="https://semisweetdesigns.com/wp-content/uploads/2014/08/royal-icing-recipe-title-new.jpg" alt="Royal Icing Recipe">
              <div class="caption">
                <h4>Icing</h4>
                <h3>Royal Icing Recipe</h3>
              </div>
            </a>
          </div>

          <div class="col-sm-4 col-md-4">
            <a class="thumbnail" href="https://semisweetdesigns.com/2013/09/08/updated-roll-out-sugar-cookie-recipe/">
                <img src="https://semisweetdesigns.com/wp-content/uploads/2013/09/sugar_cookie_recipe-title.jpg" alt="Roll-Out Sugar Cookie Recipe">
                <div class="caption">
                  <h4>Dough</h4>
                  <h3>Roll-Out Sugar Cookie Recipe</h3>
                </div>
            </a>
          </div>

      </div>
    </div>

<?php get_template_part( 'google', 'bottomwide' ); ?>

<?php get_footer(); ?>
