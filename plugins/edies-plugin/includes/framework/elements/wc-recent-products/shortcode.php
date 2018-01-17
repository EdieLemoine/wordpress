<?php

/**
	* Shortcode handler
*/

$atts = cs_atts(array(
  'per_page' => $per_page,
  'columns' => $columns,
  'orderby' => $orderby,
  'order' => $order,
));

$wrapper_atts = cs_atts(array(
  'id' => $id,
  'class' => $class
));

echo "<div $wrapper_atts>" . do_shortcode("[recent_products $atts]") . "</div>";
