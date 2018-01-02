<?php

/**
	* Shortcode handler
*/
$atts = cs_atts(array(
  'per_page' => $per_page,
  'columns' => $columns,
  'orderby' => $orderby,
  'order' => $order
));

echo do_shortcode("[sale_products $atts]");
