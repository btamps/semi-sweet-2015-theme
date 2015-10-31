<?php

/*
  Template Name: Basic Page

*/

get_header(); ?>


<div class="row">
  <div id="content-body">
    <!-- Main Content -->
    <section id="main-content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="post">
        <header>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="subhead">
          </div>
        </header>

        <figure class="featured-image">
          <?php the_post_thumbnail(); ?>
        </figure>

        <?php the_content(); ?>

      </article>
<?php endwhile; else: ?>

  <p>There are no posts or pages here.</p>

<?php endif; ?>



    </section><!-- Main Content End -->

    <?php get_sidebar(); ?>

  </div>
</div>

<?php get_footer(); ?>
