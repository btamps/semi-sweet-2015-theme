<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image"
    content="<?php
      if (has_post_thumbnail()) {
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_name');
        echo $thumb[0]; // thumbnail url
      }
    ?>" />

    <title>
    <?php
      wp_title( '–', true, 'right' );
      //bloginfo( 'name' );
    ?>
   </title>

    <link rel="icon" type="image/png" href="////semisweetdesigns.com/wp-content/themes/semi-sweet-2015-theme/favicon.ico" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-28123361-1', 'auto');
      ga('send', 'pageview');
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Noto+Serif:400,400i,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <?php wp_head(); ?>
  </head>

<body <?php body_class($class); ?>>

<?php get_template_part( 'nav', 'bar' ); ?>
