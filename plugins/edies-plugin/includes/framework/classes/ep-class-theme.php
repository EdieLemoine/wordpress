<?php

/*
  This class adds Cornerstone elements.
  How to add an element correctly: If the folder is called "folder-name", name the class "EP_{Folder_Name}"
  To disable an element, prefix the folder name with a dot (".")
*/

class EP_Theme extends Edies_Plugin {

  public function __construct() {
    $this->change_logo( LOGO );
  }
  
  public function register_cornerstone_integration() {
    cornerstone_register_integration( $this->slug, 'EP_Cornerstone' );
  }

  public function disable_theme() {
    remove_action( 'wp_head', 'x_output_generated_styles', 9998 ); // Remove customizer output
    remove_action( 'wp_enqueue_scripts', 'x_enqueue_site_scripts' );
    remove_action( 'wp_enqueue_scripts', 'x_legacy_cranium_enqueue_styles', 99999 ); // Remove legacy customizer output
    remove_action( 'wp_enqueue_scripts', 'x_enqueue_site_styles' );

    // $cornerstone_front_end = new Cornerstone_Front_End( $this->slug );
    // remove_action( 'wp_enqueue_scripts', array( Cornerstone_Front_End::$instance, 'scripts' ) );
    // remove_action( 'wp_enqueue_scripts', array( Cornerstone_Front_End::$instance, 'styles' ) );
  }

  public function disable_cranium() {
    remove_action( 'template_redirect', 'x_legacy_modes', 25 );
    add_action( 'template_redirect', array( $this, 'x_legacy_modes_v2' ), 25 );
  }

  public function x_legacy_modes_v2() {
    $lgcy_path = X_TEMPLATE_PATH . '/framework/legacy';

    $cranium_headers = apply_filters( 'x_legacy_cranium_headers', true );
    $cranium_footers = apply_filters( 'x_legacy_cranium_footers', true );

    $cranium = $cranium_headers || $cranium_footers;

    if ( $cranium_headers ) {
      require_once( $lgcy_path . '/cranium/headers/setup.php' );
    }
    if ( $cranium_footers ) {
      require_once( $lgcy_path . '/cranium/footers/setup.php' );
    }
  }

  public function change_logo( $logo ) {
    update_option( 'x_logo', $logo);
  }
}
