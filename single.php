<?php get_header(); ?>
<!-- Blog Posts -->
<div class="container-fluid content-box">
  <div class="row">

    <!-- Content Wrapper -->
    <div class="col-sm-8 content-wrapper">
      <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="col-md-12 post-wrapper" itemscope itemtype="https://schema.org/Blog">
          <header>
            <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
            <meta itemprop="image" content="<?php echo $url; ?>" />
            <figure class="feature-image">
              <?php the_post_thumbnail(); ?>
            </figure>
            <h4><?php
              $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                }
            ?></h4>
            <h1 itemprop="name">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h1>
            <p>Written by <a href="">Mike Tamplin</a> <span>•</span> <?php echo get_the_date( 'M j, Y' ); ?></p>
            <p class="comment-count"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
          </header>
          <?php the_content(); ?>
          <h4>Tags:</h4>
          <ul class="post-tags">
            <?php
            $tags = get_the_tags();
            foreach ( $tags as $tag ) {
              $tag_link = get_tag_link( $tag->term_id );
              echo "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>{$tag->name}</a></li>";
            }
            ?>
          </ul>

          <div class="cat-wrap">
            <h4>Filed under:</h4>
            <ul class="category-list">
              <?php
              $categories = get_the_category();
              foreach ($categories as $category) {
                $cat_link = get_category_link( $category->term_id );
                echo "<li><a href='{$cat_link}' title='{$category->name} Tag' class='{$category->slug}'>{$category->name}</a></li>";
              }
              ?>
            </ul>
          </div>
        </article>
        <?php endwhile; else: ?>

          <p>There are no posts or pages here.</p>

        <?php endif; ?>
        <?php echo do_shortcode( '[manual_related_posts]' ); ?>
        <?php comments_template(); ?>

      </div>  <!-- row end -->
    </div> <!-- content-wrapper end -->

    <?php get_sidebar(); ?>

  </div> <!-- row end -->
</div> <!-- blog-box end -->

<?php get_footer(); ?>
