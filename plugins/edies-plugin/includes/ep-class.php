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

    define( 'DIR_FRAMEWORK', PATH . 'framework/' );

    define( 'DIR_CLASSES', DIR_FRAMEWORK . 'classes/' );
    define( 'DIR_SHORTCODES', DIR_FRAMEWORK . 'shortcodes/' );
    define( 'DIR_TEMPLATES', DIR_FRAMEWORK . 'templates/' );
    define( 'DIR_ELEMENTS', DIR_FRAMEWORK . 'elements/' );

    // Other options
    define( 'API_KEY', 'AIzaSyAgcvh-TKAlWWBVmX2izp_jmJR-0g_hpnY' );
    define( 'LIVERELOAD_PORT', 35729 );

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
    require_once DIR_FRAMEWORK . 'ep-global-functions.php';

    require_once DIR_CLASSES . 'ep-class-loader.php';
    require_once DIR_CLASSES . 'ep-class-dashboard.php';
    require_once DIR_CLASSES . 'ep-class-admin.php';
    require_once DIR_CLASSES . 'ep-class-scripts.php';
    require_once DIR_CLASSES . 'ep-class-templates.php';
    require_once DIR_CLASSES . 'ep-class-theme.php';
    require_once DIR_CLASSES . 'ep-class-shortcodes.php';
    require_once DIR_CLASSES . 'ep-class-cornerstone.php';
    require_once DIR_CLASSES . 'ep-class-plugins.php';

    // Initiate classes
    $this::$loader    = new EP_Loader( $ver );

    $this->dashboard  = new EP_Dashboard( $ver );
    $this->admin      = new EP_Admin( $ver );
    $this->templates  = new EP_Templates( $ver );
    $this->scripts    = new EP_Scripts( $ver );
    $this->theme      = new EP_Theme( $ver );
    $this->shortcodes = new EP_Shortcodes( $ver );
    $this->plugins    = new EP_Plugins( $ver );
  }

  private function define_hooks() {
    // Admin
    $this::$loader->add_action( 'ep_notification', $this->admin, 'notification' );
    $this::$loader->add_action( 'wp_print_scripts', $this->admin, 'print_scripts' );

    // Dashboard
    $this::$loader->add_action( 'init', $this->dashboard, 'add_post_types' );
    $this::$loader->add_action( 'admin_menu', $this->dashboard, 'add_menu_pages' );

    // Scripts
    $this::$loader->add_action( 'wp_enqueue_scripts', $this->scripts, 'queue', 9999 );
    $this::$loader->add_action( 'wp_enqueue_scripts', $this->scripts, 'dequeue', 9999 );
    !is_admin() ?: $this::$loader->add_action( 'init', $this->scripts, 'admin_queue' );

    if ( $this->live_reload ) : $this::$loader->add_action( 'wp_footer', $this->admin, 'live_reload' ); endif;

    // Templates
    $this::$loader->add_action( 'plugins_loaded', $this->templates, 'add_templates' );
    $this::$loader->add_filter( 'single_template', $this->templates, 'set_single_template' );
    $this::$loader->add_filter( 'archive_template', $this->templates, 'set_archive_template' );

    // Cornerstone & theme
    $this::$loader->add_action( 'cornerstone_integrations', $this->theme, 'register_cornerstone_integration' );
    $this::$loader->add_action( 'init', $this->theme, 'disable_theme' );
    $this::$loader->add_action( 'after_setup_theme', $this->theme, 'disable_cranium', 999 );

    // Shortcodes
    $this->shortcodes->register_shortcodes();
    $this::$loader->add_filter( 'do_shortcode_tag', $this->shortcodes, 'shortcode_filter', 9999, 3 );
  }
  
  public function get_version() {
    return $this->version;
  }

  public function run() {
    $this::$loader->run();
  }
}

?>
