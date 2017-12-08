<?php

/**
	* Shortcode handler
*/

$c = new EP_Product_List();

$args = array(
	'post_type' => $post_type,
	'posts_per_page' => $per_page,
	'orderby' => $orderby,
	'order' => $order
);

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim( 'ep-product-list' )
), $args );

// $query = new WP_Query($args);
echo do_shortcode( '[ep-product-list '.$atts.']' );
