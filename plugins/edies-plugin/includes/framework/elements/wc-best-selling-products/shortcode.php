<?php

/**
	* Shortcode handler
*/
$atts = cs_atts(array(
  'per_page' => $per_page,
  'columns' => $columns
));

echo do_shortcode("[best_selling_products $atts]");
