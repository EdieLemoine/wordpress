<?php

/*
  This class adds Cornerstone elements.
  How to add an element correctly: If the folder is called "folder-name", name the class "EP_{Folder_Name}"
  To disable an element, prefix the folder name with a dot (".")
*/

class EP_Theme extends Edies_Plugin {
  private $var_class;
  public $variables;
  public $vars;

  public function __construct() {
    $this->load_variables();
  }

  public function load_variables() {
    include_once DIR_FRAMEWORK . 'ep-scss-variables.php';
    $this->var_class = new EP_Variables();

    $this->variables = get_object_vars($this->var_class);
    // $this->vars = $this->get_variables( DIR_FRAMEWORK . 'edit.scss' );
  }

  public function disable_theme() {
    remove_action( 'wp_head', 'x_output_generated_styles', 9998 ); // Remove customizer output
    remove_action( 'wp_enqueue_scripts', 'x_legacy_cranium_enqueue_styles', 99999 ); // Remove legacy customizer output
    remove_action( 'wp_enqueue_scripts', 'x_enqueue_site_styles' );
  }

  public function disable_cranium() {
    // remove_action( 'template_redirect', 'x_legacy_modes', 25 );
    // add_action( 'template_redirect', array( $this, 'x_legacy_modes_v2' ), 25 );
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

  public function register_cornerstone_integration() {
    cornerstone_register_integration( $this->slug, 'EP_Cornerstone' );
  }

  public function get_variables( $loc ) {

    // $file = file_get_contents( $loc );
    // preg_replace( '/;.*\/\/$/', $file, $file );
    //
    // $arr = explode( '// ', $file );
    // $newArr = '';
    //
    // foreach ( $arr as $key ) :
    //   preg_match_all( '/\$.*/', $key, $content  );
    //
    //   // $title = preg_replace( '/\$.*/', '', $key );
    //   $content = array_filter( $content );
    //   $title = trim( str_replace( '/', '', $title ) );
    //
    //   if ( !empty( $content ) ) :
    //     // $newArr[ $title ] = array();
    //     foreach ( $content[0] as $val  ) :
    //       $newval = explode(':', $val);
    //       $output = str_replace(';', '', $newval );
    //       $newArr[ trim( $output[0] ) ] = trim( $output[1] ); // $title ][
    //     endforeach;
    //   endif;
    // endforeach;
    // return newArr;
    return;
  }
}

?>
