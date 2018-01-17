<?php

$c = new EP_Shortcodes();
function eps_buttons( $atts ) {
  $atts = shortcode_atts(
    array(
      'post_type' => 'post',
      'orderby' => 'menu_order',
      'per_page' => -1,
      'order' => ASC
    ),
    $atts
  );

  $query = new WP_Query($atts);

  
  $i = 1;
  $output = '';

  if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
      $i++;
      // $id = get_the_slug();
      // $c->pretty_print($post);
      $title = trim(str_replace('madog', '', strtolower( get_the_title() ) ));

      $shortcode = "[x_button class=\"x-btn-global\" href=\"{$id}\"]{$title}[/x_button]";

      $output .= do_shortcode( $shortcode );

      endwhile;
      wp_reset_postdata();
    endif;
  return '<div class="ep-btn-group">' . $output . '</div>';
}
