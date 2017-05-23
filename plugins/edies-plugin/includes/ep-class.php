<?php

/**
 * Main Plugin class
 */
class Edies_Plugin {
  protected $version;
  protected $slug = 'edies-plugin';
  protected $variables;
  static $loader;

  private $disable_theme;
  private $live_reload;

  public function __construct() {
    $this->version = '0.1.1';
    $this->set_definitions();

    $this->load_dependencies( $this->get_version() );
    $this->define_hooks();

    $this->variables = $this->theme->variables;
  }

  private function set_definitions() {
    // Base path/url
    define( 'PATH', plugin_dir_path( __FILE__ ) );
    define( 'URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

    // Directories
    define( 'DIR_CSS', URL . 'css/' );
    define( 'DIR_JS', URL . 'js/' );
    define( 'DIR_CLASSES', PATH . 'classes/' );
    define( 'DIR_SHORTCODES', PATH . 'shortcodes/' );
    define( 'DIR_TEMPLATES', PATH . 'templates/' );
    define( 'DIR_ELEMENTS', PATH . 'elements/' );
    define( 'DIR_FRAMEWORK', PATH . 'framework/' );

    // Other options
    define( 'API_KEY', 'AIzaSyAgcvh-TKAlWWBVmX2izp_jmJR-0g_hpnY' );
    define( 'LIVERELOAD_PORT', 35729 );

    define( 'ADMIN', is_admin() );

    $this->set_options();
  }

  private function set_options() {
    $this->disable_theme = true;
    $this->live_reload = true;

    if ( wp_get_theme() == 'X Pro' ) :
      $this->disable_theme = false;
    endif;
    //
    // if ( parse_url( $_SERVER['HTTP_HOST'] )['port'] != null ) :
    //   $this->live_reload = true;
    // endif;
  }

  private function load_dependencies( $ver ) {
    require_once DIR_CLASSES . 'ep-class-loader.php';
    require_once DIR_CLASSES . 'ep-class-dashboard.php';
    require_once DIR_CLASSES . 'ep-class-admin.php';
    require_once DIR_CLASSES . 'ep-class-templates.php';
    require_once DIR_CLASSES . 'ep-class-theme.php';
    require_once DIR_CLASSES . 'ep-class-shortcodes.php';
    require_once DIR_CLASSES . 'ep-class-cornerstone.php';

    // Initiate classes
    $this::$loader    = new EP_Loader( $ver );

    $this->dashboard  = new EP_Dashboard( $ver );
    $this->admin      = new EP_Admin( $ver );
    $this->templates  = new EP_Templates( $ver );
    $this->theme      = new EP_Theme( $ver );
    $this->shortcodes = new EP_Shortcodes( $ver );
  }

  private function define_hooks() {
    // Dashboard
    $this::$loader->add_action( 'init', $this->dashboard, 'add_post_types' ); // Add post types
    $this::$loader->add_action( 'admin_menu', $this->dashboard, 'add_menu_pages' ); // Add menu pages

    // Admin
    $this::$loader->add_action( 'wp_enqueue_scripts', $this->admin, 'queue' ); // Enqueue custom styles

    if ( $this->live_reload ) {
      $this::$loader->add_action( 'wp_footer', $this->admin, 'live_reload' );
    }

    if ( is_admin() ) :
      $this::$loader->add_action( 'admin_enqueue_scripts', $this->admin, 'admin_queue' ); // Enqueue custom styles
    endif;

    // Templates
    $this::$loader->add_action( 'plugins_loaded', $this->templates, 'add_templates' );
    $this::$loader->add_filter( 'single_template', $this->templates, 'set_single_template' ); // Change single page template
    $this::$loader->add_filter( 'archive_template', $this->templates, 'set_archive_template' ); // Change archive page template

    $this::$loader->add_action( 'ep_notification', $this, 'notification' );

    // Cornerstone & theme
    $this::$loader->add_action( 'cornerstone_integrations', $this->theme, 'register_cornerstone_integration' );

    if ( wp_get_theme() != 'X Pro' ) {
      $this::$loader->add_action( 'init', $this->theme, 'disable_theme' );
      $this::$loader->add_action( 'after_setup_theme', $this->theme, 'disable_cranium', 999 );
      // $this::$loader->add_action( 'wp_enqueue_scripts', $this->theme, 'x_legacy_cranium_enqueue_scripts', 99999 );
    }

    // Shortcodes
    $this->shortcodes->register_shortcodes();

    // global $wp_filter;
    // $this->pretty_print( $wp_filter );
  }

  public function notification() {
    $output = '';
    $output .= '<br />admin: ' . ADMIN . is_admin();
    $output .= '<br />disable theme: ' . get_option( 'ep_load_theme' );
    $output .= '<br />livereload: ' . get_option( 'ep_live_reload' );
    // $output .= 'string';
    echo $output;
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
