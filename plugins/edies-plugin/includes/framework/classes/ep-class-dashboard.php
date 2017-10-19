<?php

class EP_Dashboard extends Edies_Plugin {

  protected $css;
  protected $js;

  public function __construct() { }

  public function add_menu_pages() {
    add_menu_page(
      __ep( 'Overview' ),
      __ep( 'Edie&#39;s Plugin' ),
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
          'name' => __ep( 'Slides' ),
          'singular_name' => __ep( 'Slide' ),
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
          'name' => __ep( 'Portfolio Items' ),
          'menu_name' => __ep( 'Portfolio' ),
          'singular_name' => __ep( 'Portfolio Item' ),
        ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'menu_icon' => 'dashicons-portfolio',
        'show_in_nav_menus' => false,
        'show_in_menu' => 'edies-plugin/edies-plugin-admin.php',
      )
    );
    register_post_type(
      'otl-klanten',
      array(
        'labels' => array(
          'name' => __ep( 'Klanten' ),
          'menu_name' => __ep( 'Klanten' ),
          'singular_name' => __ep( 'Klant' ),
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
