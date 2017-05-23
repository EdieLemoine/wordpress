<?php

/**
 * Shortcode handler
*/
$c = new EP_Custom_Map();

$atts = cs_atts( array(
	'id' => $id,
	'post_types' => $post_types,
	'scroll' => $c->convert_bool( $scroll ),
	'center' => $center,
	'zoom' => $zoom,
	'height' => $height
));

echo do_shortcode('[ep-custom-map ' . $atts . ']');
