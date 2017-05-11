<?php
/**
 * SCSS Variables
 */
class EP_Variables extends EP_Theme {

  public function __construct() {
    $this->define_vars();
    $this->create_file();
  }

  public function define_vars() {
    $this->primary_color = '#aa2525';
    $this->black = '#000';
    $this->dark_gray = '#333';
    $this->gray = '#6d6e71';
    $this->light_gray = '#fafafa';
    $this->white = '#fff';

    $this->variables = array(
      'colors' => array(
        'primary-color' => $this->primary_color,
        'secondary-color' => 'lighten($primary-color, 20%)',
        'black' => $this->black,
        'dark-gray' => $this->dark_gray,
        'gray' => $this->gray,
        'light-gray' => $this->light_gray,
        'white' => $this->white,
        'light-background-color' => $this->light_gray,
        'dark-background-color' => $this->dark_gray,
        'text-color-light' => $this->white,
        'text-color-dark' => $this->dark_gray,
      ),
      'global' => array(
        'container-width' => '1200px',
        'container-max-width' => '95%',
        'global-border-radius' => '0',
        'global-border-color' => $this->primary_color,
        'global-border-width' => '2px',
        'global-spacing' => '2em',
      ),
      'text' => array(
        'heading-font' => '"crete round", serif',
        'heading-font-external' => 'true',
        'heading-font-weight' => '400',
        'heading-text-transform' => 'uppercase',
        'heading-color' => $this->dark_gray,
        'heading-letter-spacing' => '0',

        'body-font' => '"open sans", helvetica, sans-serif',
        'body-font-external' => 'true',
        'body-font-size' => '16px',
        'body-font-style' => 'normal',
        'body-font-weight' => '300',
        'body-text-color' => '$gray',
        'body-line-height' => '1.9',
        'body-background-color' => '$light-background-color',
      ),
      'sections' => array(
        'section-padding' => '100px',
      ),
      'buttons' => array(
        'button-style' => '"transparent"',
        'button-style-transition' => 'none',
        'button-style-transition-rotation' => '0',
        'button-border-radius' => '$global-border-radius',
        'button-border-width' => '$global-border-width',
        'button-color' => '$text-color-light',
        'button-background-color' => $this->primary_color,
        'button-active-background-color' => '$secondary-color',
      ),
      'inputs' => array(
        'input-text-style' => '"transparent"',
        'input-text-style-transition' => 'none',
        'input-text-style-transition-rotation' => '0',
        'input-text-border-radius' => '$global-border-radius',
        'input-text-border-width' => '$global-border-width',
        'input-text-border-color' => 'transparent',
        'input-text-active-border-color' => '$global-border-color',
        'input-text-color' => '$text-color-dark',
        'input-text-background-color' => $this->white,
        'input-text-active-background-color' => '$secondary-color',
        'input-text-height' => '50px',
      ),
      'navbar colors' => array(
        'navbar-background-color' => $this->white,
        'navbar-fixed-background-color' => '$navbar-background-color',
        'navbar-submenu-background-color' => '$navbar-background-color',
        'navbar-fixed-submenu-background-color' => '$navbar-fixed-background-color'
      ),
      'navbar height' => array(
        'navbar-height' => '98px',
        'navbar-fixed-height' => '$navbar-height',
        'navbar-submenu-padding' => '0',
      ),
      'navbar text' => array(
        'navbar-text-font-size' => '13px',
        'navbar-text-font' => '$heading-font',
        'navbar-text-color' => '$text-color-dark',
        'navbar-text-hover-color' => 'darken($navbar-text-color, 15)',
        'navbar-text-transform' => '$heading-text-transform',
        'navbar-font-weight' => '$heading-font-weight',
        'navbar-text-spacing' => '10px',
      ),
      'navbar links' => array(
        'navbar-link-style' => '"border"',
        'navbar-link-accent-width' => '$global-border-width',
        'navbar-link-active-color' => $this->primary_color,
        'navbar-link-border-radius' => '$global-border-radius',
        'navbar-fixed-link-active-color' => '$navbar-link-active-color',
      ),
      'navbar brand' => array(
        'navbar-brand-image' => 'true',
        'navbar-brand-height' => '76px',
        'navbar-fixed-brand-height' => '$navbar-brand-height',
        'navbar-brand-center' => 'false',
        'navbar-item-amount' => '4',
        'navbar-brand-circle' => 'false',
      ),
      'footer' => array(
        'footer-top-padding' => '$global-spacing * 2',
        'footer-top-background-color' => '$gray',
        'footer-top-text-color' => '$text-color-light',
        'footer-bottom-padding' => '$global-spacing',
        'footer-bottom-background-color' => '$secondary-color',
        'footer-bottom-text-color' => '$footer-top-text-color',
      )
    );
  }

  public function read_file() {
    $fh = fopen( DIR_FRAMEWORK . 'edit.scss','r');
    $arr = array();

    while ( $line = fgets( $fh ) ) {
      preg_match( '/^\$.*\:/', $line, $name );
      preg_match( '/:.*$/', $line, $value );

      if ( $name ) :
        $name = str_replace('', '', str_replace(':', '', $name[0] ) );
        $value = trim(str_replace(':', '', str_replace(';', '', $value[0] ) ) );
        $arr[ $name ] = $value;
      endif;
    }
    fclose( $fh );
    return $arr;
  }

  public function create_file() {
    file_put_contents( DIR_FRAMEWORK . '/GENERATED.scss', $this->create_scss_variables( $this->variables ) );
  }

  // Private
  private function create_scss_variables( $variables ) {
    $o = '// PHP Generated SCSS variables' . PHP_EOL . PHP_EOL;

    foreach ( $variables as $name => $key ) :
      $o .= '// ' . ucwords( $name ) . PHP_EOL;
      foreach ( $key as $val => $var ) :
        $o .= '$' . $val . ': ' . $var . ';' . PHP_EOL;
      endforeach;
      $o .= PHP_EOL;
    endforeach;

    return $o;
  }
}
