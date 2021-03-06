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
		<?php get_template_part( 'content', 'main-products' ); ?>
	</div>
</div>
<!-- Blog Posts -->
<?php get_template_part( 'content', 'recent-blog' ); ?>

<?php get_template_part( 'google', 'bottomwide' ); ?>

<?php get_footer(); ?>
