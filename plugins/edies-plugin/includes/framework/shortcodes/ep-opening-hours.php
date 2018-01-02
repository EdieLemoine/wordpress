<?php

function EP_Opening_Hours() {

  if ( ep_get_option( 'shortcodes__openinghours_enabled' )) :
    $atts = cs_atts( array(
      // 'id' => $id,
      'class' => 'ep-opening-hours'
    ) );

    $times = array(
      ep_get_option( 'shortcodes__openinghours_monday' ),
      ep_get_option( 'shortcodes__openinghours_tuesday' ),
      ep_get_option( 'shortcodes__openinghours_wednesday' ),
      ep_get_option( 'shortcodes__openinghours_thursday' ),
      ep_get_option( 'shortcodes__openinghours_friday' ),
      ep_get_option( 'shortcodes__openinghours_saturday' ),
      ep_get_option( 'shortcodes__openinghours_sunday' )
    );

    $days = [];

    $opening_hours_data = array(
      'text' => array(
        // 'prefix' => $prefix,
        // 'open' => $open,
        // 'closed' => $closed
      ),
      // 'hourdisplay' => $c->convert_bool( $hourdisplay )
    );

    // Get localized names
    foreach ( weekdays() as $dayid => $day ) {
      // Don't add day if nothing is entered
      if ( $times[$dayid] != '' ) :
        $days[$day] = $times[$dayid];
      endif;
    }

    // Because js days index starts with 1
    static $i = 1;

    foreach ( $days as $day => $time ) :
      if ( strpos( $time, '-' ) > 0 ) :
        $hour = trim( explode( '-', $time )[0] );
        $minute = trim( explode( '-', $time )[1] );

        $hour1 = explode( ':', $hour )[0];
        $hour2 = explode( ':', $hour )[1];

        $minute1 = explode( ':', $minute )[0];
        $minute2 = explode( ':', $minute )[1];

        $opening_hours_data['js'][$i] = $day;

        $opening_hours_data['times'][$day] = array(
          $hour1 => $hour2,
          $minute1 => $minute2
        );
      elseif ( $time != '' ) :
        $opening_hours_data['js'][$i] = $day;
        $opening_hours_data['times'][$day] = $time;
      endif;
      $i++;
    endforeach;

    wp_script_is( 'ep-opening-hours' ) ?: wp_enqueue_script( 'ep-opening-hours' );
    wp_localize_script( 'ep-opening-hours', 'openingHoursData', $opening_hours_data );

    // Output buffer to avoid having to return everything
    ob_start(); ?>
    <div <?php echo $atts ?>>

      <div id="timeDiv"></div>
      <div id="debugDiv"></div>
      <?php if ( isset($heading) ) : echo "<h2>$heading</h2>"; endif; ?>
      <div class="<?php ep_option( 'shortcodes__openinghours_style' ); ?>">
        <?php foreach ( $days as $day => $time ) : ?>
          <div class="ep-day <?php echo $day ?>" class="dateTime">
            <div class="day"><?php echo ucwords( $day ) ?></div>
            <div class="time"><?php echo $time ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php
    return ob_get_clean();

    elseif ( is_user_logged_in() ) :
      return "Enable and setup opening hours in <a href='wp-admin/admin.php?page=edies-plugin%2Fedies-plugin-admin.php#section_shortcodes'>settings</a>.";
  endif;
}
