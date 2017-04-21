<?php

class Edies_Plugin_Shortcodes {
  private $version;

  public function __construct( $version ) {
    $this->version = $version;
    // $this->add_shortcodes();
  }

  private function add_shortcodes() {
    // add_shortcode( 'shortcode-name', array( $this, 'shortcode_name_callback' ) );
  }

  private function shortcode_name_callback( $atts ) {
    return 'Shortcode content';
  }
}

?>
