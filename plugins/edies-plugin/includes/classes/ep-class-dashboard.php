<?php

class EP_Dashboard extends Edies_Plugin {
  
  protected $css;
  protected $js;

  public function __construct() {
    
  }

  public function add_menu_pages() {
    add_menu_page(
      $this->__( 'Overview' ),
      $this->__( 'Edie&#39;s Plugin' ),
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
          'name' => $this->__( 'Slides' ),
          'singular_name' => $this->__( 'Slide' ),
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
          'name' => $this->__( 'Portfolio Items' ),
          'menu_name' => $this->__( 'Portfolio' ),
          'singular_name' => $this->__( 'Portfolio Item' ),
        ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'menu_icon' => 'dashicons-portfolio',
        'show_in_nav_menus' => false,
        'show_in_menu' => 'edies-plugin/edies-plugin-admin.php',
      )
    );
  }
}
