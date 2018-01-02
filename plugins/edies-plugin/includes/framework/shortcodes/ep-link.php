<?php

function ep_link( $atts ) {
  if ( array_key_exists( 't', $atts ) ) {
    $tel = $atts['t'];
    $link = preg_replace( "/^0+/", "+31", str_replace( ' ', '', $tel ) );
    return "<a href='tel:$link'>$tel</a>";
  }
  if ( array_key_exists( 'm', $atts ) ) {
    $mail = $atts['m'];
    return "<a href='mailto:$mail'>$mail</a>";
  }
}
