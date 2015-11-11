  <?php wp_footer() ?>
    <div class="container-fluid newsletter-box">
      <div class="row">
        <section class="col-md-5 newsletter-text">
          <h2><i class="fa fa-paper-plane"></i> Stay Current</h2>
          <p>Be the first to know about new products and blog posts.</p>
          <form action="//semisweetdesigns.us12.list-manage.com/subscribe/post?u=fe76ad92bdd35d5808d870eb6&amp;id=d48439dd50" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" novalidate>
            <div class="form-group">
              <label class="sr-only" for="mce-EMAIL">Email address</label>
              <input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="Email Address" required>
            </div>
            <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">Join</button>
          </form>          
        </section>
      </div>
    </div>

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
              <li><a href="/disclosure">Disclosure</a></li>
              <li><a href="archives.html">Archives</a></li>
              <li><a href="/about-me/#faqs">FAQs</a></li>
            </ul>
        </div>
        <div class="col-md-4">
          <h3>Stay in the mix</h3>
          <ul class="social-links">
            <li><a href="https://twitter.com/SemiSweetMike"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.facebook.com/semisweetdesigns"><i class="fa fa-facebook"></i></a></li>
            <li><a href="http://instagram.com/semisweetmike/"><i class="fa fa-instagram"></i></a></li>
            <li><a href="http://pinterest.com/SemiSweetMike"><i class="fa fa-pinterest-p"></i></a></li>
            <li><a href="https://plus.google.com/111747040285481172891"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="http://feeds.feedburner.com/semisweetdesigns/nxJT"><i class="fa fa-rss"></i></a></li>
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
    <script src="js/bootstrap.min.js"></script>

    <!-- Twitter share code -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </body>
</html>