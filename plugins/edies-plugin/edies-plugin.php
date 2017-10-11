<?php
/**
* Plugin Name:       Edie's Plugin
* Plugin URI:        http://bitbucket.com/bifi323/
* Description:       My plugin :):)
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
function ep_run_edies_plugin() {
  $plugin = new Edies_Plugin();
  $plugin->run();
}

/**
* Run the plugin
*/
ep_run_edies_plugin();
//
// function queue() {
//   wp_enqueue_script( 'ep-parallax', plugin_dir_url( __FILE__ ) . 'js/ep-parallax.min.js', '', null, true );
// }
//
// add_action( 'wp_enqueue_scripts', 'queue');
//
//
// echo plugin_dir_url( __FILE__ ) . 'includes/js/ep-parallax.min.js';
//
// $scripts = array( 'ep-parallax', 'ep-custom-map', 'ep-slider', 'ep-lightbox');
//
// foreach ($scripts as $s) {
//   $arr[$s] = array(
//     'enqueued' => wp_script_is( $s ),
//     'registered' => wp_script_is( $s, 'registered' ),
//     'to do' => wp_script_is( $s, 'to_do' ),
//     'done' => wp_script_is( $s, 'done' )
//   );
// }
//
// pretty_print($arr);
