<?php // Page content for excerpt settings
add_action('admin_init', 'ep_init_settings_excerpt');
function ep_init_settings_excerpt() {
  add_settings_section(
    'ep_settings_excerpt', // ID used to identify this section and with which to register options
    'Excerpt Settings', // Title to be displayed on the administration page
    'ep_excerpt_settings_callback', // Callback used to render the description of the section
    'ep-settings-excerpt' // Page on which to add this section of options
  );
  add_settings_field(
    'ep_option_excerpt_enabled', // ID used to identify the field throughout the theme
    'Enable custom excerpt', // The label to the left of the option interface element
    'ep_option_excerpt_enabled_callback', // The name of the function responsible for rendering the option interface
    'ep-settings-excerpt', // The page on which this option will be displayed
    'ep_settings_excerpt', // The name of the section to which this field belongs
    array( // The array of arguments to pass to the callback.
    )
  );
  add_settings_field(
    'ep_option_excerpt_text', // ID used to identify the field throughout the theme
    '"Read More" text', // The label to the left of the option interface element
    'ep_option_excerpt_text_callback', // The name of the function responsible for rendering the option interface
    'ep-settings-excerpt', // The page on which this option will be displayed
    'ep_settings_excerpt', // The name of the section to which this field belongs
    array( // The array of arguments to pass to the callback.
    )
  );
  register_setting(
    'ep_settings_excerpt',
    'ep_option_excerpt_enabled',
    'ep_validate'
  );
  register_setting(
    'ep_settings_excerpt',
    'ep_option_excerpt_text',
    'ep_validate'
  );
}

function ep_excerpt_settings_callback() {
  echo '<p>Description area.</p>';
}

function ep_option_excerpt_enabled_callback() {
  // Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
  $html = '<label class="switch"><input type="checkbox" id="ep_option_excerpt_enabled" name="ep_option_excerpt_enabled" value="1" ' . checked(1, get_option('ep_option_excerpt_enabled'), false) . '/><div class="slider"></div></label>';

  echo $html;
}

function ep_option_excerpt_text_callback() {
  // Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
  $html = '<input type="text" id="ep_option_excerpt_text" name="ep_option_excerpt_text" value="' .   get_option('ep_option_excerpt_text') . '" />';
  $html .= '<input id="resetButton" type="button" class="button button-primary" value="reset" onClick="document.getElementById("ep_option_excerpt_text").value = "Read more";" />';

  echo $html;
}

function ep_settings_excerpt_content() {
}


// Actual settings

function ep_excerpt_more() {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('' . get_option('ep_option_excerpt_text') . '', 'edie-custom') . '</a>';
}
add_filter( 'excerpt_more', 'ep_excerpt_more' );
