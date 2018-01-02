<?php

/**
	* Shortcode handler
*/
$atts = cs_atts(array(
  'per_page' => $per_page,
  'columns' => $columns,
  'order' => $order,
  'orderby' => $orderby,
  'category' => $category
));

echo do_shortcode("[product_category $atts]");
