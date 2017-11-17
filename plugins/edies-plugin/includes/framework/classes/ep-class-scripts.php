<?php

/**
 *
 */
class EP_Scripts extends Edies_Plugin {

  function __construct() {}

  // Enqueue scripts and styles
  public function queue() {
    // Register scripts
    $this->add_script( 'ep-parallax', 'ep-parallax.min.js' );
    $this->add_script( 'ep-slider', 'ep-slider.min.js' );
    $this->add_script( 'ep-lightbox', 'ep-lightbox.min.js' );

    // Use Google Maps
    if ( defined( 'API_KEY' ) ) :
      add_filter( 'acf/fields/google_map/api', API_KEY ); // Registers API with ACF Pro

      $this->api_key = esc_attr( API_KEY );
      $script_url = add_query_arg( array( 'key' => $this->api_key ), 'https://maps.googleapis.com/maps/api/js?v=3' );

      wp_register_script( 'google-maps', $script_url, array( 'jquery' ), true );
      $this->add_script( 'ep-custom-map', 'ep-custom-map.min.js', array( 'google-maps' ) );
    endif;

    // Register styles
    $this->add_style( 'ep_style', 'ep-style.css' );

    // Enqueue scripts
    // if ( wp_script_is( 'ep-custom-map', 'registered' ) ) :
    //   wp_enqueue_script( 'google-maps' );
    // endif;

    wp_enqueue_style( 'ep_style' );
  }

  // Enqueue admin scripts and styles
  public function admin_queue() {
    $this->add_script( 'ep_admin_script', 'ep-admin.js' );
    $this->add_style( 'ep_admin_style', 'ep-admin.css' );

    wp_enqueue_script( 'ep_admin_script' );
    wp_enqueue_style( 'ep_admin_style' );
  }

  // Dequeue scripts
  public function dequeue() {
    // wp_dequeue_script( 'cornerstone-site-head' );
    // wp_dequeue_script( 'cornerstone-site-body' );
  }

  // Private functions
  private function add_script( $name, $file, $deps = array( 'jquery' ), $footer = true ) {
    // Cache busting
    $time = !filemtime( PATH_JS . $file ) ? "" : '?date=' . filemtime( PATH_JS . $file );
    return wp_register_script( $name, URL_JS . $file . $time, $deps, null, $footer );
  }

  private function add_style( $name, $file ) {
    // Cache busting
    $time = !filemtime( PATH_CSS . $file ) ? "" : '?date=' . filemtime( PATH_CSS . $file );
    return wp_register_style( $name, URL_CSS . $file . $time );
  }
}
