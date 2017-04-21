<?php

class Edies_Plugin_Admin extends Edies_Plugin {
  protected $version;
  protected $css;
  protected $js;

  public function __construct( $version ) {
    $this->version = $version;
    $this->css = plugin_dir_url(__FILE__) . '/css/';
    $this->js = plugin_dir_url(__FILE__) . '/css/';
  }

  public function enqueue_styles() {
    if ( is_user_logged_in() ) : // Admin CSS
      wp_enqueue_style( 'ep_admin_style', $this->css . 'ep-admin.css' );
    endif;

    wp_enqueue_style( 'ep_style', $this->css . 'ep-style.css' );
  }

  public function enqueue_scripts() {
    // $this->add_script( 'ep_admin_script', 'ep-script.js' );
    $this->add_script( 'ep_script', 'ep-script.js' );
    $this->add_script( 'isotope', 'isotope.min.js' );

    if ( is_user_logged_in() ) : // Admin CSS
      wp_enqueue_script( 'ep_admin_script' );
    endif;

    wp_enqueue_script( 'ep_script' );
  }

  public function add_menu_pages() {
    add_menu_page(
      $this->text( 'Overview' ),
      $this->text( 'Edie&#39;s Plugin' ),
      'manage_options',
      'edies-plugin/edies-plugin-admin.php',
      '',
      'dashicons-carrot',
      3
    );
  }

  public function add_post_types() {
    register_post_type(
      'ep-slides',
      array(
        'labels' => array(
          'name' => $this->text( 'Slides' ),
          'singular_name' => $this->text( 'Slide' ),
        ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'menu_icon' => 'dashicons-slides',
        'show_in_nav_menus' => false,
        'show_in_menu' => 'edies-plugin/edies-plugin-admin.php',
      )
    );
    register_post_type(
      'ep-portfolio',
      array(
        'labels' => array(
          'name' => $this->text( 'Portfolio Items' ),
          'menu_name' => $this->text( 'Portfolio' ),
          'singular_name' => $this->text( 'Portfolio Item' ),
        ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'menu_icon' => 'dashicons-portfolio',
        'show_in_nav_menus' => false,
        'show_in_menu' => 'edies-plugin/edies-plugin-admin.php',
      )
    );
  }

  public function dequeue_scripts() {
    wp_dequeue_script( 'cs-google-maps' );
  }

  // Private functions
  private function add_script( $name, $file, $deps = null, $footer = true ) {
    if ( $deps == null ) :
      $deps = array('jQuery');
    endif;

    return wp_register_script( $name, $this->js . $file, $deps, $footer );
  }
}
