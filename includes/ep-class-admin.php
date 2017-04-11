<?php

class Edies_Plugin_Admin extends Edies_Plugin {

  public function __construct() {
    
  }

  public function enqueue_css() {

    $script_url = 'https://maps.googleapis.com/maps/api/js?v=3';
    $api_key = esc_attr( 'AIzaSyCi0-do7r0JlV4mPknNCoLpqPayanxb7eU' );
    $script_url = add_query_arg( array( 'key' => $api_key ), $script_url );

    wp_register_script( 'ep-google-maps', $script_url );

    if ( is_user_logged_in() ) : // Admin CSS
      wp_enqueue_style( 'ep_admin', $this->css . 'ep-admin.css' );
    endif;
    echo $this->css;
  }

  public function add_menu_pages() {
    add_menu_page(
      __( 'Edie&#39;s Plugin', $this->slug ),
      'custom menu',
      'manage_options',
      'edie/edie-plugin-admin.php',
      '',
      plugins_url( 'myplugin/images/icon.png' ),
      6
    );
  }

  public function add_post_types() {

  }

  public function dequeue_scripts() {
    wp_dequeue_script( 'cs-google-maps' );
  }
}
