  <?php wp_footer() ?>
    
  <?php get_template_part( 'newsletter', 'footer' ); ?>

    <div class="container-fluid footer">
      <div class="row">
        <div class="col-md-8">
          <h3>Explore</h3>
            <ul class="footer-nav">
              <?php

                $args = array(
                  'menu' => 'main-menu',
                  'echo' => false
                );
                echo strip_tags(wp_nav_menu( $args ), '<li><a>');

              ?>
              <li><a href="/archive">Archive</a></li>
              <li><a href="/disclosure">Disclosure</a></li>
              <li><a href="/about-me/#faqs">FAQs</a></li>
            </ul>
        </div>
        <div class="col-md-4">
          <h3>Let’s Be Social</h3>
          <ul class="social-links">
            <li><a href="//twitter.com/SemiSweetMike"><i class="fa fa-twitter"></i></a></li>
            <li><a href="//www.facebook.com/semisweetdesigns"><i class="fa fa-facebook"></i></a></li>
            <li><a href="//instagram.com/semisweetmike/"><i class="fa fa-instagram"></i></a></li>
            <li><a href="//pinterest.com/SemiSweetMike"><i class="fa fa-pinterest-p"></i></a></li>
            <li><a href="//plus.google.com/111747040285481172891"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="//semisweetdesigns.com/feed/atom/"><i class="fa fa-rss"></i></a></li>
          </ul>      
        </div>
      </div>
    </div>
    <div class="container-fluid copyright">
      <div class="row">
        <p class="col-sm-6">&copy; 2015 Semi Sweet Designs, LCC.</p>
        <p class="col-sm-6 made-by">Made with <span class="heart pulse2">♥</span> by BTAMPS</p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

    <!-- Twitter share code -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </body>
</html>