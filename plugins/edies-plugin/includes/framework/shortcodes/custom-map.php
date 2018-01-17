<?php

// static $ep_custom_map_i = 0;

function eps_custom_map( $atts ) {
  static $i = 0;
  static $map_data = [];

  $i++;

  $a = shortcode_atts( array(
    'id' => 'ep-map-',
    'post_types' => false,
    'scroll' => false,
    'center' => ep_get_option( 'google__maps_latlng' ),
    'marker' => ep_get_option( 'google__maps_latlng' ),
    'markerName' => '',
    'zoom' => ep_get_option( 'google__maps_zoom' ),
    'height' => '600px',
    'markers' => false
    // 'snazzy_style' => ''
  ), $atts );

  // Create usable array from string input
  $center = explode( ',', str_replace( ' ', '', $a['center'] ) );

  $id = $a['id'] . $i;

  // Init map data array
  $map_data[$id] = array(
    'id' => $id,
    'zoom' => intval($a['zoom']),
    'scroll' => $a['scroll'],
    'center' => array(
      'lat' => floatval( $center[0] ),
      'lng' => floatval( $center[1] )
    )
  );

  if ( ep_get_option( 'google__maps_style' ) ) :
    $map_data[$id]['snazzy_style'] = json_decode( ep_get_option( 'google__maps_style' ) );
  endif;

  if ( $a['post_types'] != false OR $a['markers'] == true  ) : // Only do this if there are post types entered

    // Create usable array from string input
    $post_types = explode( ',', str_replace( ' ', '', $a['post_types'] ) );

    // Create query for given post types
    $query = new WP_Query(
      array(
        'post_type' => $post_types,
        'posts_per_page' => -1,
        'orderby' => 'rand'
      )
    );

    // Create post loop
    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) : $query->the_post();
        // Get all the post data
        $location = get_field( 'locatie' );
        if ( $location AND $location['lat'] AND $location['lng'] ) :

          $subtitle = get_the_excerpt() ? get_the_excerpt() : "";

          // Add new marker for each post
          $map_data[$id]['markers'][] = array(
            'id' => get_the_ID(),
            'posttype' => get_post_type_object( get_post_type() )->labels->singular_name,
            'title' => get_the_title(),
            'subtitle' => $subtitle,
            'content' => get_the_excerpt(),
            'url' => get_the_permalink(),
            'position' => array(
              'lat' => floatval( $location['lat'] ),
              'lng' => floatval( $location['lng'] )
            )
          );
        endif;
      endwhile;
    endif;
    wp_reset_postdata();
  endif;

  // Only load this once
  if ( $i == 1 ) :
    wp_script_is( 'google-maps' ) ?: wp_enqueue_script( 'google-maps' );
    wp_script_is( 'snazzy-info-window' ) ?: wp_enqueue_script( 'snazzy-info-window' );
    wp_script_is( 'ep-custom-map' ) ?: wp_enqueue_script( 'ep-custom-map' );
  endif;

  // This one is done every time to ensure all variables are passed
  wp_localize_script( 'ep-custom-map', 'maps', $map_data ); // Register map data variable with js

  $output = '<div class="ep-map-wrapper"><div id="' . $id . '" style="height:' . $a['height'] . ';"></div></div>';

  return $output;
}
