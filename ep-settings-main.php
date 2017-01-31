<?php // Page content for main settings
add_action('admin_init', 'ep_init_settings_main');
function ep_init_settings_main() {
  add_settings_section(
    'ep_settings_main', // ID used to identify this section and with which to register options
    'Main Settings', // Title to be displayed on the administration page
    'ep_main_settings_callback', // Callback used to render the description of the section
    'ep-settings-main' // Page on which to add this section of options
  );
  add_settings_field(
    'ep_option_main', // ID used to identify the field throughout the theme
    'First setting entry', // The label to the left of the option interface element
    'ep_option_main_callback', // The name of the function responsible for rendering the option interface
    'ep-settings-main', // The page on which this option will be displayed
    'ep_settings_main', // The name of the section to which this field belongs
    array( // The array of arguments to pass to the callback.
    )
  );
  register_setting(
    'ep-settings-main',
    'ep_option_main'
  );
}


function ep_main_settings_callback() {
  echo '<p>Description area.</p>';
}

function ep_option_main_callback() {

  $options = get_option( 'ep_option_main' );

    // Render the output
  echo '<label class="switch"><input type="checkbox" value="' . $options . '"><div class="slider"></div></label>';

}

function ep_settings_main_content() {

}
