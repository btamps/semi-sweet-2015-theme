<?php get_template_part( 'newsletter', 'footer' ); ?>

    <div class="container-fluid footer">
      <div class="row">
        <div class="footer-box content-box">
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
    </div>
    <div class="container-fluid copyright">
      <div class="row">
        <div class="copyright-box content-box">
          <p class="col-sm-6">&copy; <?php echo date("Y") ?> Semi Sweet Designs, LCC.</p>
          <p class="col-sm-6 made-by">Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a class="my-link" href="https://dribbble.com/billy">BTAMPS</a></p>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php wp_footer(); ?>

  </body>
</html>
