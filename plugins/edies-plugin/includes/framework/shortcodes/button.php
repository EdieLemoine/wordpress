<?php

function eps_button( $atts, $text ) {
  $atts = shortcode_atts( array(
    'text' => '',
    'onclick' => '',
    'href' => '#',
    'class' => '',
    'button_style' => 'global'
  ), $atts, 'eps_button' );

  $text = $atts['text'] == '' ? $text : $atts['text'];

  if ( $atts['button_style'] == 'global' )
    $atts['class'] = "global " . ep_get_option( 'buttons__global_style' ) .' '. $atts['class'];

  // Prepend button class
  $atts['class'] = "ep-btn " . $atts['class'];

  // foreach ($atts as $att) {
  //   if ($att == '' ) {
  //     unset($atts[$att]);
  //   }
  // }

  if ( $atts['href'] == "#" )
    $atts['onclick'] .= "jQuery(this).click(function(e){e.preventDefault()});";

  // Remove atts that dont need to be output
  unset($atts['text']);
  unset($atts['button_style']);
  // pretty_print($atts);
  $atts = cs_atts($atts);

  if ( $text == '' )
    $text = "Button";

  return "<a $atts><span>$text</span></a>";
}
