<?php

class EP_Cornerstone extends EP_Theme {
  protected $elements;

  public function __construct() {
    $this->elements = $this->get_items();
    $this->write_svg();
    $this->initialize_base();

    add_action( 'cornerstone_register_elements', array( $this, 'register_elements' ) );
    add_filter( 'cornerstone_icon_map', array( $this, 'icon_map' ) );
  }

  public function register_elements() {
    $items = $this->elements;
    foreach ( $items as $item ) :
      cornerstone_register_element( $item['class'], $item['folder'], $item['dir'] );
    endforeach;
  }

  public function icon_map( $icon_map ) {
    $icon_map['edies-plugin'] = PATH_ELEMENTS . 'icon-map.svg';
    return $icon_map;
  }

  // Private
  private function initialize_base() {
    include_once PATH_FRAMEWORK . '/ep-element-base.php';

    $this->element_base = new EP_Element_Base();
  }

  private function get_items() {
    $i = 0;
    $elements = array();

    $items = preg_grep( '/^\./', glob( PATH_ELEMENTS . '*', GLOB_ONLYDIR ), PREG_GREP_INVERT); // Only select dirs not starting with .

    foreach ( $items as $item ) :
      $elements[$i]['folder'] = basename( $item );
      $elements[$i]['class'] = 'EP_' . str_replace( '- ', '_', ucwords( str_replace( "-", "- ", basename( $item ) ) ) ); // Capitalizes class and replaces hyphens
      $elements[$i]['dir'] = PATH_ELEMENTS . basename( $item );
      $i++;
    endforeach;

    return $elements;
  }

  private function write_svg() {
    $icon_map = PATH_ELEMENTS . 'icon-map.svg';
    $o = '';

    $o .= '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL . '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">' . PHP_EOL . '<svg xmlns="http://www.w3.org/2000/svg">' . PHP_EOL;

    foreach ( $this->elements as $item ) {
      $icon = $item['dir'] . '/icon.svg';

      if ( ! file_exists( $icon ) ) :
        $file = fopen( $icon, 'w' );
      endif;

      $o .= '<symbol id="' . $item['folder'] . '" viewBox="-290 382 30 30">' . PHP_EOL;
      $o .= file_get_contents( $icon );
      $o .= '</symbol>' . PHP_EOL;
    }
    $o .= '</svg>' . PHP_EOL;

    file_put_contents( $icon_map, $o );
  }
}
