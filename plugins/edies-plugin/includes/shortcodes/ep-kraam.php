<?php

add_shortcode('ac-kraam', 'ac_kraam');

function ac_kraam( $atts ) {
  $a = shortcode_atts( array(
    'post_type' => 'ac-winkel',
    // 'orderby' => 'RAND'
  ), $atts );


  $title = get_the_title();
  $url = get_the_permalink();

  if ( get_field('subtitle') != '' ):
    $subtitle = get_field('subtitle');
  else:
    $subtitle = get_the_title();
  endif;

  if ( get_field('cat_foto') ):
    $image = get_field( 'cat_foto' );
  elseif ( get_field('header_foto') ):
    $image = get_field( 'header_foto' );
  else:
    $image = 'http://albertcuyp-markt.amsterdam/wp-content/uploads/2017/03/none-1.jpg';
  endif;

  return '[cs_cat_button heading="' . $title . '" subtitle="' . $subtitle . '" image="' . $image . '" url="' . $url . '"]';

}
