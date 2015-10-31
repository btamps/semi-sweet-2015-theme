<?php get_header(); ?>

<div class="row">
  <div id="content-body">
    <!-- Main Content -->
    <section id="main-content">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="post" itemscope itemtype="http://schema.org/Blog">
        <header>
          <h1 itemprop="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="subhead">
            <a href="" class="date" itemprop="dateCreated"><?php echo get_the_date( 'M j, Y' ); ?></a>
            <div class="header-comments">
                <?php
                  comments_popup_link('<span class="comment-count">&nbsp;</span> Leave a comment', '<span class="comment-count">1</span> Comment', '<span class="comment-count">%</span> Comments');
                ?>
              </div>
          </div>
        </header>

        <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
        <meta itemprop="image" content="<?php echo $url; ?>">
        <figure class="featured-image">
          <?php the_post_thumbnail(); ?>
        </figure>

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
        <div class="share-group">
          <strong>share</strong>
          <a class="fb-icon" href="https://semisweetdesigns.com"
            onclick="
              window.open(
                'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),
                'facebook-share-dialog',
                'width=626,height=436');
              return false;">

          </a>
          <a class="tweet-icon" href="https://twitter.com/share?via=semisweetmike" target="_blank"></a>

          <a class="pin-icon" href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'></a>

          <!-- Place this tag where you want the +1 button to render. -->
          <div class="g-plusone" data-size="medium"></div>

          <!-- Place this tag after the last +1 button tag. -->
          <script type="text/javascript">
            (function() {
              var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
              po.src = 'https://apis.google.com/js/plusone.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
          </script>

        </div>

      </article>
<?php endwhile; else: ?>

  <p>There are no posts or pages here.</p>

<?php endif; ?>


    <?php comments_template(); ?>

    </section>
    <?php get_sidebar(); ?>

  </div>
</div>



<?php get_footer(); ?>
