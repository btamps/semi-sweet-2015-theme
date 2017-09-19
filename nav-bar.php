<div class="top-bar">
  <ul class="nav-social content-box">
    <li><a href="//semisweetdesigns.com/feed/atom/"><i class="fa fa-rss"></i></a></li>
    <li><a href="//instagram.com/semisweetmike/"><i class="fa fa-instagram"></i></a></li>
    <li><a href="//youtube.com/semisweetdesigns"><i class="fa fa-youtube"></i></a></li>
    <li><a href="//www.facebook.com/semisweetdesigns"><i class="fa fa-facebook"></i></a></li>
    <li><a href="//pinterest.com/SemiSweetMike"><i class="fa fa-pinterest-p"></i></a></li>
  </ul>
</div>

<div class="brand-box content-box">
  <div class="row">
    <div class="branding">
      <a class="logo" href="/">SemiSweet</a>
      <p>Quality Crafted Cookie Cutters &amp; Decorating Ideas</p>
    </div>
    <div class="search-box">
      <form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
          <div class="form-group">
              <label class="sr-only" for="search">Search Blog...</label>
              <input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search Blog..." />
              <i class="fa fa-search"></i>
          </div>
      </form>
    </div>
  </div>
</div>

<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <!-- Toggle menu gets grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars" aria-hidden="true"></i> Menu
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="search-box">
        <form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="form-group">
                <label class="sr-only" for="search">Search Blog...</label>
                <input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search Blog..." />
                <i class="fa fa-search"></i>
            </div>
        </form>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <?php
          $args = array(
            'menu' => 'header-menu',
            'echo' => false
          );
          echo strip_tags(wp_nav_menu( $args ), '<li><a>');
        ?>
        <?php
          if ( WC()->cart->get_cart_contents_count() != 0 ) { ?>
            <li><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '<i class="fa fa-shopping-cart"></i> (%d)', '<i class="fa fa-shopping-cart"></i> (%d)', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></a></li>
        <?php }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
