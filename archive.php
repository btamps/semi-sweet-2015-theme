<?php

/*
	Template Name: Archive Page

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
<?php
  $current_cat = single_cat_title("", false);
  echo "<h2 class='cat-result'>Category: “{$current_cat}”</h2>";
?>
<?php
  $current_tag = single_tag_title("", false);
  echo "<h2 class='tag-result'>All posts tagged with: “{$current_tag}”</h2>";
?>

<?php

	if($pagename == 'archives') {
    // default page state
    // showtop 20 posts here...
    query_posts('posts_per_page=20');
  }

?>

<?php while(have_posts()) : the_post(); ?>

      <article class="post">
        <header>
          <a href="<?php the_permalink(); ?>" class="date"><?php echo get_the_date( 'M j, Y' ); ?></a>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        </header>
        <figure class="featured-image">
          <a href="<?php the_permalink(); ?>">
            <img src="<?php the_field('square_featured_image'); ?>" alt="<?php the_title(); ?>" />
          </a>
        </figure>
      </article>

<?php endwhile; ?>
    <?php
        if ($pagename !== 'archives') {

          global $wp_query;

          $total_pages = $wp_query->max_num_pages;

          if ($total_pages > 1){

            $current_page = max(1, get_query_var('paged'));

            echo '<div class="page_nav">';

            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text' => 'Newer <em>Posts</em>',
                'next_text' => 'Older <em>Posts</em>'
              ));

            echo '</div>';

          }
        }
       ?>
    </section><!-- Main Content End -->

    <?php get_sidebar(); ?>

  </div>
</div>



<?php get_footer(); ?>
