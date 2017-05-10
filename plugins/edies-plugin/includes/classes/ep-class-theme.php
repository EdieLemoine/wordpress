<?php

/*
  This class adds Cornerstone elements.
  How to add an element correctly: If the folder is called "folder-name", name the class "EP_{Folder_Name}"
  To disable an element, prefix the folder name with a dot (".")
*/

class EP_Theme extends Edies_Plugin {
  protected $version;

  public function __construct( $version ) {
    $this->version = $version;
  }

  public function generate_custom_scss() {
    include_once PATH . 'ep-scss-variables.php';
    $variables = new EP_Variables();
  }

  public function disable_theme() {
    remove_action( 'wp_head', 'x_output_generated_styles', 9998 ); // Remove customizer output
    remove_action( 'wp_enqueue_scripts', 'x_legacy_cranium_enqueue_styles', 99999 ); // Remove legacy customizer output
    // remove_action( 'template_redirect', 'x_legacy_modes', 25 );
  }

  public function dequeue() {
    remove_all_actions( 'x_enqueue_styles' );
  }
}

?>
