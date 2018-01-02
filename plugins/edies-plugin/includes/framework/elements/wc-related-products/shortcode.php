<?php

/**
	* Shortcode handler
*/
$atts = cs_atts(array(
  'per_page' => $per_page,
  'columns' => $columns,
  'orderby' => $orderby
));

echo do_shortcode("[related_products $atts]");
