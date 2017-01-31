<?php
/**
* Plugin Name:       Custom plugin
* Plugin URI:        http://github.com/
* Description:       Doesn't do much so far.
* Version:           1.0.0
* Author:            Edie Lemoine
* Author URI:        http://edielemoine.nl
*/

/**
* Break if this file is accessed directly
*/
if ( ! defined( 'WPINC' ) ) {
  die;
}

/**
* Main class file
*/
require_once plugin_dir_path( __FILE__ ) . 'includes/ep-class.php';

/**
* Function for running entire plugin
*/
function ep_run_edie_custom() {
  $plugin = new Edie_Custom();
  $plugin->run();
}

/**
* Run the plugin
*/
ep_run_edie_custom();

// include 'ep-settings.php'; // Main settings
// include 'ep-settings-main.php'; // Main settings page
// include 'ep-settings-excerpt.php'; // Excerpt settings page
// include 'ep-settings-scripts.php'; // Scripts settings page
// include 'ep-svg.php'; // Enables SVG support in media library
// // Enqueue js and css
//
// function ep_admin_files() {
//   wp_enqueue_style( 'ep-admin-theme', plugins_url('dist/css/ep.css', __FILE__), array(), '1.1.6' );
//   wp_enqueue_script( 'ep-admin-script', plugins_url( "dist/js/ep.min.js", __FILE__ ), array( 'jquery' ), '1.1.6' );
// }
// add_action( 'admin_enqueue_scripts', 'ep_admin_files' );
// add_action( 'login_enqueue_scripts', 'ep_admin_files' );
//
// add_filter('admin_footer_text', 'ep_footer_text');
// function ep_footer_text($text) {
// 	$text = 'Footer text';
//   return $text;
// }
