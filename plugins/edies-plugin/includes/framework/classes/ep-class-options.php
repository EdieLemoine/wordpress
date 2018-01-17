<?php

class EP_Settings extends Edies_Plugin {
  protected $options;

  function __construct() {

    $this->add_group( "navbar", "Navbar settings", "Desc for social section" );
    $this->add_settings( "navbar", "parts", "Icon Settings", array(
      array(
        'slug' => 'logo',
        'label' => 'Navbar logo',
        'type' => 'select',
        'options' => array(
          0 => "Disabled",
          1 => "Enabled"
        )
      ),
      array(
        'slug' => 'logo_img',
        'label' => 'Navbar logo image',
        'type' => 'image'
      )
    ));
    $this->add_settings( "navbar", "above", "Above masthead content", array(
      array(
        'slug' => 'id',
        'label' => 'Page or post to display above masthead',
        'type' => 'select',
        'options' => $this->post_list_arr()
      )
    ));

    $this->add_group( "social", "Social settings", "Desc for social section" );
    $this->add_settings( "social", "icon", "Icon Settings", array(
      array(
        'slug' => 'style',
        'label' => 'Social icon style',
        'type' => 'select',
        'options' => array(
          'fill' => 'Fill',
          'border' => 'Border',
          'border-fill' => 'Border-fill'
        ),
      ),
      array(
        'slug' => 'test',
        'label' => 'Social icon test',
        'type' => 'text',
        'default' => 'fill'
      )
    ));

    $this->add_group( "shortcodes", "Shortcode settings", "Custom shortcode options" );
    $this->add_settings( "shortcodes", "openinghours", "Opening hours", array(
      array(
        'slug' => 'enabled',
        'label' => 'Enable opening hours',
        'type' => 'select',
        'options' => array(
          0 => "Disabled",
          1 => "Enabled"
        )
      ),
      array(
        'slug' => 'style',
        'type' => 'select',
        'options' => array(
          'flex' => "Flex",
          'table' => "Table",
          '' => "None"
        ),
        'condition' => array(
          'enabled' => 1
        )
      ),

      array(
        'slug' => 'monday',
        'label' => weekdays()[0],
        'type' => 'text',
        'placeholder' => 'HH:MM - HH:MM',
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'tuesday',
        'label' => weekdays()[1],
        'type' => 'text',
        'placeholder' => 'HH:MM - HH:MM',
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'wednesday',
        'label' => weekdays()[2],
        'type' => 'text',
        'placeholder' => 'HH:MM - HH:MM',
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'thursday',
        'label' => weekdays()[3],
        'type' => 'text',
        'placeholder' => 'HH:MM - HH:MM',
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'friday',
        'label' => weekdays()[4],
        'type' => 'text',
        'placeholder' => 'HH:MM - HH:MM',
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'saturday',
        'label' => weekdays()[5],
        'type' => 'text',
        'placeholder' => 'HH:MM - HH:MM',
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'sunday',
        'label' => weekdays()[6],
        'type' => 'text',
        'placeholder' => 'HH:MM - HH:MM',
        'condition' => array(
          'enabled' => 1
        )
      ),
    ));

    $this->add_settings( "social", "text", "Text Settings", array(
      array(
        'slug' => 'enabled',
        'label' => 'Text',
        'type' => 'select',
        'options' => array(
          1 => 'Enabled',
          0 => 'Disabled'
        ),
        'default' => 0
      ),
      array(
        'slug' => 'position',
        'label' => 'Position',
        'type' => 'select',
        'options' => array(
          'top' => 'Top',
          'right' => 'Right',
          'bottom' => 'Bottom',
          'left' => 'Left'
        ),
        'default' => 'right',
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'font',
        'label' => 'Font',
        'type' => 'select',
        'options' => array(
          0 => 'Body font',
          'h1' => 'H1',
          'h2' => 'H2',
          'h3' => 'H3',
          'h4' => 'H4',
          'h5' => 'H5',
          'h6' => 'H6'
        ),
        'default' => 0,
        'condition' => array(
          'enabled' => 1
        )
      )
    ));

    $this->add_group( "buttons", "Button settings", "Desc for button section" );
    $this->add_settings( "buttons", "global", "Button style", array(
      array(
        'slug' => 'style',
        'label' => 'Button style',
        'type' => 'select',
        'options' => array(
          'fill' => 'Fill',
          'transparent' => 'Transparent',
          'transparent-invert' => 'Transparent (invert)',
          'border' => 'Border',
          'border-fill' => 'Border-fill'
        ),
        'default' => 'fill'
      )
    ));

    $this->add_group( "other", "Other settings", "This is a description" );
    $this->add_settings( "other", "text", "Text title", array(
      array(
        'label' => 'Button text',
        'slug' => 'text',
        'type' => 'text',
        'default' => 'fill'
      )
    ));

    $this->add_group( "extra", "Extra", "Extra settings" );
    $this->add_settings( "extra", "icon", "Extra icon Settings", array(
      array(
        'slug' => 'style',
        'label' => 'Extra style',
        'type' => 'select',
        'options' => array(
          'fill' => 'Fill',
          'border' => 'Border',
          'border-fill' => 'Border-fill'
        ),
      ),
    ));

    $this->add_group( "google", "Google", "Settings related to Google" );
    $this->add_settings( "google", "global", "Global Google Settings", array(
      array(
        'slug' => 'api',
        'label' => 'API key',
        'type' => 'text',
        'bottom_text' => "<a target='_blank' href='https://console.cloud.google.com/'>Google API Console</a>"
      )
    ));
    $this->add_settings( "google", "analytics", "Google Analytics", array(
      array(
        'slug' => 'enabled',
        'label' => 'Enable Google Analytics',
        'type' => 'select',
        'options' => array(
          1 => "Enabled",
          0 => "Disabled"
        ),
        'default' => 1
      ),
      array(
        'slug' => 'id',
        'label' => 'Analytics ID',
        'type' => 'text',
        'placeholder' => 'UA-XXXXXXXX-XX',
        'condition' => array(
          'enabled' => 1
        )
      )
    ));

    $this->add_settings( "google", "maps", "Maps settings", array(
      array(
        'slug' => 'enabled',
        'label' => 'Enable Google Maps',
        'type' => 'select',
        'options' => array(
          1 => "Enabled",
          0 => "Disabled"
        ),
        'default' => 1
      ),
      array(
        'slug' => 'latlng',
        'label' => 'Global default Lat/Lng',
        'type' => 'text',
        'default' => '52.510349,4.944272',
        'condition' => array(
          'enabled' => 1,
        )
      ),
      array(
        'slug' => 'zoom',
        'label' => 'Global default zoom',
        'type' => 'number',
        'default' => '17',
        'condition' => array(
          'enabled' => 1,
        )
      ),
      array(
        'slug' => 'style',
        'label' => 'JSON Style array',
        'type' => 'textarea',
        'bottom_text' => "<a target='_blank' href='http://snazzymaps.com/'>Find styles</a>",
        'condition' => array(
          'enabled' => 1,
        )
      )
    ));

    $this->add_group( "footer", "Footer", "Footer settings" );
    $this->add_settings( "footer", "top", "Top footer", array(
      array(
        'slug' => 'enabled',
        'label' => 'Top footer enabled',
        'type' => 'select',
        'options' => array(
          1 => "Enabled",
          0 => "Disabled"
        ),
        'default' => 1
      ),
      array(
        'slug' => 'widgets',
        'label' => 'Amount of widgets',
        'type' => 'select',
        'bottom_text' => "<a href='widgets.php'>Go to widgets</a>",
        'options' => array(
          0 => "None",
          1 => "1",
          2 => "2",
          3 => "3",
          4 => "4"
        ),
        'default' => 2,
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'parts',
        'label' => 'Top footer parts',
        'type' => 'checkbox',
        'options' => array(
          'map' => "Google map",
          'social' => "Social"
        ),
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'map-position',
        'label' => 'Map position',
        'type' => 'select',
        'options' => array(
          'before' => "Before widgets",
          'after' => "After widgets"
        ),
        'condition' => array(
          'enabled' => 1,
          'parts' => 'map',
          'widgets' => '!0',
          'google__maps_enabled' => 1
        ),
      )
    ));

    $this->add_settings( "footer", "bottom", "Bottom footer", array(
      array(
        'slug' => 'enabled',
        'label' => 'Bottom footer enabled',
        'type' => 'select',
        'options' => array(
          1 => "Enabled",
          0 => "Disabled"
        )
      ),
      array(
        'slug' => 'widgets',
        'label' => 'Amount of widgets',
        'type' => 'select',
        'bottom_text' => "<a href='widgets.php'>Go to widgets</a>",
        'options' => array(
          0 => "None",
          1 => "1",
          2 => "2",
          3 => "3",
          4 => "4"
        ),
        'default' => 2,
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'parts',
        'label' => 'Bottom footer parts',
        'type' => 'checkbox',
        'options' => array(
          'map' => "Google map",
          'social' => "Social"
        ),
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'map-position',
        'label' => 'Map position',
        'type' => 'select',
        'options' => array(
          'before' => "Before widgets",
          'after' => "After widgets"
        ),
        'condition' => array(
          'enabled' => 1,
          'parts' => 'map',
          'widgets' => '!0',
          'google__maps_enabled' => 1
        ),
      )
    ));

    $this->add_settings( "footer", "bar", "Bottom bar", array(
      array(
        'slug' => 'enabled',
        'label' => 'Bottom bar enabled',
        'type' => 'select',
        'options' => array(
          1 => "Enabled",
          0 => "Disabled"
        )
      ),
      array(
        'slug' => 'content',
        'label' => 'Bottom bar content',
        'type' => 'textarea',
        'default' => "Ontworpen en gerealiseerd door <a href='https://decreatievehoek.nl/'>De Creatieve Hoek</a>",
        'condition' => array(
          'enabled' => 1
        )
      ),
      array(
        'slug' => 'font',
        'label' => 'Content font',
        'type' => 'select',
        'options' => array(
          '' => 'Body font',
          'h1' => 'H1',
          'h2' => 'H2',
          'h3' => 'H3',
          'h4' => 'H4',
          'h5' => 'H5',
          'h6' => 'H6'
        ),
        'default' => '',
        'condition' => array(
          'enabled' => 1
        )
      )
    ));

    if ( defined( "ACTIVE_WOOCOMMERCE" ) ) :
      $this->add_group( "woocommerce", "WooCommerce", "Settings for WooCommerce" );
      $this->add_settings( "woocommerce", "icon", "Icon Settings", array(
        array(
          'slug' => 'style',
          'label' => 'Social icon style',
          'type' => 'select',
          'options' => array(
            'fill' => 'Fill',
            'border' => 'Border',
            'border-fill' => 'Border-fill'
          ),
        ),
        array(
          'slug' => 'test',
          'label' => 'Social icon test',
          'type' => 'text',
          'default' => 'fill'
        )
      ));
    endif;
  } // end __construct()

  private function post_list_arr( $post_type = 'any' ) {
    $args = array(
      'post_type' => array('post', 'page'),
      'numberposts' => -1
    );
    $last = null;
    $arr = get_posts( $args );
    $i=0;

    foreach ($arr as $post) {
      $i++;
      if ( $last != $post->post_type )
        $newarr['DISABLE_'.$i] = get_post_type_object( $post->post_type )->labels->name;

      $newarr[$post->ID] = $post->post_title . " (" . $post->ID . ")";
      $last = $post->post_type;
    }

    return $newarr;
  }

  // End of customizable stuff
  public function add_all_settings() {
    $this->process_settings( $this->options, "ep_settings", "page_ep_settings", "Style settings" );
  }

  public function process_settings( $options, $setting_slug, $page_slug, $page_title ) {

    add_settings_section(
      $setting_slug, // $id: Slug-name to identify the section.
      $page_title, // $title
      null,
      $page_slug // $page: The slug-name of the settings page on which to show the section.
    );

    foreach ( $options as $section_slug => $section ) :
      $section_slug = $setting_slug . "_" . $section_slug;

      if ( array_key_exists( "groups", $section ) ) :
        foreach ( $section['groups'] as $group_slug => $group ) :
          $group_slug = $section_slug . "__" . $group_slug;
          if ( array_key_exists( "settings", $group ) ) :
            foreach ( $group['settings'] as  $field ) :
              $field_slug = $group_slug . "_" . $field['slug'];
              $label = array_key_exists( 'label', $field ) ? $field['label'] : ucwords( $field['slug'] );
              add_settings_field(
                $field_slug, // $id: Slug-name to identify the field. Used in the 'id' attribute of tags.
                __ep( $label ),
                array( $this, 'field_callback' ),
                $page_slug, // $page: The slug-name of the settings page on which to show the section
                $setting_slug, // $section: The slug-name of the section of the settings page in which to show the box.
                array(
                  'slug' => $field_slug,
                  'data' => $field,
                  'group' => $group_slug,
                  'label_for' => $field_slug
                )
              );
              register_setting(
                $setting_slug, // $option_group: A settings group name. Should correspond to a whitelisted option key name.
                $field_slug // option_name
              );
            endforeach; // End Fields
          endif;
        endforeach; // End Groups
      endif;
    endforeach; // End Sections
  }

  public function page_callback() {
    $this->create_page( $this->options, "ep_settings", "page_ep_settings", "Style settings" );
  }

  public function create_page( $options, $setting_slug, $page_slug, $page_title ) {
    ob_start();
    settings_errors();
    ob_get_clean();

    echo '<div class="wrap ep-settings-page">';
    echo '<div style="display:none;" id="ep-update-notice" class="is-dismissible"><p id="msg-text"></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
    echo '<h1 style="display:none;"></h1>'; // HACK: stops notices from moving elsewhere
    echo '<form method="post" action="options.php">';

    $output = '';

    $nav = '<section id="ep-settings-tabs">';

    ob_start();
    echo "<div id='$setting_slug'>";
    $this->ep_do_settings_sections( $page_slug, $setting_slug );
    echo "</div>";
    $output .= ob_get_clean();
    $i = 0;
    $nav .= "<div class='ep-settings-tab header'><h2>Settings</h2></div>";
    foreach ( $options as $section_slug => $section ) :
      $i++;
      $section_slug = "section_" . $section_slug;
      $title = $section['title'];

      $active = $i == 1 ? 'active' : '';

      $nav .= "<a href='#$section_slug' class='ep-settings-tab $active'><h4>$title</h4></a>";

      $output .= "<div id='$section_slug'>";

      // Cancels out the echo in settings_fields
      ob_start();
      settings_fields( $setting_slug ); // $option_group: Group name used in register_setting().
      $output .= ob_get_clean();

      $output .= "</div>";

    endforeach;
    $nav .= '</section>';

    echo $nav . "<div id='ep-settings-output'>" . $output . "</div>";
    // submit_button();
    echo "</form>";
    echo "</div>";
  }


  // PRIVATE
  private function ep_do_settings_sections( $page, $setting_slug ) {
    global $wp_settings_sections, $wp_settings_fields;

    if ( ! isset( $wp_settings_sections[$page] ) )
      return;

    // pretty_print($wp_settings_sections[$page]);
    foreach ( (array) $wp_settings_sections[$page] as $setting ) {

      if ( $setting['callback'] )
        call_user_func( $setting['callback'], $setting );

      if ( ! isset( $wp_settings_fields ) || !isset( $wp_settings_fields[$page] ) || !isset( $wp_settings_fields[$page][$setting['id']] ) )
        continue;

      $this->ep_do_settings_fields( $page, $setting_slug );
    }
  }

  private function ep_do_settings_fields( $page, $setting_slug ) {
    global $wp_settings_fields;

    $groups = [];
    $title = [];
    $prev = null;
    $prevgroup = null;

    if ( ! isset( $wp_settings_fields[$page][$setting_slug] ) )
      return;

    foreach ( (array) $wp_settings_fields[$page][$setting_slug] as $field ) {

      $field_slug = preg_replace( '/.+__(.+)/', '$1', $field['args']['group'] );
      $group_slug = preg_replace( '/'.$setting_slug.'_(.+)__.+/', '$1', $field['args']['group'] );
      $field_slug_short = preg_replace( '/.+'.$field_slug.'_(.+)/', '$1', $field['id'] );

      $groups[] = array(
        'group_slug' => $group_slug,
        'short_slug' => $field_slug,
        'field_slug' => $field_slug_short,
        'full_slug' => $field['id']
      );
      $title[] = $field['id'];
    }

    $i = 0;

    foreach ( $groups as $group ) :
      $i++;
      $full_slug = $group['full_slug'];
      $group_slug = $group['group_slug'];
      $short_slug = $group['short_slug'];
      $field_slug = $group['field_slug'];

      if ( $group_slug != $prevgroup ) :
        $active = $i == 1 ? 'active-section' : "";
        if ( $i > 1 ) {
          echo "</section>";
        }
        echo "<section class='settings-section $active' id='section_$group_slug'>";
        echo "<h1 class='section-title'>" . $this->options[$group_slug]['title'] . "</h1>";
        echo "<p class='section-description'>" . $this->options[$group_slug]['description'] . "</p>";
        echo "<div class='group-row'>";
      endif;

      if ( $group_slug . "_" . $short_slug != $prev ) :

        $_group = $this->options[$group_slug]['groups'][$short_slug];
        $group_title = $_group['title'];
        $group_desc = !array_key_exists( 'description', $_group ) ?"": '<p>' . $_group['description'] . '</p>';

        echo "<div class=\"options-group\" id='". $group_slug ."'>";

        echo "<h2 class='group-title'>$group_title</h2>";
        echo "<p>$group_desc</p>";

        echo "<table class=\"form-table\">";
        foreach ( (array) $wp_settings_fields[$page][$setting_slug] as $field ) :
          if ( $field['args']['group'] == $setting_slug."_".$group_slug."__".$short_slug ) :

            $class = '';

            if ( ! empty( $field['args']['class'] ) ) {
              $class = ' class="' . esc_attr( $field['args']['class'] ) . '"';
            }

            echo "<tr{$class}>";
            if ( ! empty( $field['args']['label_for'] ) ) {
              echo '<th scope="row"><label for="' . esc_attr( $field['args']['label_for'] ) . '">' . $field['title'] . '</label></th>';
            } else {
              echo '<th scope="row">' . $field['title'] . '</th>';
            }

            echo '<td>';
            call_user_func( $field['callback'], $field['args'] );
            echo '</td>';
            echo '</tr>';

          endif;
        endforeach;

        echo "</table>";
        echo "</div>";
      endif;

      $prevgroup = $group_slug;
      $prev = $group_slug . "_" . $short_slug;
    endforeach;
    echo "</div>";
    echo "</section>";
    echo submit_button();
  }

  public function field_callback( $args ) {
    $group = $args['group'];
    $slug = $args['slug'];
    $dbvalue = get_option( $slug );
    $args = $args['data'];

    if ( $conditions = !array_key_exists( 'condition', $args ) ?"": $args[ 'condition' ] ) :
      $output = '';
      foreach ($conditions as $condition => $condval) :
        // Allow multiple conditions in same input like checkboxes
        // Comma separated will be handled automatically
        if ( is_array($condval) ) :
          $condval = implode( ",", $condval );
        endif;

        if ( strpos( $condition, "__") !== false ) :
          $cond = "ep_settings_". $condition;
        else:
          $cond = $group . "_" . $condition;
        endif;
        $currentval = get_option( $cond );
        $output .= $cond . "=" . $condval . ";";
      endforeach;
      echo "<div id='helper-$slug' class='ep-condition-helper' condition='$output'></div>";
    endif;

    $right_text  = !array_key_exists( 'right_text', $args )  ?"": $args[ 'right_text' ];
    $bottom_text = !array_key_exists( 'bottom_text', $args ) ?"": $args[ 'bottom_text' ];
    $placeholder = !array_key_exists( 'placeholder', $args ) ?"": "placeholder=\"" . $args[ 'placeholder' ] . "\"";
    $default     = !array_key_exists( 'default', $args )     ?"": $args[ 'default' ];

    if ( $dbvalue == '' and !$default and $args['type'] == 'color' )
      $value = "#123456";
    elseif ( $dbvalue == '' and $default ) {
      $value = $default;
    }
    elseif ( $dbvalue == '' and !$default and array_key_exists( 'options', $args ) ) {
      $value = reset( $args['options'] ); // Get first value if there's no default
    }
    elseif ( $dbvalue == '' and !$default ){
      $value = '';
    }
    else {
      $value = $dbvalue;
    }

    // Write new default to db
    if ( $dbvalue == '' ) :
      update_option( $slug, $value );
    endif;

    //   if( $args['type'] == 'radio' or $args['type'] == 'checkbox' ) {
    //     $value = array( $args['options'][ $args['default'] ] => 1 );
    //   }
    //   else {
    //     $value = $args['default'];
    //   }
    // }

    // Find field type
    switch( $args['type'] ) {
      case 'textarea':
        printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $slug, $placeholder, $value );
      break;

      case 'select':
        if( ! empty ( $args['options'] ) && is_array( $args['options'] ) ) {
          $html = '';
          foreach( $args['options'] as $key => $label ) {
            // echo strpos( $key, 'DISABLE' );
            $html .= sprintf( '<option value="%s" %s>%s</option>', $key, trim(selected( $value, $key, false ) . ' ' . disabled( strpos( $key, 'DISABLE' ) === 0, true, false )), $label );
          }
          printf( '<select name="%1$s" id="%1$s">%2$s</select>', $slug, $html );
        }
      break;

      case 'checkbox':
        if( ! empty ( $args['options'] ) && is_array( $args['options'] ) ) {
          $html = '';
          foreach( $args['options'] as $key => $label ) {
            if ( is_array( $value ) and array_key_exists( $key, $value ) ) :
              $val = $value[$key];
            else :
              $val = 0;
            endif;

            $html .= sprintf( '<li><input name="%1$s[%2$s]" type="checkbox" id="%3$s" value="1" %4$s /><label for="%3$s">%5$s</label></li>', $slug, $key, $slug . "_" . $key, checked( $val, 1, false ), $label);
          }
          printf( '<ul name="%1$s" id="%1$s">%2$s</ul>', $slug, $html );
        }
      break;

      case 'radio':
        if( ! empty ( $args['options'] ) && is_array( $args['options'] ) ) {
          $html = '';
          foreach( $args['options'] as $key => $label ) {
            $html .= sprintf( '<li><input name="%1$s" type="radio" id="%3$s" value="%2$s" %4$s /><label for="%3$s">%5$s</label></li>', $slug, $key, $slug . "_" . $key, checked( $value, $key, false ), $label);
          }
          printf( '<ul name="%1$s" id="%1$s">%2$s</ul>', $slug, $html );
        }
      break;

      default:
        printf( '<input name="%1$s" id="%1$s" type="%2$s" %3$s value="%4$s" />', $slug, $args['type'], $placeholder, $value );
      break;
    }

    if ( $right_text )
      printf( '<span class="helper"> %s</span>', $right_text );

    if ( $bottom_text )
      printf( '<p class="description">%s</p>', $bottom_text );
  }

  // PRIVATE
  private function add_settings( $group, $slug, $title, $settings ) {
    $this->options[$group]['groups'][$slug] = array(
      "title" => __ep( $title ),
      "settings" => $settings,
      "groups" => array()
    );
  }

  private function add_group( $group, $title, $description ) {
    $this->options[$group] = array(
      "title" => __ep($title),
      "description" => __ep($description)
    );
  }
}
