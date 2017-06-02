<?php

function ep_notification( $atts ) {
  $a = shortcode_atts( array(), $atts );

  return do_action( 'ep_notification' );
}
