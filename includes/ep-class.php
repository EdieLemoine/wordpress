<?php

/**
 *
 */
class Edies_Plugin {
  protected $slug;
  protected $version;

  public function __construct() {
    $this->slug = 'edies-plugin';
    $this->version = '0.1.0';

    $this->load_dependencies();
    $this->define_admin_hooks();
  }

  private function load_dependencies() {
    require_once 'ep-class-admin.php';
    require_once 'ep-class-loader.php';
    require_once 'ep-class-theme.php';
    require_once 'ep-class-shortcodes.php';
    require_once 'ep-class-templates.php';
    $this->loader = new Edies_Plugin_Loader();
  }

  private function define_admin_hooks() {
    $templates = new Edies_Plugin_Templates( $this->get_version() );
    $shortcodes = new Edies_Plugin_Shortcodes( $this->get_version() );

    $admin = new Edies_Plugin_Admin( $this->get_version() );
    $theme = new Edies_Plugin_Theme( $this->get_version() );

    // $this->loader->add_action( 'admin_menu', $admin, 'add_menu_items' );
    $this->loader->add_action( 'init', $admin, 'add_post_types' );
    $this->loader->add_action( 'wp_enqueue_scripts', $admin, 'enqueue_css' );

    $this->loader->add_filter( 'single_template', $templates, 'page_template' );
    $this->loader->add_filter( 'archive_template', $templates, 'category_template' );

    $this->loader->add_action( 'wp_head', $theme, 'disable_x_css', 9998, 0 );
    $this->loader->add_action( 'cornerstone_register_elements', $theme, 'register_elements' );
    $this->loader->add_filter( 'cornerstone_icon_map', $theme, 'icon_map' );
  }

  public function run() {
    $this->loader->run();
  }

  public function get_version() {
    return $this->version;
  }
}

?>
