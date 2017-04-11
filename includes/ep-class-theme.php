<?php

class Edies_Plugin_Theme {
  protected $path;

  public function __construct(  ) {
    $this->path = plugin_dir_path( __FILE__ ) . 'elements/';
  }

  public function disable_x_css() {
    remove_action( 'wp_head', 'x_output_generated_styles', 9998, 0 );
  }

  public function register_elements() {
    $this->register_sortable_element( 'EP_Custom_Map', 'custom-map' );
    $this->register_sortable_element( 'EP_Advanced_Accordion', 'advanced-accordion' );

    // $this->register_element( 'EP_Portfolio_Block', 'portfolio-block' );
    $this->register_element( 'EP_Advanced_Button', 'advanced-button' );
  }

  private function register_element( $name, $slug ) {
    cornerstone_register_element( $name, $slug, $this->path . $slug );
  }

  private function register_sortable_element( $name, $slug ) {
    cornerstone_register_element( $name, $slug, $this->path . $slug );
    cornerstone_register_element( $name . '_Item', $slug . '-item', $this->path . $slug . '-item' );
  }

  public function icon_map( $icon_map ) {
    $icon_map['edies-plugin'] = $this->path . '/elements/icon-map.svg';
    return $icon_map;
  }
}

?>
