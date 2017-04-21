<?php

class Edies_Plugin_Theme {
  protected $path;
  private $version;
  
  public function __construct( $version ) {
    $this->version = $version;
    $this->path = plugin_dir_path( __FILE__ ) . 'elements/';
  }

  public function disable_x_css() {
    wp_dequeue_style( 'x-cranium-migration' );
  }

  public function register_elements() {
    $this->register_sortable_element( 'EP_Custom_Map', 'custom-map' );
    $this->register_sortable_element( 'EP_Advanced_Accordion', 'advanced-accordion' );

    $this->register_element( 'EP_Masonry_Grid', 'masonry-grid' );
    $this->register_element( 'EP_Advanced_Button', 'advanced-button' );
    $this->register_element( 'EP_Image_Grid', 'image-grid' );
  }

  public function icon_map( $icon_map ) {
    $icon_map['edies-plugin'] = $this->path . 'icon-map.svg';
    return $icon_map;
  }

  // Private functions
  private function register_element( $name, $slug ) {
    cornerstone_register_element( $name, $slug, $this->path . $slug );
  }

  private function register_sortable_element( $name, $slug ) {
    cornerstone_register_element( $name, $slug, $this->path . $slug );
    cornerstone_register_element( $name . '_Item', $slug . '-item', $this->path . $slug . '-item' );
  }
}

?>
