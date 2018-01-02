<?php

/**
	* Shortcode handler
*/
$atts = cs_atts(array(
  'id' => $id,
  'sku' => $sku
));

echo do_shortcode("[add_to_cart_url $atts]");
