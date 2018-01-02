<?php

class EP_Cornerstone extends EP_Theme {
  protected $elements;

  public function __construct() {
    $this->elements = $this->get_items();
    $this->initialize_base();
    $this->write_svg();

    add_action( 'cornerstone_register_elements', array( $this, 'register_elements' ) );
    add_filter( 'cornerstone_icon_map', array( $this, 'icon_map' ) );
  }

  public function register_elements() {
    $items = $this->elements;
    foreach ( $items as $item ) :
      cornerstone_register_element( $item['class'], $item['slug'], $item['dir'] );
    endforeach;
  }

  public function icon_map( $icon_map ) {
    $icon_map[$this->slug] = $this->icon_file();
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
      $elements[$i]['slug'] = basename( $item );
      $elements[$i]['class'] = 'EP_' . str_replace( '- ', '_', ucwords( str_replace( "-", "- ", basename( $item ) ) ) ); // Capitalizes class and replaces hyphens
      $elements[$i]['dir'] = PATH_ELEMENTS . basename( $item );
      $i++;
    endforeach;

    return $elements;
  }

  private function icon_file() {
    return PATH_ELEMENTS . 'icon-map.svg';
  }

  private function write_svg() {
    $str = file_get_contents( $this->icon_file() );
    $o = '';

    foreach ( $this->elements as $item ) :

      include $item['dir'] .'/definition.php';
      $t = new $item['class'];
      if ( array_key_exists( 'icon', $t->ui() ) ) :

      else :
        $icon = $item['dir'] . '/icon.svg';

        if ( ! file_exists( $icon ) ) :
          $file = fopen( $icon, 'w' );
        endif;

        $o .= '<symbol id="' . $item['slug'] . '" viewBox="-290 382 30 30">' . PHP_EOL;
        $o .= file_get_contents( $icon );
        $o .= '</symbol>' . PHP_EOL;
      endif;
    endforeach;

    $str = str_replace( '<!-- generated icons -->', "<!-- generated icons -->" . PHP_EOL . $o, $str  );

    file_put_contents( $this->icon_file(), $str );
  }
}
