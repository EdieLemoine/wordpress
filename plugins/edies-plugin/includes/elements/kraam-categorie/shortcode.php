<?php

/**
 * Shortcode handler
 */

// $atts = cs_atts( array(
// 	'id' => '',
// 	'class' => '',
// 	'style' => ''
// ) );

$class = new AlbertCuyp_Theme();

if ( $kraam_cat != '' ):
  $taxonomy = 'kraam-cat';
  $id = $kraam_cat; // Get selected category
  $post_type = 'ac-kraam';
else:
  $taxonomy = 'winkel-cat';
  $id = $winkel_cat; // Get selected category
  $post_type = 'ac-winkel';
endif;

// Get its term object
$term = get_term_by( 'id', $id, $taxonomy );

$acf_id = 'term_' . $class->get_original_id( $id, $post_type );

$title = $term->name;
$subtitle = get_field( 'subtitle', 'term_' . $id );
$image = get_field( 'foto', $acf_id );
$header_image = get_field( 'header_foto', $acf_id );
$url = get_term_link( $term );

if ( $subtitle == '' ):
	$subtitle = $term->name;
endif;

if ( !$image && $header_image ):
	$image = $header_image;
elseif ( !$header_image ):
	$image = 'http://albertcuyp-markt.amsterdam/wp-content/uploads/2017/03/none-1.jpg';
endif;

echo do_shortcode('[cs_cat_button
	heading="' . $title . '"
	subtitle="' . $subtitle . '"
	image="' . $image . '"
	url="' . $url . '"
	]'
);

?>
