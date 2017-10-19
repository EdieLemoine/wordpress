<?php

/**
 *
 */

class EP_Plugins extends Edies_Plugin {
  private $svg_support = false;
  
  function __construct() {
    $this->check_plugins();
    $this->set_options();
  }

  public function check_plugins() {
    // SVG Support
    if ( isset( $svgs_plugin_version ) ) {
      $this->svg_support = true;
    }
  }

  public function set_options() {
    // global $bodhi_svgs_options;
    //
    // $bodhi_svgs_options['advanced_mode'] = true;
    // $this->svg_support ? 'output-true' : ;
  }
}
