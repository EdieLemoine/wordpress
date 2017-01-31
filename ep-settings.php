<?php
add_action('admin_menu', 'ep_add_menu_entry');
function ep_add_menu_entry() {
  add_menu_page(
    'Edie\'s Plugin',
    'Edie\'s Plugin',
    'administrator',
    'ep-settings',
    'ep_settings_content',
    'dashicons-carrot'
  );
  add_submenu_page(
    'ep-settings',
    'Excerpt',
    'Excerpt',
    'manage_options',
    'ep-settings-excerpt',
    'ep_settings_content'
  );
  add_submenu_page(
    'ep-settings',
    'Scripts',
    'Scripts',
    'manage_options',
    'ep-settings-scripts',
    'ep_settings_content'
  );
}

function ep_settings_content() {
  ?>
  <div class="wrap">

    <div id="icon-themes" class="icon32"></div>
    <h2><?php _e('Plugin settings', 'edie-custom') ?></h2>
    <?php settings_errors(); ?>

    <?php
    if( isset( $_GET[ 'tab' ] ) ) {
      $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'ep-settings-main';    }
    ?>

    <h2 class="nav-tab-wrapper">
      <a href="?page=ep-settings" class="nav-tab <?php echo $active_tab == '' ? 'nav-tab-active' : ''; ?>">Main</a>
      <a href="?page=ep-settings&tab=ep-settings-excerpt" class="nav-tab <?php echo $active_tab == 'ep-settings-excerpt' ? 'nav-tab-active' : ''; ?>">Excerpt</a>
      <a href="?page=ep-settings&tab=ep-settings-scripts" class="nav-tab <?php echo $active_tab == 'ep-settings-scripts' ? 'nav-tab-active' : ''; ?>">Scripts</a>
    </h2>

    <form method="post" action="options.php">
      <?php

      if ( $active_tab == 'ep-settings-excerpt' ) {
        settings_fields( 'ep_settings_excerpt' );
        do_settings_sections( 'ep-settings-excerpt' );
      } elseif ( $active_tab == 'ep-settings-scripts' ) {
        settings_fields( 'ep-settings-scripts' );
        do_settings_sections( 'ep-settings-scripts' );
      } else {
        settings_fields( 'ep-settings-main');
        do_settings_sections( 'ep-settings-main' );
      }

      submit_button();

      ?>
    </form>
  </div>

  <?php
}
