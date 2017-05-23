<?php

class EP_Shortcodes extends EP_Theme {


  public function __construct() {

  }

  public function register_shortcodes() {
    $files = glob( DIR_SHORTCODES . "*.php" );

    foreach( $files as $file ) {
      include_once $file;
      $filename = basename( $file, '.php' );
      $functionname = $this->dash( $filename );

      add_shortcode( $filename, $functionname );

    }
  }
}
