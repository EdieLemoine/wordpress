<?php

/**
 * Element Controls
 */

$ep_class = new EP_Custom_Map();

return array(
  'common' => array(
    '!style'
  ),

  'elements' => array(
    'type' => 'sortable',
    'ui' => array(
      'title' => __( 'Map Items', 'edies-plugin' ),
      'tooltip' =>__( 'Add a new item to your Map.', 'edies-plugin' ),
    ),
    'options' => array(
      'element' => 'custom-map-item',
      'newTitle' => __( 'Map Item %s', 'edies-plugin' ),
      'floor'   => 0,
    ),
    'context' => 'content'
  ),

  'zoom' => array(
    'type' => 'number',
    'ui' => array(
      'title' => __( 'Zoom level', 'edies-plugin' )
    ),
    'context' => 'content'
  ),

  'scroll_toggle' => array(
    'type' => 'toggle',
    'ui' => array(
      'title' => __( 'Scrollwheel', 'edies-plugin' )
    ),
    'context' => 'content'
  ),

  'spinner_toggle' => array(
    'type' => 'toggle',
		'ui' => array(
			'title' => __( 'Spinner', 'edies-plugin' )
		),
		'context' => 'spinner_toggle'
  ),

  'spinner' => array(
    'type' => 'text',
		'ui' => array(
			'title' => __( 'Spinner URL', 'edies-plugin' )
		),
    'condition' => array(
      'spinner_toggle' => true
    ),
    'context' => 'content'
  ),

  'centerLatLng' => array(
    'type' => 'text',
		'ui' => array(
			'title' => __( 'Center Coordinates', 'edies-plugin' )
		),
		'context' => 'content'
  ),

  'height' => array(
    'type' => 'text',
		'ui' => array(
			'title' => __( 'Height', 'edies-plugin' )
		),
		'context' => 'content'
  ),
  
  'snazzy_style' => array(
    'type' => 'textarea',
		'ui' => array(
			'title' => __( 'Snazzy JSON', 'edies-plugin' ),
      'tooltip' => __( 'Paste JSON code from snazzymaps here.', 'edies-plugin' )
		),
		'context' => 'content',
    'monospace' => true
  )
);
