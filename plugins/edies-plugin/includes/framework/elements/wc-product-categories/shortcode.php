<?php

/**
	* Shortcode handler
*/
$atts = cs_atts(array(
  'order' => $order,
  'orderby' => $orderby,
  'parent' => $parent,
  'columns' => $columns,
  'number' => $number,
  'hide_empty' => $hide_empty,
  'ids' => $ids
));

echo do_shortcode("[product_categories $atts]");
