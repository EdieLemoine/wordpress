<?php

class EP_Part_Parallax {
  private $active;

  function __construct() {
    $this->check( $this->active );
  }

  public function check( $active ) {
    wp_script_is( 'ep-parallax' ) ?: wp_enqueue_script( 'ep-parallax' );
    $this->active = wp_script_is( 'ep-parallax' );
  }
}
