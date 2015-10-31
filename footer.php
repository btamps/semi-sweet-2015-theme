<?php wp_footer() ?>
<footer>
  <div class="row">
    <div class="main-links">
      <h3>Explore</h3>
      <ul>
        <?php

          $args = array(
            'menu' => 'main-menu',
            'echo' => false
          );
          echo strip_tags(wp_nav_menu( $args ), '<li><a>');

        ?>
          <li><a href="/disclosure">Disclosure</a></li>
          <li><a href="/link-parties">Link Parties</a></li>
          <li><a href="/about-me/#faqs">FAQ</a></li>
      </ul>
    </div>
    <div class="connect-wrapper">
      <div class="in-the-mix">
        <h3>Stay In the Mix</h3>
        <ul class="social-icons">
          <li class="fb-icon"><a href="https://www.facebook.com/semisweetdesigns" title="Facebook">Facebook</a></li>
          <li class="twitter-icon"><a href="https://twitter.com/SemiSweetMike" title="Twitter">Twitter</a></li>
          <li class="pintrest-icon"><a href="http://pinterest.com/SemiSweetMike" title="Pintrest">Pintrest</a></li>
          <li class="instagram-icon"><a href="http://instagram.com/semisweetmike/" title="Instagram">Instagram</a></li>
          <li class="google-icon"><a href="https://plus.google.com/111747040285481172891" title="Google Plus">Google Plus</a></li>
          <li class="bloglovin-icon"><a href="http://www.bloglovin.com/semisweetdesigns" title="Bloglovin’">Bloglovin'</a></li>
          <li class="rss-icon"><a href="http://feeds.feedburner.com/semisweetdesigns/nxJT" title="RSS">RSS</a></li>
        </ul>
      </div>

      <div class="subscribe-block">
        <h3>Subscribe</h3>
        <p>Subscribe to receive new posts from Semi Sweet to your inbox.</p>
        <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=semisweetdesigns/nxJT', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">

          <input type="text" placeholder="Enter your email" class="subscribe-box" name="email"/>
          <input type="hidden" value="semisweetdesigns/nxJT" name="uri" />
          <input type="hidden" name="loc" value="en_US"/>
          <input type="submit" value="Subscribe" class="subscribe-button" />
        </form>
      </div>
    </div>

  </div>
  <div class="bottom-bar">
    <p>
      &copy; Copyright by <a href="/about-me">Mike</a> from Semi Sweet.
    </p>
  </div>
</footer>







<script>

$(".menu a").click(function(e){
  $(".topbar").toggleClass("open");
  e.preventDefault();
});

</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>
