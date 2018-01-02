<?php

/**
	* Shortcode handler
*/
$atts = cs_atts(array(
  'id' => $id,
  'sku' => $sku
));

echo do_shortcode("[product_page $atts]");
