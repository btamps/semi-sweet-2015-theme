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
        <li><a href="https://twitter.com/SemiSweetMike"><i class="fa fa-twitter"></i></a></li>
        <li><a href="https://www.facebook.com/semisweetdesigns"><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://instagram.com/semisweetmike/"><i class="fa fa-instagram"></i></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
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
