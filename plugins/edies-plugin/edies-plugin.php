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
