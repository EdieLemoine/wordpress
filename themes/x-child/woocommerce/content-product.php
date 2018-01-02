<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$terms = get_the_terms( $post->ID, 'product_cat' );

// $product_cat_id = null;
// $last = null;
//
$cat = null;
foreach ( $terms as $term ) {
	if ( is_shop() ) :
		$cat .= $term->name;
	endif;
}
//
// if ( $product_cat_id != $last ) {
// 	echo $name . " |";
// }


$m2 = $product->get_attribute( 'pa_pakinhoud' );
$m2price = wc_price( $product->get_price() / $m2 );

?>

<li <?php post_class( "ep-1-4 ep-l-1-3 ep-s-1-2 ep-xs-1-1" ); ?>>
	<div class="inner">
		<?php echo "<div class='bg-dark category'><span>$cat</span></div>"; ?>
		<?php

		woocommerce_template_loop_product_link_open();
		// woocommerce_template_loop_rating();
		// woocommerce_template_loop_price();

		echo "<div class='image'>";
		woocommerce_show_product_loop_sale_flash();
		woocommerce_template_loop_product_thumbnail();
		echo "</div>";

		echo "<div class='info'>";
		echo "<div class='bg-light'>";
		echo "<h3 class='title h5'>" . get_the_title() . "</h2>";
		echo "<p class='price'>$m2price<span> / m<sup>2</sup></span></p>";
		echo "</div>";
		echo "<div class='bg-color ep-button'>";
		echo "<span>Bekijk product</span>";
		echo "</div>";
		echo "</div>";
		woocommerce_template_loop_product_link_close();
		// woocommerce_template_loop_add_to_cart();
		?>
	</div>
</li>


<!-- pvc
  plak
  klik
laminaat
parket

trapbekleding -->
