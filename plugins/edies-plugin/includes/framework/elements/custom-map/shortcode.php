<?php

/**
 * Shortcode handler
*/

$c = new EP_Custom_Map();

$atts = cs_atts( array(
	'id' => $id,
	'post_types' => $post_type,
	'scroll' => $c->convert_bool( $scroll ),
	'center' => $center,
	'zoom' => $zoom,
	'height' => $height,
	'snazzy_style' => strip_tags($snazzy_style)
));

echo do_shortcode( "[eps_custom_map $atts]" );
