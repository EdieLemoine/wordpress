<?php
/**
 *
 */
class Edies_Plugin_Updater {
  protected $slug;
  protected $version;

  function __construct($version) {
    $this->version = $version;

    register_activation_hook($this_file, 'check_activation');
    register_deactivation_hook($this_file, 'check_deactivation');
  }

  public function updates_exclude( $r, $url ) {
  	if ( 0 !== strpos( $url, 'http://api.wordpress.org/plugins/update-check' ) )
  		return $r; // Not a plugin update request. Bail immediately.
  	$plugins = unserialize( $r['body']['plugins'] );
  	unset( $plugins->plugins[ plugin_basename( __FILE__ ) ] );
  	unset( $plugins->active[ array_search( plugin_basename( __FILE__ ), $plugins->active ) ] );
  	$r['body']['plugins'] = serialize( $plugins );
  	return $r;
  }

  //Returns current plugin info.
  public function plugin_get($i) {
  	global $this_file;
  	if ( ! public function_exists( 'get_plugins' ) )
  		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( $this_file ) ) );
  	$plugin_file = basename( ( $this_file ) );
  	return $plugin_folder[$plugin_file][$i];
  }


  public function check_update() {
  	global $wp_version;
  	global $this_file;
  	global $update_check;
  	$plugin_folder = plugin_basename( dirname( $this_file ) );
  	$plugin_file = basename( ( $this_file ) );
  	if ( defined( 'WP_INSTALLING' ) ) return false;

  	$response = wp_remote_get( $update_check );
  	list($version, $url) = explode('|', $response['body']);
  	if(plugin_get("Version") == $version) return false;
  	$plugin_transient = get_site_transient('update_plugins');
  	$a = array(
  		'slug' => $plugin_folder,
  		'new_version' => $version,
  		'url' => plugin_get("AuthorURI"),
  		'package' => $url
  	);
  	$o = (object) $a;
  	$plugin_transient->response[$plugin_folder.'/'.$plugin_file] = $o;
  	set_site_transient('update_plugins', $plugin_transient);
  }

  function check_activation() {
    wp_schedule_event(time(), 'twicedaily', 'check_event');
  }

  function check_deactivation() {
  	wp_clear_scheduled_hook('check_event');
  }
}
