<?php

/**
 *
 */
class Edie_Custom {
  protected $slug;
  protected $version;

  public function __construct() {
    $this->slug = 'edie-custom';
    $this->version = '0.1.0';

    $this->load_dependencies();
    $this->define_admin_hooks();
  }

  private function load_dependencies() {
    require_once 'ep-class-admin.php';
    require_once 'ep-class-loader.php';
    $this->loader = new Edie_Custom_Loader();
  }

  private function define_admin_hooks() {
    $admin = new Edie_Custom_Admin( $this->get_version() );
    $this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );
    $this->loader->add_action( 'add_meta_boxes', $admin, 'add_meta_box' );
    $this->loader->add_action( 'add_menu_pages', $admin, 'add_menu_pages' );
    $this->loader->add_action( 'wp_head', $admin, 'disable_x_css', 9998, 0 );
  }

  public function run() {
    $this->loader->run();
  }

  public function get_version() {
    return $this->version;
  }

}

?>
