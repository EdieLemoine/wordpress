<?php

/**
 * Shortcode handler
 */

// $atts = cs_atts( array(
// 	'id' => '',
// 	'class' => '',
// 	'style' => ''
// ) );

$class = new Kraam();

if ( $ac_kraam != '' ):
  $taxonomy = 'kraam-cat';
  $id = $ac_kraam; // Get selected category
  $post_type = 'ac-kraam';
else:
  $taxonomy = 'winkel-cat';
  $id = $ac_winkel; // Get selected category
  $post_type = 'ac-winkel';
endif;

// Get its term object
$post = get_post( $id );

$acf_id = $class->get_original_acf( $id, $post_type );

$title = get_the_title();
$subtitle = get_field( 'subtitle', $id );
$image = get_field( 'foto', $acf_id );
$header_image = get_field( 'header_foto', $acf_id );
$url = get_the_permalink();

if ( $subtitle == '' ):
	$subtitle = $post->name;
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
wp_reset_postdata();

?>
