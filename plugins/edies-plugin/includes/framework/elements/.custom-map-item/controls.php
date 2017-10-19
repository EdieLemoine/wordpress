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
			'title' => __ep( 'Title', 'edies-plugin' )
		),
		'context' => 'title'
  ),

  'item_type' => array(
    'type' => 'select',
    'ui' => array(
      'title' => __ep( 'Item Type', 'edies-plugin' )
    ),
    'suggest' => 'marker',
    'options' => array(
      'choices' => array(
        array(
          'value' => 'marker',
          'name' => __ep( 'Map Marker', 'edies-plugin' )
        ),
        array(
          'value' => 'road',
          'name' => __ep( 'Road Highlight', 'edies-plugin' )
        ),
        array(
          'value' => 'polygon',
          'name' => __ep( 'Polygon Highlight', 'edies-plugin' )
        )
      )
    )
  ),

  'polygon' => array(
    'type' => 'textarea',
    'ui' => array(
      'title' => __ep( 'Polygon Coordinates', 'edies-plugin' )
    ),
    'condition' => array(
      'item_type' => 'polygon'
    )
  )
);
