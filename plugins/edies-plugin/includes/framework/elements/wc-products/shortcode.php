<?php

/**
	* Shortcode handler
*/
$atts = cs_atts(array(
  'id' => $id,
  'sku' => $sku,
  'columns' => $columns,
  'orderby' => $orderby,
  'order' => $order
));

echo do_shortcode("[products $atts]");
