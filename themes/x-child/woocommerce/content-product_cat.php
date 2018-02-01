<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
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
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<li <?php wc_product_cat_class( 'ep-1-4 ep-l-1-3 ep-s-1-1', $category ); ?>>
	<?php

	woocommerce_template_loop_category_link_open( $category );
	echo "<div class='inner'>";

	echo "<div class=image>";
	woocommerce_subcategory_thumbnail( $category );

	echo "</div>";

	echo "<div class='info'>";

	echo "<div class='bg-dark'>";
	echo "<h2 class='title h4'>" . $category->name . "</h2>";

	echo "</div>";
	echo "<div class='bg-color ep-button'>";
	echo "<span>Bekijk producten</span>";
	echo "</div>";

	echo "</div>";
	

	// $count = $category->count > 0 ? '<span class="count">(' . $category->count . ')</span>' : "";
	// woocommerce_template_loop_category_title( $category );
	// echo "<h2 class='h4 title'>" .$category->name . "</h2>";

	// do_action( 'woocommerce_after_subcategory_title', $category );

	woocommerce_template_loop_category_link_close( $category );

?>
</li>
