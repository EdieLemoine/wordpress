<?php

/**
 * Main Plugin class
 */
class Edies_Plugin {
  protected $version;
  protected $slug = 'edies-plugin';
  protected $variables;
  static $loader;

  public function __construct() {
    $this->version = '0.1.1';
    $this->set_definitions();

    $this->load_dependencies( $this->get_version() );
    $this->define_hooks();
  }

  private function set_definitions() {
    // Base path and url
    define( 'PATH_INCLUDES', plugin_dir_path( __FILE__ ) );
    define( 'URL_INCLUDES', trailingslashit( plugin_dir_url( __FILE__ ) ) );

    // File paths
    define( 'PATH_CSS', PATH_INCLUDES . 'css/' );
    define( 'PATH_JS', PATH_INCLUDES . 'js/' );
    define( 'PATH_IMG', PATH_INCLUDES . 'images/' );
    define( 'PATH_SVG', PATH_INCLUDES . 'svg/' );

    // File URLS
    define( 'URL_CSS', URL_INCLUDES . 'css/' );
    define( 'URL_JS', URL_INCLUDES . 'js/' );
    define( 'URL_IMG', URL_INCLUDES . 'images/' );
    define( 'URL_SVG', URL_INCLUDES . 'svg/' );

    // Plugin paths
    define( 'PATH_FRAMEWORK', PATH_INCLUDES . 'framework/' );

    define( 'PATH_CLASSES', PATH_FRAMEWORK . 'classes/' );
    define( 'PATH_SHORTCODES', PATH_FRAMEWORK . 'shortcodes/' );
    define( 'PATH_TEMPLATES', PATH_FRAMEWORK . 'templates/' );
    define( 'PATH_ELEMENTS', PATH_FRAMEWORK . 'elements/' );

    // Options
    define( 'LIVERELOAD_PORT', 35729 );

    // Plugin checks
    if ( class_exists( 'acf' ) ) :
      define( 'ACTIVE_ACF', true );
    endif;
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )))) :
      define( 'ACTIVE_WOOCOMMERCE', true );
    endif;

    if ( array_key_exists( 'port', parse_url( $_SERVER['HTTP_HOST'] ) ) ) :
      define( 'LIVERELOAD', true );
    else :
      define( 'LIVERELOAD', false );
    endif;
  }

  private function load_dependencies( $ver ) {
    require_once PATH_FRAMEWORK . 'ep-global-functions.php';

    require_once PATH_CLASSES . 'ep-class-loader.php';
    require_once PATH_CLASSES . 'ep-class-dashboard.php';
    require_once PATH_CLASSES . 'ep-class-admin.php';
    require_once PATH_CLASSES . 'ep-class-scripts.php';
    require_once PATH_CLASSES . 'ep-class-templates.php';
    require_once PATH_CLASSES . 'ep-class-theme.php';
    require_once PATH_CLASSES . 'ep-class-shortcodes.php';
    require_once PATH_CLASSES . 'ep-class-cornerstone.php';
    require_once PATH_CLASSES . 'ep-class-plugins.php';
    require_once PATH_CLASSES . 'ep-class-options.php';

    // Initiate classes
    $this::$loader    = new EP_Loader( $ver );

    $this->dashboard  = new EP_Dashboard( $ver );
    $this->admin      = new EP_Admin( $ver );
    $this->templates  = new EP_Templates( $ver );
    $this->scripts    = new EP_Scripts( $ver );
    $this->theme      = new EP_Theme( $ver );
    $this->shortcodes = new EP_Shortcodes( $ver );
    $this->plugins    = new EP_Plugins( $ver );
    $this->settings   = new EP_Settings( $ver );
  }

  private function define_hooks() {
    // Admin
    $this::$loader->add_action( 'wp_print_scripts', $this->admin, 'print_scripts' );
    $this::$loader->add_action( 'wp_footer', $this->admin, 'footer_content' );

    // Dashboard
    $this::$loader->add_action( 'init', $this->dashboard, 'add_post_types' );

    // Admin dashboard
    $this::$loader->add_action( 'init', $this->scripts, 'admin_queue' );
    $this::$loader->add_action( 'admin_bar_menu', $this->dashboard, 'admin_bar_menu', 999 );
    $this::$loader->add_action( 'admin_menu', $this->dashboard, 'add_menu_pages', 9 );
    $this::$loader->add_action( 'widgets_init', $this->dashboard, 'add_sidebars' );

    // Options
    $this::$loader->add_action( 'admin_init', $this->settings, 'add_all_settings' );
    
    // Scripts
    $this::$loader->add_action( 'wp_enqueue_scripts', $this->scripts, 'queue', 9999 );
    $this::$loader->add_action( 'wp_enqueue_scripts', $this->scripts, 'dequeue', 9999 );

    if ( defined( 'ACTIVE_WOOCOMMERCE' ) ) :
      $this::$loader->add_filter( 'woocommerce_breadcrumb_defaults', $this->plugins, 'woocommerce_breadcrumb_defaults');
    endif;
    // Templates
    $this::$loader->add_action( 'plugins_loaded', $this->templates, 'add_templates' );
    $this::$loader->add_filter( 'single_template', $this->templates, 'set_single_template' );
    $this::$loader->add_filter( 'archive_template', $this->templates, 'set_archive_template' );
    $this::$loader->add_filter( 'wc_get_template_part', $this->templates, 'set_woocommerce_template_part', 10, 3 );

    // Cornerstone & theme
    $this::$loader->add_action( 'cornerstone_integrations', $this->theme, 'register_cornerstone_integration' );
    $this::$loader->add_action( 'init', $this->theme, 'disable_theme' );
    $this::$loader->add_action( 'after_setup_theme', $this->theme, 'disable_cranium', 999 );
    $this::$loader->add_filter( 'wp_title', $this->theme, 'ep_wp_title', 11 );

    $this::$loader->add_action( 'ep_begin_body', $this->scripts, 'add_google_analytics' );

    include_once PATH_FRAMEWORK.'plugins/wpcf7.php';
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
