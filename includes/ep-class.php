<?php

/**
 * Main Plugin class
 */
class Edies_Plugin {
  protected $version;
  protected $slug;

  public function __construct() {
    $this->slug = 'edies-plugin';
    $this->version = '0.1.0';

    $this->load_dependencies();
    $this->define_hooks();
  }

  private function load_dependencies() {
    require_once 'ep-class-loader.php';
    require_once 'ep-class-admin.php';
    require_once 'ep-class-shortcodes.php';
    require_once 'ep-class-templates.php';
    require_once 'ep-class-theme.php';
    require_once 'ep-class-updater.php';

    $this->loader = new Edies_Plugin_Loader();
  }

  private function define_hooks() {
    // Admin
    $admin = new Edies_Plugin_Admin( $this->get_version() );
    $this->loader->add_action( 'wp_enqueue_scripts', $admin, 'enqueue_css' ); // Enqueue custom css

    // Shortcodes
    new Edies_Plugin_Shortcodes( $this->get_version() ); // __construct function adds the shortcodes

    // Templates
    $templates = new Edies_Plugin_Templates( $this->get_version() );
    $this->loader->add_filter( 'single_template', $templates, 'page_template' ); // Change single page template
    $this->loader->add_filter( 'archive_template', $templates, 'category_template' ); // Change archive page template

    // Theme
    $theme = new Edies_Plugin_Theme( $this->get_version() );
    // $this->loader->add_action( 'wp_head', $theme, 'disable_x_css', 9998, 0 ); // Disable parent theme css
    $this->loader->add_action( 'cornerstone_register_elements', $theme, 'register_elements' ); // Register custom Cornerstone elements
    $this->loader->add_filter( 'cornerstone_icon_map', $theme, 'icon_map' ); // Map icons to the custom Cornerstone elements

    // Updater
    $updater = new Edies_Plugin_Updater( $this->get_version() );
    $this->loader->add_action( 'check_event', $updater, 'check_update' );
    $this->loader->add_filter( 'http_request_args', $updater, 'updates_exclude', 5, 2 );
  }

  public function get_version() {
    return $this->version;
  }

  public function run() {
    $this->loader->run();
  }
}

?>
