<?php

function eps_kraam_list( $atts ) {
  $a = shortcode_atts( array(
    'post_type' => 'ac-winkel',
    'taxfree' => false,
    'orderby' => 'title'
  ), $atts );

  // Output
  $args = array(
    'post_type' => $a['post_type'],
    'order_by' => $a['orderby'],
    'meta_query' => array(
      'relation' => 'OR',
    )
  );

  if ($a['taxfree'] == true) {
    $args['meta_query'][] = array(
      'key'		=> 'eu_taxfree',
      'compare'	=> '==',
      'value'		=> '1'
    );
  }

  $output = '';

  $query = new WP_Query($args);

  $calc = function( $value ) {
    if ( $value == 2 OR $value == 4 ):
      $cols = 2;
    elseif ( $value % 4 == 0 ):
      $cols = 4;
    else:
      $cols = 3;
    endif;
    return $cols;
  };

  $i = 0;
  $post_count = $calc( $query->post_count );

  if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post();
      $i++;

      $output .= do_shortcode('[ac-kraam post_type="' . $args['post_type'] . '"]');

      if ($i % $post_count == 0) :
        $output .= '</div><div class="cat-row">';
      endif;

    endwhile; ?>
    <?php wp_reset_postdata(); ?>
   <?php endif;

  return '<div class="cat-' . $post_count . ' cf"><div class="cat-row">' . $output . '</div></div>';
}
