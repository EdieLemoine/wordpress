<?php

class Edie_Custom_Admin {
  private $version;

  public function __construct( $version ) {
    $this->version = $version;
  }

  public function enqueue_styles() {
    wp_enqueue_style(
      'edie-custom-admin',
      plugin_dir_url( __FILE__ ) . 'dist/css/edie-custom-admin.css',
      array(),
      $this->version,
      false
    );
  }

  public function add_menu_pages() {

  }

  public function add_meta_box() {
     add_meta_box(
      'single-post-meta-manager-admin', //page
      'Edie Custom metabox', //Display name
      array( $this, 'render_meta_box' ), //callback
      'post', //Post type
      'normal',
      'core'
    );
  }

  public function render_meta_box() {
    require_once plugin_dir_path( __FILE__ ) . '/meta/ep-meta.php';
  }
  
  public function disable_x_css() {
    remove_action( 'wp_head', 'x_output_generated_styles', 9998, 0 );
  }
}

?>
