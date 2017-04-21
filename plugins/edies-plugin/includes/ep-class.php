<?php

/**
 * Main Plugin class
 */
class Edies_Plugin {
  protected $version;
  protected $slug = 'edies-plugin';

  public function __construct() {
    $this->version = '0.1.0';

    $this->load_dependencies();
    $this->define_hooks();

    register_activation_hook( __FILE__, 'flush_rewrite' ); // Rewrite permalink structure on activation of plugin
  }

  private function load_dependencies() {
    require_once 'ep-class-loader.php';
    require_once 'ep-class-admin.php';
    require_once 'ep-class-shortcodes.php';
    require_once 'ep-class-templates.php';
    require_once 'ep-class-theme.php';

    // Initiate loader
    $this->loader = new Edies_Plugin_Loader( $this->get_version() );
  }
  public function text( $string ) {
    return __( $string, $this->slug );
  }

  private function define_hooks() {
    // Admin
    $admin = new Edies_Plugin_Admin( $this->get_version() );
    $this->loader->add_action( 'init', $admin, 'add_menu_pages' ); // Add menu pages
    $this->loader->add_action( 'init', $admin, 'add_post_types' ); // Add post types
    $this->loader->add_action( 'wp_enqueue_scripts', $admin, 'enqueue_styles' ); // Enqueue custom styles
    $this->loader->add_action( 'wp_enqueue_scripts', $admin, 'enqueue_scripts' ); // Enqueue custom scripts
    $this->loader->add_action( 'wp_enqueue_scripts', $admin, 'dequeue_scripts' ); // Dequeue js

    // Shortcodes
    new Edies_Plugin_Shortcodes( $this->get_version() ); // its __construct function adds the shortcodes

    // Templates
    $templates = new Edies_Plugin_Templates( $this->get_version() );
    $this->loader->add_filter( 'single_template', $templates, 'set_single_template' ); // Change single page template
    $this->loader->add_filter( 'archive_template', $templates, 'set_archive_template' ); // Change archive page template

    // Theme
    $theme = new Edies_Plugin_Theme( $this->get_version() );
    $this->loader->add_action( 'cornerstone_register_elements', $theme, 'register_elements' ); // Register custom Cornerstone elements
    $this->loader->add_filter( 'cornerstone_icon_map', $theme, 'icon_map' ); // Map icons to the custom Cornerstone elements
    $this->loader->remove_action( 'wp_head', 'x_output_generated_styles', 9998 ); // Remove customizer output
    $this->loader->remove_action( 'wp_enqueue_scripts', 'x_legacy_cranium_enqueue_styles', 99999 ); // Remove legacy customizer output
  }

  private function flush_rewrite() {
    flush_rewrite_rules();
  }

  public function get_version() {
    return $this->version;
  }

  public function run() {
    $this->loader->run();
  }
}

?>
