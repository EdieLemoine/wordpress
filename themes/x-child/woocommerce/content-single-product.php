<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="x-section">

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
	<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="ep-row ep-m-fw-w ep-row-m">
			<div class="ep-1-1">
				<?php echo woocommerce_template_single_title(); ?>
			</div>
		</div>
		<div class="ep-row ep-m-fw-w ep-row-m">
			<div class="ep-1-2 ep-m-1-1">
				<div class="product-image">
					<?php
						/**
						 * woocommerce_before_single_product_summary hook.
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>
			</div>
			<div class="ep-1-2 ep-m-1-1">
				<div class="product-summary">

					<?php
						/**
						 * woocommerce_single_product_summary hook.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */

						 global $product;

						 echo woocommerce_template_single_excerpt();

						 $productID = $product->get_ID();
						 $dimensions = $product->get_dimensions(false);
						 $attributes = $product->get_attributes();
						 $m2 = $product->get_attributes()['pakinhoud']['data']['options'][0];

						 ?>
						 <script type="text/javascript">
						 var fw_productID = <?php echo $productID; ?>;
						 var fw_prijs = <?php echo $product->get_price(); ?>;
						 var fw_vierkantemeter = <?php echo $m2; ?>;
						 </script>

							 <table>
								 <tr>
									 <th><?php _eep( 'Vierkante meter per pak' ) ?></th>
									 <td class="product_dimensions"><?php echo $m2 . 'm<sup>2</sup>'; ?></td>
								 </tr>
								 <tr>
									 <th><?php _eep( 'Prijs per vierkante meter' ) ?></th>
									 <td class="product_dimensions"><span class="price"><?php echo wc_price( $product->get_price() / $m2); ?></span></td>
								 </tr>

								 <!-- <tr>
									 <th><?php //_e( 'Dimensions', 'woocommerce' ) ?></th>
									 <td class="product_dimensions"><?php //echo esc_html( wc_format_dimensions( $product->get_dimensions( false ) ) ); ?></td>
								 </tr> -->
								 <!-- <tr>
									 <th><?php //_eep( 'Prijs per pak' ) ?></th>
									 <td class="product_dimensions">...</td>
								 </tr> -->
							 </table>

						 <div class="calculator">
							 <h2 class="h4">Hoeveel m<sup>2</sup> heeft u nodig?</h2>
							 <table>
								 <tr>
									 <td><label for="m2">Aantal vierkante meter (m<sup>2</sup>)</label></td>
									 <td><input id="m2" type="number" step="0.5" min="1"></td>
								 </tr>
								 <tr>
									 <td><label for="zaagverlies">Bereken 5% zaagverlies</label></td>
									 <td><input type="checkbox" id="zaagverlies" value=""></label></td>
								 </tr>
								 <tr>
									 <td><label for="pakken">Aantal pakken</label></td>
									 <td><span id="pakken" type="text"></span></label></td>
								 </tr>
								 <tr>
									 <td><label for="pakken">Uw prijs</label></td>
									 <td><span id="prijs" type="text"><?php echo wc_price( 0 ); ?></span></label></td>
								 </tr>
							 </table>
						 </div>

						 <!-- Pass variables to js -->
						 <?php

						 echo woocommerce_template_single_add_to_cart();
						 // echo woocommerce_template_single_meta();
						 // echo woocommerce_template_single_sharing();

						// do_action( 'woocommerce_single_product_summary' );
						// echo woocommerce_template_single_title();
					?>
				</div>
			</div>
		</div>
		<?php
			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div><!-- #product-<?php the_ID(); ?> -->
	<?php do_action( 'woocommerce_after_single_product' ); ?>
</div>
