<?php

// Load the Theme CSS
function theme_styles() {
  wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
}

// Enable Theme CSS from above
add_action( 'wp_enqueue_scripts', 'theme_styles' );

// Enable custom menus
add_theme_support( 'menus' );

// Enable feature images
add_theme_support( 'post-thumbnails' );

// Add Woocommerce Support
add_theme_support( 'woocommerce' );

// Woocommerce - removed sorting dropdown
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Woocommerce - removed shop product rating
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Woocommerce - removed breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Woocommerce - removed single product rating
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

// Woocommerce - removed single product tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Woocommerce - removed single product rating
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Change number or products per row to 2
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 2; // 2 products per row
  }
}

// Woocommerce - add checkout button
add_action('ss-checkout-button', 'ss_add_checkout_button');
function ss_add_checkout_button() {
  global $woocommerce;

  if ( sizeof( $woocommerce->cart->cart_contents) > 0 ) :
    echo '<a href="' . $woocommerce->cart->get_checkout_url() . '" class="btn btn-primary btn-checkout" title="' . __( 'Proceed to Checkout' ) . '">' . __( 'Proceed to Checkout' ) . '</a>';
  endif;
}

// Removes p tags from the content
remove_filter( 'the_content', 'wpautop' );

// Removes pages from search results
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

// Add Nav Menus
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Add featured image to RSS feed
add_filter( 'the_content', 'featured_image_in_feed' );
function featured_image_in_feed( $content ) {
    global $post;
    if( is_feed() ) {
        if ( has_post_thumbnail( $post->ID ) ){
            $output = get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'float:right; margin:0 0 10px 10px;' ) );
            $content = $output . $content;
        }
    }
    return $content;
}


add_filter('pre_get_posts','SearchFilter');

// Removes the width and height attributes in the image tag
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Removes automatic br and p tags in the_content
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

/**
 * Replacing the default WordPress search form with an HTML5 version
 *
 */
function html5_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="assistive-text" for="s">' . __('Search for:') . '</label>
    <input type="search" placeholder="'.__("Enter term...").'" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="Search" />
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'html5_search_form' );

// Comment Mark Up HTML
function mytheme_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }

?>
<?php $cmntCnt = 1; ?>

    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body <?php
/* Only use the authcomment class from style.css if the user_id is 1 (admin) */
if (1 | 2 === $comment->user_id)
$oddcomment = bypostauthor;
echo $oddcomment;
?> author-id-<?php echo $comment->user_id; ?>">
    <?php endif; ?>
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <div class="comment-author">
      <?php printf(__('%s'), get_comment_author_link()) ?>
      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
          /* translators: 1: date, 2: time */
          printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
      </div>
      <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" class="comment-parent-count"><?php
        $comment_number = gtcn_comment_numbering($comment->comment_ID, $args);
        echo $comment_number;
        ?></a>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>



    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
        }
?>
<?php
add_filter('comments_array', 'filterComments', 0);
add_filter('the_posts', 'filterPostComments', 0);
//Updates the comment number for posts with trackbacks
function filterPostComments($posts) {
  foreach ($posts as $key => $p) {
    if ($p->comment_count <= 0) { return $posts; }
    $comments = get_approved_comments((int)$p->ID);
    $comments = array_filter($comments, "stripTrackback");
    $posts[$key]->comment_count = sizeof($comments);
  }
  return $posts;
}
//Updates the count for comments and trackbacks
function filterComments($comms) {
  global $comments, $trackbacks;
  $comments = array_filter($comms,"stripTrackback");
  $trackbacks = array_filter($comms, "stripComment");
  return $comments;
}
//Strips out trackbacks/pingbacks
function stripTrackback($var) {
  if ($var->comment_type == 'trackback' || $var->comment_type == 'pingback') { return false; }
  return true;
}
//Strips out comments
function stripComment($var) {
  if ($var->comment_type != 'trackback' && $var->comment_type != 'pingback') { return false; }
  return true;
}
?>