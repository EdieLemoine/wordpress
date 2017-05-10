<?php

/**
 * Shortcode handler
*/
$c = new EP_Custom_Map();

$atts = cs_atts( array(
	'id' => $atts['id'],
	'post_types' => $post_types,
	'scroll' => $c->convert_bool( $scroll ),
	'center' => $center,
	// 'marker' => $marker,
	// 'markerName' => $markerName,
	'zoom' => $zoom,
	'height' => $height
	// 'markers' => false
));

echo do_shortcode('[ep-kaart ' . $atts . ']');
