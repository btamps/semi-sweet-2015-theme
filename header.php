<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" class="no-js" lang="en" > <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <meta name="google-site-verification" content="Y0bsJGT_5dtmM8UVpBQbtoCuICTrk2mAuwjHjexqzNk" />
  <title>
  	<?php
  		wp_title( '–', true, 'right' );
  		//bloginfo( 'name' );
   	?>
   </title>
   <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.0/pure-min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta property="og:image"
    content="<?php
      if (has_post_thumbnail()) {
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_name');
    echo $thumb[0]; // thumbnail url
}
   ?>" />

<link rel="icon" type="image/png" href="http://www.semisweetdesigns.com/wp-content/uploads/2013/08/favicon.ico" />

<link rel="apple-touch-icon" href="http://i.imgur.com/MMAh3oe.png"/>  

	<?php wp_head(); ?>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-instagram/0.2.2/jquery.instagram.min.js"></script>
  <script src="<?php bloginfo('template_directory');?>/js/custom.modernizr.js"></script>
  <script type="text/javascript" src="//use.typekit.net/ewa7xsh.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <link href="<?php bloginfo('template_directory');?>/js/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/prettify.js"></script>
</head>
<body <?php body_class($class); ?> onload="prettyPrint()">

<div class="topbar-wrapper">
  <nav class="topbar row">
    <ul class="title-area">

      <li class="logo">
        <a href="/"><?php bloginfo('name'); ?></a>
      </li>

      <li class="menu">
        <a class="menu-icon" href="#">
        </a>
      </li>
    </ul>

    <section class="top-bar-section">
      <ul>
        <?php

          $args = array(
            'menu' => 'main-menu',
            'echo' => false
          );
          echo strip_tags(wp_nav_menu( $args ), '<li><a>');

        ?>
        <li class="form-wrapper">
          <form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
          <label>
            <input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:" />
          </label>
        </form>
        </li>
      </ul>

    </section>
  </nav>
</div>