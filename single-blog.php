<?php get_header(); ?>

<p>This is the single-blog.php file.</p>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  <?php the_post_thumbnail(); ?>
  <?php the_content(); ?>
  <img src="<?php the_field( 'square_featured_image' ); ?>" />
  <hr>

<?php endwhile; else: ?>

  <p>There are no posts or pages here.</p>

<?php endif; ?>

<?php get_footer(); ?>