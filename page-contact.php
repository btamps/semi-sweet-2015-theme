<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<!-- Blog Posts -->
<div class="container-fluid content-box">
  <div class="row">

    <!-- Content Wrapper -->
    <div class="col-sm-8 content-wrapper">
      <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="col-md-12 post-wrapper">
        <header>
            <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
            <meta itemprop="image" content="<?php echo $url; ?>" />
            <figure class="feature-image">
              <?php the_post_thumbnail(); ?>
            </figure>
            <h1 itemprop="name">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h1>
        </header>
        <p>Questions? Comments? Send me an <a href="mailto:mike@semisweetdesigns.com">email</a> at mike AT semisweetdesigns DOT com. Or fill out the form below to send me a message!</p>
        <p>
        Please check the <a href="https://www.semisweetdesigns.com/about-me/#faqs">Frequently Asked Questions</a>. There's a small chance the answer to your question lies there. :)
        </p>
        <p>
        Sorry, I don't take customer orders for cookies. I'm flattered when asked, but please no more requests.
        </p>
        <form action="https://formspree.io/mike@semisweetdesigns.com"
            method="POST">
        <div class="form-group form-group-lg">
          <div class="row names">
            <div class="col-md-6 first-name">
              <label for="senderFirst" class="sender-first-name">First Name</label>
              <input type="text" class="form-control" name="first-name" id="senderFirst">
            </div>
            <div class="col-md-6 last-name">
              <label for="senderLast" class="sender-last-name">Last Name</label>
              <input type="text" class="form-control" name="last-name" id="senderLast">
            </div>
          </div>
        </div>
        <div class="form-group form-group-lg">
          <label for="exampleInputEmail1">Email Address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1">
        </div>
        <div class="form-group form-group-lg">
          <label for="subject">Subject</label>
          <input id="subject" class="form-control" type="text" name="_subject" />
        </div>
        <div class="form-group form-group-lg">
          <label for="emailMessage">Message</label>
          <textarea class="form-control" rows="6" id="emailMessage" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Send Message</button>
        <input type="hidden" name="_next" value="/thank-you/" />
      </form>

        </article>
        <?php endwhile; else: ?>

          <p>There are no posts or pages here.</p>

        <?php endif; ?>

      </div>  <!-- row end -->
    </div> <!-- content-wrapper end -->

    <?php get_sidebar(); ?>

  </div> <!-- row end -->
</div> <!-- blog-box end -->

<?php get_footer(); ?>
