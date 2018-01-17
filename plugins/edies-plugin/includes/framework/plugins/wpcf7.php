<?php
// wpcf7_remove_form_tag( 'submit' );

add_action( 'wpcf7_init', 'ep_wpcf7_add_form_tag_submit' );
function ep_wpcf7_add_form_tag_submit() {
  wpcf7_add_form_tag( 'submit', 'ep_replace_wpcf7_button' );
}

function ep_replace_wpcf7_button( $tag ) {
  $class = wpcf7_form_controls_class( $tag->type );

  $atts = array();

  $atts['class'] = $tag->get_class_option( $class );
  $atts['id'] = $tag->get_id_option();
  $atts['tabindex'] = $tag->get_option( 'tabindex', 'signed_int', true );

  $value = isset( $tag->values[0] ) ? $tag->values[0] : '';

  if ( empty( $value ) ) {
    $value = __( 'Send', 'contact-form-7' );
  }

  $atts['type'] = 'submit';
  $atts['text'] = $value;
  $atts['class'] = 'global ' . $atts['class'];
  $atts['onclick'] = "jQuery(this).closest('form').submit();";
  $atts = wpcf7_format_atts( $atts );

  // pretty_print($atts);
  // $html = sprintf( '<a class="" onclick="jQuery(this).closest("form").submit();" %1$s></a>', $atts );
  return "<span class='wpcf7-form-control-wrap submit-button'>[eps_button $atts]</span>";
}
