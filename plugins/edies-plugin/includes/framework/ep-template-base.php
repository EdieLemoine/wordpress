<?php

/*
  Main class for use with custom elements
*/

class EP_Template_Base extends EP_Templates {

  public function __construct() {

  }

  public static function part( $part ) {
    $file = DIR_FRAMEWORK . '/parts/ep-' . $part . '.php';

    if ( file_exists( $file ) ) :
      require_once $file;
      $classname = 'EP_Part_' . ucwords( $part );
      return new $classname();
    endif;
  }

  public static function button( $link, $text ) {
    echo do_shortcode( "[x_button class='x-btn x-btn-global' href='$link']$text[/x_button]" );
  }

}
