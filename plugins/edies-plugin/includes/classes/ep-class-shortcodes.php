<?php

class EP_Shortcodes extends Edies_Plugin {
  protected $version;

  public function __construct( $version ) {
    $this->version = $version;
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
