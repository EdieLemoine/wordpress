<?php // Page content for scripts settings
add_action('admin_init', 'ep_init_settings_scripts');
function ep_init_settings_scripts() {
  add_settings_section(
    'ep_settings_scripts', // ID used to identify this section and with which to register options
    'scripts Settings', // Title to be displayed on the administration page
    'ep_scripts_settings_callback', // Callback used to render the description of the section
    'ep-settings-scripts' // Page on which to add this section of options
  );
  add_settings_field(
    'ep_option_scripts', // ID used to identify the field throughout the theme
    'Scripts', // The label to the left of the option interface element
    'ep_option_scripts_callback', // The name of the function responsible for rendering the option interface
    'ep-settings-scripts', // The page on which this option will be displayed
    'ep_settings_scripts' // The name of the section to which this field belongs
  );
  add_settings_field(
    'ep_option_scripts_radio',
    'Radio Button Elements',
    'ep_option_scripts_radio_callback',
    'ep-settings-scripts',
    'ep_settings_scripts'
  );
  register_setting(
    'ep_settings_scripts',
    'ep_option_scripts_radio',
    'ep_validate'
  );
}

function ep_scripts_settings_callback() {
  echo '<p>Description area.</p>';
}

function ep_option_scripts_callback() {
  echo '<select id="ep_option_scripts_source">
  <option id="ep_option_scripts_source_1">
  Stylesheet Directory
  </option>
  <option id="ep_option_scripts_source_1">
  Template Directory
  </option>
  </select>';
  echo '<input type="text" id="ep_option_scripts_path"/>';
  echo '<input type="checkbox" id="ep_option_scripts_footer" />';
}

function ep_option_scripts_radio_callback() {
  $options = get_option( 'ep-settings-scripts' );

  $html = '<input type="radio" id="radio_example_one" name="ep-settings-scripts[radio_example]" value="1"' . checked( 1, $options['radio_example'], false ) . '/>';
  $html .= '<label for="radio_example_one">Option One</label>';

  $html .= '<input type="radio" id="radio_example_two" name="ep-settings-scripts[radio_example]" value="2"' . checked( 2, $options['radio_example'], false ) . '/>';
  $html .= '<label for="radio_example_two">Option Two</label>';

  echo $html;
}

function ep_settings_scripts_content() {
}
