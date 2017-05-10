<?php

class EP_Admin extends Edies_Plugin {
  protected $version;

  public function __construct( $version ) {
    $this->version = $version;

    $this->api_key = 'AIzaSyAgcvh-TKAlWWBVmX2izp_jmJR-0g_hpnY';
    parent::$loader->add_action('init', $this, 'queue');
  }

  public function queue() {
    // Use Google Maps
    if ( $this->api_key ) {
      add_filter( 'acf/fields/google_map/api', $this->api_key ); // Registers API with ACF Pro

      $this->api_key = esc_attr( $this->api_key );
      $this->script_url = add_query_arg( array( 'key' => $this->api_key ), 'https://maps.googleapis.com/maps/api/js?v=3' );

      wp_register_script( 'google-maps', $this->script_url, '', true );
      $this->add_script( 'ep-google-maps', 'ep-google-map.js', '', true );
    }

    // Register scripts
    $this->add_script( 'ep_admin_script', 'ep-admin.js' );
    $this->add_script( 'ep_script', 'ep-script.js' );
    $this->add_script( 'isotope', 'isotope.min.js' );

    // Register styles
    $this->add_style( 'ep_style', 'ep-style.css' );
    $this->add_style( 'ep_admin_style', 'ep-admin.css' );

    if ( is_admin() ) : // Admin
      wp_enqueue_script( 'ep_admin_script' );
      wp_enqueue_style( 'ep_admin_style' );
    endif;

    wp_enqueue_script( 'google-maps' );
    wp_enqueue_script( 'ep_script' );
    wp_enqueue_style( 'ep_style' );
  }

  public function live_reload() {
    return '<script src="http://localhost:35729/livereload.js" charset="utf-8"></script>';
  }

  public function print_scripts() {
    if ( is_user_logged_in() ) :
      global $wp_scripts;
      echo PHP_EOL . '<!-- Enqueued scripts: ';
      foreach( $wp_scripts->queue as $script ) :
        echo $script . ' || ';
      endforeach;
      echo ' -->' . PHP_EOL;
    endif;
  }

  public function print_styles() {
    if ( is_user_logged_in() ) :
      global $wp_styles;
      echo PHP_EOL . '<!-- Enqueued styles: ';
      foreach ( $wp_styles->queue as $style ) :
        echo $style . ' || ';
      endforeach;
      echo ' -->' . PHP_EOL;
    endif;
  }

  // public function remove_scripts() {
  //   // Dequeue scripts and styles
  //   wp_dequeue_script( 'cs-google-maps' );
  //   wp_dequeue_style( 'x-cranium-migration' );
  // }

  // Private functions
  private function add_script( $name, $file, $deps = null, $footer = true ) {
    if ( $deps == null ) :
      $deps = array( 'jQuery' );
    endif;

    return wp_register_script( $name, DIR_JS . $file, $deps, $footer );
  }

  private function add_style( $name, $file ) {
    return wp_register_style( $name, DIR_CSS . $file );
  }
}
