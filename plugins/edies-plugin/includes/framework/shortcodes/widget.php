<?php

add_shortcode('ep-widget', 'ep_widget');

function eps_widget( $atts ) {
  $a = shortcode_atts( array(
    'widget' => ''
  ), $atts );

  return the_widget( $a['widget'] );
}
