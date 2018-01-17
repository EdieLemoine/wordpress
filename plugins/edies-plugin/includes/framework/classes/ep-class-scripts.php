<?php

/**
 *
 */
class EP_Scripts extends Edies_Plugin {

  function __construct() {
    if ( ep_get_option( 'google__maps_enabled') and ep_get_option( 'google__global_api' ) )
      define( 'API_KEY', ep_get_option( 'google__global_api' ) );
  }

  // Enqueue scripts and styles
  public function queue() {
    // Register scripts
    foreach ( glob( PATH_JS . '*' ) as $file ) :
      if ( !is_dir( $file ) ) :
        $files[] = array( basename( $file, '.min.js'), basename( $file ) );
      else :
        foreach ( glob( trailingslashit( $file ) . '*' ) as $subfile ) :
          if ( !is_dir( $subfile ) ) :
            $files[] = array(
              basename( $subfile, '.min.js'),
              trailingslashit( basename( $file ) ) . basename( $subfile )
            );
          endif;
        endforeach;
      endif;
    endforeach;

    foreach ( $files as $file ) :
      $this->add_script( $file[0], $file[1] );
    endforeach;

    // Add Google Maps
    if ( defined( 'API_KEY' ) ) :
      if ( defined( 'ACTIVE_ACF' ) )
        add_filter( 'acf/fields/google_map/api', API_KEY ); // Registers API with ACF Pro

      $this->api_key = esc_attr( API_KEY );
      $script_url = add_query_arg( array( 'key' => $this->api_key ), 'https://maps.googleapis.com/maps/api/js' );

      wp_register_script( 'google-maps', $script_url, null, true );
      // $this->add_script( 'snazzy-info-window', 'snazzy-info-window/snazzy-info-window.min.js', array( 'google-maps' ) );
      $this->add_script( 'ep-custom-map', 'ep-custom-map.min.js', array( 'google-maps' ) );
    endif;
    $this->add_script( 'ep-opening-hours', 'ep-opening-hours.min.js', array( 'jquery' ) );

    // Register styles
    $this->add_style( 'ep_style', 'ep-style.css' );

    // Enqueue scripts
    wp_enqueue_script( 'outdatedbrowser' );
    wp_enqueue_script( 'lightslider' );

    wp_enqueue_style( 'ep_style' );
  }

  public function add_google_analytics() { ?>
    <script type="text/javascript">
      <?php ep_option( 'google__analytics_id' ); ?>
    </script>
  <?php }

  // Enqueue admin scripts and styles
  public function admin_queue() {
    $this->add_script( 'ep_admin_script', 'ep-admin.min.js' );
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
