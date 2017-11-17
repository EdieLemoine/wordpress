<?php

class EP_Admin extends Edies_Plugin {

  public function __construct() {}

  public function footer_content() {
    if ( wp_script_is( 'outdatedbrowser' ) ) : echo '<div id="outdated"></div>'; endif;
    if ( LIVERELOAD ) : echo '<script src="http://localhost:' . LIVERELOAD_PORT . '/livereload.js" charset="utf-8"></script>'; endif;
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
