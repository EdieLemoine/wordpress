<?php

class EP_Admin extends Edies_Plugin {

  public function __construct() {}

  public function notification() {
    $output = '';
    $output .= '<br />admin: ' . ADMIN . is_admin();
    $output .= '<br />disable theme: ' . get_option( 'ep_load_theme' );
    $output .= '<br />livereload: ' . get_option( 'ep_live_reload' );
    // $output .= 'string';
    echo $output;
  }

  public function live_reload() {
    echo '<script src="http://localhost:' . LIVERELOAD_PORT . '/livereload.js" charset="utf-8"></script>';
  }

  public function print_scripts() {
    if ( is_user_logged_in() ) :

      global $wp_scripts;
      global $wp_styles;

      echo PHP_EOL . '<!-- Enqueued scripts: ';
      foreach( $wp_scripts->queue as $script ) :
        echo $script . ' || ';
      endforeach;
      echo ' -->' . PHP_EOL . '<!-- Enqueued styles: ';
      foreach ( $wp_styles->queue as $style ) :
        echo $style . ' || ';
      endforeach;
      echo ' -->' . PHP_EOL;
    endif;
  }
}
