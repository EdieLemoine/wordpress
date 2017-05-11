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
    include_once PATH . 'ep-scss-variables.php';
    $this->var_class = new EP_Variables();

    // $this->variables = $this->var_class->variables;
    $this->variables = get_object_vars($this->var_class);

    $this->vars = $this->get_variables( DIR_FRAMEWORK . 'edit.scss' );
    $this->pretty_print( $this->vars );
  }

  public function get_variables( $loc ) {

    $file = file_get_contents( $loc );
    preg_replace( '/;.*\/\/$/', $file, $file );

    $arr = explode( '// ', $file );
    $newArr = '';

    foreach ( $arr as $key ) :
      preg_match_all( '/\$.*/', $key, $content  );

      $title = preg_replace( '/\$.*/', '', $key );
      $content = array_filter( $content );
      $title = trim( str_replace( '/', '', $title ) );

      if ( !empty( $content ) ) :
        $newArr[ $title ] = array();
        foreach ( $content[0] as $val  ) :
          $newval = explode(':', $val);
          $output = str_replace(';', '', $newval );
          $newArr[ $title ][ trim( $output[0] ) ] = trim( $output[1] );
        endforeach;
      endif;
    endforeach;

    return $newArr;
  }

  public function disable_theme() {
    remove_action( 'wp_head', 'x_output_generated_styles', 9998 ); // Remove customizer output
    remove_action( 'wp_enqueue_scripts', 'x_legacy_cranium_enqueue_styles', 99999 ); // Remove legacy customizer output
  }

  public function register_cornerstone_integration() {
    cornerstone_register_integration( $this->slug, 'EP_Cornerstone' );
  }
}

?>
