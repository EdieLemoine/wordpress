<?php

class Edies_Plugin_Admin {
  private $version;

  public function __construct( $version ) {
    $this->version = $version;
  }

  public function enqueue_css() {
    $css = plugin_dir_URL(__FILE__) . '/css/';
    $js = plugin_dir_URL(__FILE__) . '/js/';

    $script_url = 'https://maps.googleapis.com/maps/api/js?v=3';
    $api_key = 'AIzaSyCi0-do7r0JlV4mPknNCoLpqPayanxb7eU';

    if ( $api_key ) {
      $api_key = esc_attr( $api_key );
      $script_url = add_query_arg( array( 'key' => $api_key ), $script_url );
    }

    if ( get_post_type( get_the_ID()) == 'ep-kraam' OR get_post_type( get_the_ID()) == 'ep-winkel' ) {

      wp_register_script( 'ep-google-maps', $script_url );
      wp_register_script( 'ep-vendor-js', $js . 'script.min.js', array( 'jquery' ), '', true );

      wp_enqueue_script( 'ep-google-maps' );
      wp_enqueue_script( 'ep-vendor-js' );
    }

    wp_enqueue_style( 'Vendor', $css . 'style.css' );
  }

  // public function add_menu_items() {
  //   add_menu_page(
  //     'Winkels & Kramen',
  //     'Vendors 2.0',
  //     'manage_options',
  //     'templates/ep-vendor-menu.php',
  //     '',
  //     'dashicons-store',
  //     3
  //   );
  // }

  public function add_post_types() {
    register_post_type( 'ep-kraam',
      array(
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-store',
        'labels' => array(
          'name' => __( 'Kramen', 'edies-plugin'  ),
          'singular_name' => __( 'Kraam', 'edies-plugin'  ),
          'add_new' => __( 'Kraam toevoegen', 'edies-plugin' ),
          'add_new_item' => __( 'Nieuwe kraam toevoegen', 'edies-plugin' )
        ),
        'supports' => array(
          'title',
          'editor'
        ),
        'rewrite' => array(
          'slug' => 'kraam'
        )
      )
    );
    register_taxonomy(
      'kraam-cat',
      'ep-kraam',
      array(
        'hierarchical' => true,
        'query_var' => true,
        'show_ui' => true,
        'rewrite' => array(
          'slug' => 'kramen',
          'hierarchical' => true
        )
      )
    );

    // Winkel
    register_post_type( 'ep-winkel',
      array(
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-store',
        'labels' => array(
          'name' => __( 'Winkels', 'edies-plugin'  ),
          'singular_name' => __( 'Winkel', 'edies-plugin'  ),
          'add_new' => __( 'Winkel toevoegen', 'edies-plugin' ),
          'add_new_item' => __( 'Nieuwe winkel toevoegen', 'edies-plugin' )
        ),
        'supports' => array(
          'title',
          'editor'
        ),
        'rewrite' => array(
          'slug' => 'winkel'
        )
      )
    );
    register_taxonomy(
      'winkel-cat',
      'ep-winkel',
      array(
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => array(
          'slug' => 'winkels',
          'hierarchical' => true
        )
      )
    );
  }

  public function add_shortcodes() {
    $shortcode = new Edies_Plugin_Shortcode( $this->get_version() );
  }

  public function disable_x_css() {
    remove_action( 'wp_head', 'x_output_generated_styles', 9998, 0 );
  }
}
