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
          <p>The new shop is here! We have 5 custom cookie cutter designs now available.</p>
          <p><a class="btn btn-primary btn-lg" href="<?php bloginfo('url'); ?>/shop" role="button">Shop Now</a></p>
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
                <a href="<?php the_permalink(); ?>" Class="btn-more">Read More &raquo;</a>      
              </p>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; wp_reset_postdata(); ?>

        <?php
        global $post;
        $args = array( 'posts_per_page' => 3, 'offset'=> 1, 'category' => 1 );
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
              <a href="<?php the_permalink(); ?>" class="btn-more">Read More &raquo;</a>      
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
        <?php
        $args = array(
          'post_type' => 'post',
          'category_name' => 'the-basics'
        );
        $the_query = new WP_Query( $args );

        ?>
        <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
              <a href="<?php the_permalink(); ?>">                
                <?php the_post_thumbnail(); ?>
              </a>
              <div class="caption">
                <h4><a href="<?php the_permalink(); ?>">My Tools</a></h4>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
<?php get_footer(); ?>
