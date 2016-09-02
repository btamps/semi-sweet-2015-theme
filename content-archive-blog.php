<!-- Content Wrapper -->
<div class="col-sm-8 content-wrapper">
  <div class="row">
    <div class="archive-search-box">
      <h1>Search Archive</h1>

      <form role="search" method="get" class="search-form archive-search-bar" action="<?php echo home_url(); ?>">
        <label for="search-input"><i class="fa fa-search"></i></label>
        <input type="search" id="search-input" class="form-control search-field" placeholder="Search all posts" value="" name="s" title="Search" />
      </form>
      <ul class="years archive-list">
      <?php
        $all_posts = get_posts(array(
          'posts_per_page' => -1 // to show all posts
        ));

        // this variable will contain all the posts in a associative array
        // with three levels, for every year, month and posts.

        $ordered_posts = array();

        foreach ($all_posts as $single) {

          $year  = mysql2date('Y', $single->post_date);
          $month = mysql2date('F', $single->post_date);

          // specifies the position of the current post
          $ordered_posts[$year][$month][] = $single;

        }

        // iterates the years
        foreach ($ordered_posts as $year => $months) { ?>
          <li>

            <h3><?php echo $year ?></h3>

            <ul class="months">
            <?php foreach ($months as $month => $posts ) { // iterates the moths ?>
              <li>
                <h3><?php printf("%s", $month) ?></h3>

                <ul class="posts">
                  <?php foreach ($posts as $single ) { // iterates the posts ?>

                    <li>
                      <a href="<?php echo get_permalink($single->ID); ?>"><?php echo get_the_title($single->ID); ?></a></li>
                    </li>

                  <?php } // ends foreach $posts ?>
                </ul> <!-- ul.posts -->

              </li>
            <?php } // ends foreach for $months ?>
            </ul> <!-- ul.months -->

          </li> <?php
        } // ends foreach for $ordered_posts
        ?>
        </ul><!-- ul.years -->

    </div>
  </div>  <!-- row end -->
</div> <!-- content-wrapper end -->
