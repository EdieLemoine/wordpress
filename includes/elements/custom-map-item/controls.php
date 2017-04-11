<?php

/**
 * Element Controls
 */

$ep_class = new EP_Custom_Map_Item();

return array(
  'common' => array(
    '!style',
    '!id',
    '!class'
  ),

  'title' => array(
    'type' => 'title',
		'ui' => array(
			'title' => __( 'Title', 'edies-plugin' )
		),
		'context' => 'title'
  ),

  'item_type' => array(
    'type' => 'select',
    'ui' => array(
      'title' => __( 'Item Type', 'edies-plugin' )
    ),
    'suggest' => 'marker',
    'options' => array(
      'choices' => array(
        array(
          'value' => 'marker',
          'name' => __( 'Map Marker', 'edies-plugin' )
        ),
        array(
          'value' => 'road',
          'name' => __( 'Road Highlight', 'edies-plugin' )
        ),
        array(
          'value' => 'polygon',
          'name' => __( 'Polygon Highlight', 'edies-plugin' )
        )
      )
    )
  ),

  'polygon' => array(
    'type' => 'textarea',
    'ui' => array(
      'title' => __( 'Polygon Coordinates', 'edies-plugin' )
    ),
    'condition' => array(
      'item_type' => 'polygon'
    )
  )
);
