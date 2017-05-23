<?php

class EP_Admin extends Edies_Plugin {

  public function __construct() {
    parent::$loader->add_action( 'wp_print_scripts', $this, 'print_scripts' );
    parent::$loader->add_action( 'wp_print_styles', $this, 'print_styles' );
  }

  public function admin_queue() {
    $this->add_script( 'ep_admin_script', 'ep-admin.js' );
    $this->add_style( 'ep_admin_style', 'ep-admin.css' );

    wp_enqueue_script( 'ep_admin_script' );
    wp_enqueue_style( 'ep_admin_style' );
  }

  public function queue() {
    // Use Google Maps]
    if ( API_KEY != '' ) :
      add_filter( 'acf/fields/google_map/api', API_KEY ); // Registers API with ACF Pro

      $this->api_key = esc_attr( API_KEY );
      $script_url = add_query_arg( array( 'key' => $this->api_key ), 'https://maps.googleapis.com/maps/api/js?v=3' );

      wp_register_script( 'google-maps', $script_url, '', true );
      $this->add_script( 'ep-custom-map', 'ep-custom-map.js', 'google-maps', true );

      wp_enqueue_script( 'google-maps' );
    endif;

    // Register scripts
    $this->add_script( 'ep_script', 'ep-script.js' );
    $this->add_script( 'isotope', 'isotope.min.js' );

    // Register styles
    $this->add_style( 'ep_style', 'ep-style.css' );

    wp_enqueue_script( 'ep_script' );
    wp_enqueue_style( 'ep_style' );
  }

  public function live_reload() {
    echo '<script src="http://localhost:' . LIVERELOAD_PORT . '/livereload.js" charset="utf-8"></script>';
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
