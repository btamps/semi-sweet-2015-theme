<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

<div class="row">
  <div id="content-body">
    <!-- Main Content -->
    <section id="main-content">
    <h2>Need help finding something?</h2>

<p class="search-instructions">Use the search box below to filter by keyword. Or click on a Category or Tag button to filter by theme.</p>

  <form role="search" method="get" class="search-form archive-search-bar" action="<?php echo home_url(); ?>">
    <label>
      <input type="search" class="search-field" placeholder="Search this site" value="" name="s" title="Search" />
    </label>
  </form>

    <h2>Categories</h2>
    <ul class="category-list">
      <?php
      $categories = get_categories();
      foreach ($categories as $category) {
        $cat_link = get_category_link( $category->term_id );
        echo "<li><a href='{$cat_link}' title='{$category->name} Tag' class='{$category->slug}'>{$category->name}</a></li>";
      }
      ?>
       <?php //wp_list_categories(); ?>
    </ul>

<div class="archive-tags">
    <h2>Tags</h2>
    <ul class="post-tags">
      <?php
      $tags = get_tags();
      foreach ( $tags as $tag ) {
        $tag_link = get_tag_link( $tag->term_id );
        echo "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>{$tag->name}</a></li>";
      }
      ?>
    </ul>
</div>
<h2 class="page-title"><?php printf( __( 'Search Results for: “%s”', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

<?php while(have_posts()) : the_post(); ?>

      <article class="post excerpt">
        <header>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="subhead">
            <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date( 'M j, Y' ); ?></a>
            <div class="header-comments">
                <?php
                  comments_popup_link('<span class="comment-count">&nbsp;</span> No comments', '<span class="comment-count">1</span> Comment', '<span class="comment-count">%</span> Comments');
                ?>
              </div>
          </div>
        </header>

        <figure class="featured-image">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
        </figure>
       <?php the_excerpt(); ?>
       <p><a href="<?php the_permalink(); ?>" class="more-link">Continue reading</a></p>

      </article>

<?php endwhile; ?>


    </section><!-- Main Content End -->

    <?php get_sidebar(); ?>

  </div>
</div>



<?php get_footer(); ?>
