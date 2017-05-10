<?php

/**
 * Main Plugin class
 */
class Edies_Plugin {
  protected $version;
  protected $slug = 'edies-plugin';
  static $loader;

  public function __construct() {
    $this->version = '0.1.1';

    define( 'PATH', plugin_dir_path( __FILE__ ) );
    define( 'URL', plugin_dir_url( __FILE__ ) );

    define( 'DIR_CSS', URL . '/css/' );
    define( 'DIR_JS', URL . '/js/' );
    define( 'DIR_SHORTCODES', PATH . 'shortcodes/' );
    define( 'DIR_TEMPLATES', PATH . 'templates/' );
    define( 'DIR_ELEMENTS', PATH . 'elements/' );
    define( 'DIR_FRAMEWORK', PATH . 'framework/' );

    $this->set_options();
    $this->load_dependencies( $this->get_version() );
    $this->define_hooks();
  }

  private function set_options() {
    add_option( 'ep_disable_theme' );
    add_option( 'ep_live_reload' );

    if ( ! wp_get_theme( 'x' )  ) :
      update_option( 'ep_disable_theme', false );
    else :
      update_option( 'ep_disable_theme', true );
    endif;
  }

  private function load_dependencies( $ver ) {
    require_once 'classes/ep-class-loader.php';
    require_once 'classes/ep-class-admin.php';
    require_once 'classes/ep-class-dashboard.php';
    require_once 'classes/ep-class-templates.php';
    require_once 'classes/ep-class-shortcodes.php';
    require_once 'classes/ep-class-theme.php';

    // Initiate classes
    $this::$loader = new EP_Loader( $ver );

    $this->dashboard = new EP_Dashboard( $ver );
    $this->admin = new EP_Admin( $ver );
    $this->templates = new EP_Templates( $ver );
    $this->theme = new EP_Theme( $ver );
    $this->shortcodes = new EP_Shortcodes( $ver );
  }

  public function register_cornerstone_integration() {
    require_once 'classes/ep-class-cornerstone.php';

    cornerstone_register_integration( $this->slug, 'EP_Cornerstone' );
  }

  private function define_hooks() {
    // Dashboard
    $this::$loader->add_action( 'init', $this->dashboard, 'add_post_types' ); // Add post types
    $this::$loader->add_action( 'admin_menu', $this->dashboard, 'add_menu_pages' ); // Add menu pages

    // Admin
    if ( get_option( 'ep_live_reload' ) ) :
      $this::$loader->add_action( 'wp_head', $this->admin, 'live_reload' );
    endif;

    $this::$loader->add_action( 'wp_enqueue_scripts', $this->admin, 'queue' ); // Enqueue custom styles
    $this::$loader->add_action( 'wp_print_scripts', $this->admin, 'print_scripts' );
    $this::$loader->add_action( 'wp_print_styles', $this->admin, 'print_styles' );

    // Templates
    $this::$loader->add_filter( 'single_template', $this->templates, 'set_single_template' ); // Change single page template
    $this::$loader->add_filter( 'archive_template', $this->templates, 'set_archive_template' ); // Change archive page template

    // Theme
    $this::$loader->add_action( 'cornerstone_integrations', $this, 'register_cornerstone_integration' );

    // Shortcodes
    $this->shortcodes->register_shortcodes();

    if ( get_option( 'ep_disable_theme' ) ) :
      // echo did_action( 'x_enqueue_styles' );
      $this::$loader->add_action( 'init', $this->theme, 'disable_theme' );
      $this::$loader->add_action( 'init', $this->theme, 'dequeue' );
    endif;
  }

  public function __( $string, $slug = null ) {
    if ( $slug == null ) :
      $slug = $this->slug;
    endif;

    return __( $string, $slug );
  }

  public function dash( $string ) {
    return str_replace('-', '_', $string);
  }

  public function pretty_print($string) {
    echo '<pre>';
    print_r( $string );
    echo '</pre>';
  }

  public function get_version() {
    return $this->version;
  }

  public function run() {
    $this::$loader->run();
  }
}

?>
