<?php

function ep_product_list( $atts ) {
  $a = shortcode_atts( array(
    'post_type' => 'product',
    'orderby' => 'title',
    'style' => 'woocommerce'
  ), $atts );

  // Output
  $args = array(
    'post_type' => $a['post_type'],
    'orderby' => $a['orderby']
  );

  $output = '';
  $style = $a['style'];
  $query = new WP_Query( $args );

  $output .= "<div class='ep-product-list $style'>";
  $output .= "<div class='ep-product-list-inner'>";
  
  if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
      $url = get_the_permalink();
      $img = get_the_post_thumbnail();

      $output .= "<a href='$url' class='ep-product'>";
      $output .= "<img src='$img' />";
      $output .= get_the_title();
      $output .= "</a>";
    endwhile;
  endif;

  wp_reset_postdata();
  $output .= "</div></div>";

  return $output;
}
