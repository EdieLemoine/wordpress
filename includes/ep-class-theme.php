<?php

class Edies_Plugin_Theme {
  private $version;

  public function __construct( $version ) {
    $this->version = $version;
  }

  public function disable_x_css() {
    remove_action( 'wp_head', 'x_output_generated_styles', 9998, 0 );
  }

  public function register_elements() {
    $path = plugin_dir_path( __FILE__ ) . 'elements/';

    cornerstone_register_element( 'Cat_Button', 'cat-button', $path . 'cat-button' );
    cornerstone_register_element( 'Custom_Map', 'custom-map', $path . 'custom-map' );
    cornerstone_register_element( 'Portfolio_Block', 'portfolio-block', $path . 'portfolio-block' );
  }

  public function icon_map( $icon_map ) {
    $icon_map['edies-plugin'] = plugin_dir_url( __FILE__ ) . '/assets/svg/icons.svg';
    return $icon_map;
  }
}

?>
