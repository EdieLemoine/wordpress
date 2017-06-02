<?php

class EP_Part_Parallax {
  private $active;

  function __construct() {
    $this->active = wp_script_is( 'ep-parallax' );
  }

  public function open() {
    if ( $this->active ) {
      echo '<div id="ep-parallax-outer"><div id="ep-parallax-inner"><div class="ep-parallax-wrapper">';
    }
  }

  public function close() {
    if ( $this->active ) {
      echo '</div></div></div>';
    }
  }
}
