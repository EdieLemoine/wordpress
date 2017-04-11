<?php

/**
 *
 */
class Edies_Plugin_Installer {

  function __construct(argument)
  {
    # code...
  }
  public function ajax_auto_activate_cornerstone() {

    x_tco()->check_ajax_referer();

    $activate = activate_plugin( 'cornerstone/cornerstone.php', '', false, true );

    if ( is_wp_error( $activate ) ) {
      wp_send_json_error( array(
        'message' => $this->cs_activate_error,
        'errorDetails' => $activate->get_error_message(),
      ) );
    } else {
      wp_send_json_success( array(
        'message' => __( 'We noticed Cornerstone was installed but not activated. By visiting the X Addons page, Cornerstone has been activated automatically.', 'edie-plugin' )
      ) );
    }
  }

  public function install_plugin( $args ) {

    $args = wp_parse_args( $args, array(
      'plugin'   => '',
      'package'  => '', //The full local path or URI of the package.
      'activate' => false
    ) );

    // Nothing to do if already installed
    if ( self::plugin_installed( $args['plugin'] ) ) {
      return new WP_Error( 'x-addons-extensions', __( 'Plugin already installed.', 'edie-plugin' ) );
    }

    // Run an early permissions check silently to avoid output from the native one
    if ( ! $this->silent_permission_check() ) {
      return new WP_Error( 'x-addons-extensions', __( 'Your WordPress file permissions do not allow plugins to be installed.', 'edie-plugin' ) );
    }

    require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
    require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    // require_once X_TEMPLATE_PATH . '/framework/functions/global/admin/addons/updates/class-x-plugin-upgrader-skin.php';

    // $skin = new X_Plugin_Upgrader_Skin( array( 'plugin' => $args['plugin'] ) );
    // $upgrader = new Plugin_Upgrader( $skin );
    $upgrader->install( $args['package'] );

    if ( $args['activate'] ) {
      $activate = activate_plugin( $upgrader->plugin_info(), '', false, true );
      if ( is_wp_error( $activate ) ) {
        return $activate;
      }
    }
    return $skin->result;
  }
}
