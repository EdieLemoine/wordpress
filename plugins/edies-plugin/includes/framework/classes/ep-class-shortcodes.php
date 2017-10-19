<?php

class EP_Shortcodes extends EP_Theme {


  public function __construct() {

  }

  public function register_shortcodes() {
    $files = glob( DIR_SHORTCODES . "*.php" );

    foreach( $files as $file ) {
      include_once $file;
      $filename = basename( $file, '.php' );
      $functionname = convert_dash( $filename );

      add_shortcode( $filename, $functionname );

    }
  }

  public function shortcode_filter( $output, $tag, $attr ) {
    if ( $tag != 'cs_section' AND $tag != 'x_section' ) { //make sure it is the right shortcode
      return $output;
    }

    // Removes inline style from x-section
    $output = preg_replace( '/(x-section.+?)style=".+?"/', '$1', $output, '1' );

    return $output;
  }
}
