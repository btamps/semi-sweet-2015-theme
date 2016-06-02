<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<div class="container-fluid content-box">
  <div class="row">
		<div class="col-md-3 shop-sidebar">
        <h1>Shop</h1>
				<?php
// Hey Billy, I added this function so you can easily check if the current slug is within the current URL path
// so slug=cookies then path=/tags/cookies/whatever/ it should get the selected class
function isInURL($slug) {
  $url = $_SERVER["REQUEST_URI"]; // get current URL
  $path = parse_url($url, PHP_URL_PATH);
  $segments = explode('/', rtrim($path, '/'));
  // check if slug is within path, if so return selected class
  if ( strpos($path, $slug) ) {
    return 'selected';
  }
}
?>

<ul class="product-categories">
  <?php // you could clean this up so it's a little more readable like this
  $wcatTerms = get_terms(
        'product_cat', array(
          'hide_empty' => 0,
          'orderby' => 'ASC',
          'parent' =>0)
          //, 'exclude' => '17,77'
        );
foreach($wcatTerms as $wcatTerm) :
  $wthumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
  $wimage = wp_get_attachment_url( $wthumbnail_id );
?>
  <li class="top-level">
    <?php
    // here I added the class and function call isInURL($slug) to check if the slug is within the current URL
    // this might need tweaking depending on your URLs and taxonomy
    ?>
    <a class="<?php echo isInURL($wcatTerm->slug); ?>" href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a>
    <ul class="wsubcategs">
    <?php
    $wsubargs = array(
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 0,
       'parent' => $wcatTerm->term_id,
       'taxonomy' => 'product_cat'
    );
    $wsubcats = get_categories($wsubargs);
    foreach ($wsubcats as $wsc):
    ?>
      <li class="sub-level"><a class="<?php echo isInURL($wsc->slug); ?>" href="<?php echo get_term_link( $wsc->slug, $wsc->taxonomy );?>"><?php echo $wsc->name;?></a></li>
    <?php
    endforeach;
    ?>
    </ul>
  </li>
<?php
  endforeach;
?>
</ul>

        <div class="cart-buttons">
          <a href="<?php echo WC()->cart->get_cart_url(); ?>" class="btn btn-default cart">View Cart</a>
        </div>


			  <?php get_template_part( 'google', 'tall' ); ?>
      </div>
      <!-- sidebar end -->
		<div class="col-md-9 content-wrapper">
		  <div class="row">
			<article class="woo-store col-md-12">
		<header>
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h2 class="shop-title"><?php woocommerce_page_title(); ?></h2>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>


		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
			</header>
			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>


		</article>
		</div>
		</div>


  </div> <!-- row end -->
</div> <!-- blog-box end -->
<?php get_footer( 'shop' ); ?>
