<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php bloginfo('url'); ?>">SemiSweet</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right nav-social">
        <li><a href="//instagram.com/semisweetmike/"><i class="fa fa-instagram"></i></a></li>
        <li><a href="//pinterest.com/SemiSweetMike"><i class="fa fa-pinterest-p"></i></a></li>
        <li><a href="//www.facebook.com/semisweetdesigns"><i class="fa fa-facebook"></i></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php 
          if ( WC()->cart->get_cart_contents_count() > 0 ) { ?>
            <li><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '<i class="fa fa-shopping-cart"></i> (%d)', '<i class="fa fa-shopping-cart"></i> (%d)', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></a></li>  
        <?php }
        ?>
        <?php

          $args = array(
            'menu' => 'header-menu',
            'echo' => false
          );
          echo strip_tags(wp_nav_menu( $args ), '<li><a>');

        ?>
      </ul>          
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
