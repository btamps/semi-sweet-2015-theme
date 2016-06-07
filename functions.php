<?php

// Load the Theme CSS
function theme_styles() {
  wp_enqueue_style( 'ss_bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_script( 'ss_bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js' );
  wp_enqueue_script( 'imagegallery', get_template_directory_uri() . '/js/imagegallery.js' );
  wp_enqueue_script( 'wootweaks', get_template_directory_uri() . '/js/wootweaks.js' );
  wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
}
// Enable Theme CSS and JS from above
add_action( 'wp_enqueue_scripts', 'theme_styles' );



// Enable custom menus
add_theme_support( 'menus' );

// Enable feature images
add_theme_support( 'post-thumbnails' );

// Add Woocommerce Support
add_theme_support( 'woocommerce' );

// Add Woocommerce classes to archive page
add_filter( 'body_class', 'archive_modify_body_classes', 10, 2 );

function archive_modify_body_classes( $classes, $class )
{
    // Modify the array $classes to your needs
    if( is_archive() )
    {
        $classes[] = 'woocommerce';
        $classes[] = 'woocommerce-page';
    }
    return $classes;
}

// Add "blog" classes to single page
add_filter( 'body_class', 'blog_modify_body_classes', 10, 2 );

function blog_modify_body_classes( $classes, $class )
{
    // Modify the array $classes to your needs
    if( is_single() )
    {
        $classes[] = 'blog';
    }
    if( is_home() )
    {
        $classes[] = 'home';
    }
    if( is_page() )
    {
        $classes[] = 'blog';
    }
    if( is_search() )
    {
        $classes[] = 'blog';
    }
    return $classes;
}

//Reposition WooCommerce related products
function woocommerce_remove_related_products(){
remove_action(
    'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
}
add_action(
    'woocommerce_after_single_product_summary', 'woocommerce_remove_related_products'
);

function woocommerce_custom_related_products(){
    woocommerce_output_related_products();
}
add_action( 'woo_custom_related_products', 'woocommerce_custom_related_products' );


function woo_related_products_limit() {
  global $product;

	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 4; // 4 related products
	$args['columns'] = 4; // arranged in 2 columns
	return $args;
}

// Modify the default WooCommerce orderby dropdown
//
// Options: menu_order, popularity, rating, date, price, price-desc
// In this example I'm removing price & price-desc but you can remove any of the options
function my_woocommerce_catalog_orderby( $orderby ) {
	unset($orderby["rating"]);
	return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );

// Woocommerce - removed product count
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// Display 12 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

// Woocommerce - removed shop product rating
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Woocommerce - change breadcrumbs home url
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return 'https://semisweetdesigns.com/shop/';
}

// Woocommerce - change breadcrumbs defaults
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' <i class="fa fa-caret-right" aria-hidden="true"></i> ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '<span>',
            'after'       => '</span>',
            'home'        => _x( 'Shop', 'breadcrumb', 'woocommerce' ),
        );
}

// Woocommerce - removed single product rating
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

// Woocommerce - removed "reviews" in product tabs

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    return $tabs;
}

// Woocommerce - rename "Description" tab
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Details' );

	return $tabs;
}

// Woocommerce - add "Shipping" tab
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {

	// Adds the new tab

	$tabs['test_tab'] = array(
		'title' 	=> __( 'Shipping', 'woocommerce' ),
		'priority' 	=> 40,
		'callback' 	=> 'woo_shipping_tab_content'
	);

  $tabs['test_tab2'] = array(
		'title' 	=> __( 'Specs', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_material_tab_content'
	);

	return $tabs;

}
function woo_shipping_tab_content() {
	// The tab content
	echo '<h2>Shipping</h2>';
	echo '<p>Please allow 2 to 3 business days to process your order before shipping. However, I will do my best to ship orders earlier than that time frame.</p>

<p>Orders are shipped via USPS domestically and internationally. For US domestic orders, First Class mail is 3 to 5 days business days, while Priority Mail is 2 to 3  business days. For international orders, please allow 2 to 3 weeks for shipping.</p>';
}
function woo_material_tab_content() {
	// The tab content
	echo '<h2>Product Specs</h2>';
	echo '<p>This cookie cutter is made from food safe PLA plastic. Because of its sensitivity to high temperatures, this cookie cutter is to be HAND WASH ONLY. It should not be washed in the dishwasher, not to be left soaking in hot water, not to be used on hot cookies, and not to be left in a warm vehicle. Avoid any exposure to heat.</p>

<p>Each cookie cutter has a blade height just over half an inch. The cutting blade is thin, yet very durable. It should have no problem cutting into dough up to 3/8” in thickness.</p>';
}

// Woocommerce - removed single product rating
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}

// Change page title for Shop Archive page
add_filter( 'wp_title', 'title_for_shop' );
function title_for_shop( $title )
{
  if ( is_shop() ) {
    return __( 'Shop' );
  }
  return $title;
}

// Woocommerce change price range to "Starting at: lowest price"
add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
function wc_wc20_variation_price_format( $price, $product ) {
// Main Price
$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
$price = $prices[0] !== $prices[1] ? sprintf( __( 'Starting at: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
// Sale Price
$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
sort( $prices );
$saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'Starting at: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
if ( $price !== $saleprice ) {
$price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
}
return $price;
}


// woocommerce Redirect to a specific page when clicking on Continue Shopping in the cart
function wc_custom_redirect_continue_shopping() {
    return 'https://semisweetdesigns.com/shop/';
}
add_filter( 'woocommerce_continue_shopping_redirect', 'wc_custom_redirect_continue_shopping' );

// Woocommerce - rename the "Have a Coupon?" message on the checkout page
function woocommerce_rename_coupon_message_on_checkout() {
	return 'Have a Promo Code?' . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>';
}
add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );
// rename the coupon field on the checkout page
function woocommerce_rename_coupon_field_on_checkout( $translated_text, $text, $text_domain ) {
	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}
	if ( 'Coupon code' === $text ) {
		$translated_text = 'Promo Code';

	} elseif ( 'Apply Coupon' === $text ) {
		$translated_text = 'Apply Promo Code';
	}
	return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_checkout', 10, 3 );

// Removes automatic br and p tags in the_content
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);


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

// Changes text for the sort dropdown
add_filter( 'gettext', 'theme_sort_change', 20, 3 );

function theme_sort_change( $translated_text, $text, $domain ) {
	if ( is_woocommerce() ) {
		switch ( $translated_text ) {
		case 'Sort by popularity' :
		$translated_text = __( 'Sort by Popularity', 'theme_text_domain' );
		break;
		case 'Sort by price: low to high' :
		$translated_text = __( 'Sort by Price: Lowest to Highest', 'theme_text_domain' );
		break;
		case 'Sort by price: high to low' :
		$translated_text = __( 'Sort by Price: Highest to Lowest', 'theme_text_domain' );
		break;
		case 'Sort by newness' :
		$translated_text = __( 'Sort by Newest to Oldest', 'theme_text_domain' );
		break;
		case 'Sort by title: Alphabetically' :
		$translated_text = __( 'Sort by Title: Alphabetically', 'theme_text_domain' );
		break;
		case 'Sort by title: Reverse-Alphabetically' :
		$translated_text = __( 'Sort by Title: Reverse-Alphabetically', 'theme_text_domain' );
		break;
		case 'Default sorting' :
		$translated_text = __( 'Default Sorting', 'theme_text_domain' );
		break;
		}
	}
return $translated_text;
}


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
