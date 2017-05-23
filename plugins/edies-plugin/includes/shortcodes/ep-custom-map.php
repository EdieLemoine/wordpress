<?php

function ep_custom_map( $atts ) {
  $c = new EP_Theme();
  $var = $c->variables['variables'];

  $a = shortcode_atts( array(
    'post_types' => false,
    'scroll' => 'false',
    'center' => '52.356226, 4.893825',
    'marker' => '52.3574162, 4.8904397',
    'markerName' => '',
    'zoom' => '17',
    'height' => '600px',
    'id' => 'ep-map',
    'markers' => false
  ), $atts );

  // Create usable array from string input
  $center = explode( ',', str_replace( ' ', '', $a['center'] ) );

  // Init map data array
  $map_data = [];

  $map_data = array(
    'id' => $a['id'],
    'zoom' => intval($a['zoom']),
    'scroll' => $a['scroll'],
    'center' => array(
      'lat' => floatval( $center[0] ),
      'lng' => floatval( $center[1] )
    ),
    'primary_color' => $var['colors']['primary-color'],
    'secondary_color' => $var['colors']['secondary-color'],
    'markers' => array()
  );
  $output = '<div class="ep-kaart-wrapper"><div id="' . $map_data['id'] . '" style="height:' . $a['height'] . ';"></div>';

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
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
      // Get all the post data
      $location = get_field( 'locatie' );
      if ( $location AND $location['lat'] AND $location['lng'] ) :
        if ( get_post_type() == 'ep-winkel' ) :
          $color = "#5776CF";
        else:
          $color = "#EC613F";
        endif;

        if ( get_field( 'subtitle' ) != '' ) :
          $subtitle = get_field( 'subtitle' );
        else :
          $subtitle = '';
        endif;

        // Add new marker for each post
        $map_data['markers'][] = array(
          'id' => get_the_ID(),
          'posttype' => substr( get_post_type(), 3 ),
          'color' => $color,
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
    endwhile; endif;
    wp_reset_postdata();
  endif;

  wp_enqueue_script( 'ep-custom-map' );
  wp_localize_script( 'ep-custom-map', 'mapData', $map_data ); // Register map data variable with js

  $output .=  '</div>'; // Close wrapper

  return $output;
}
