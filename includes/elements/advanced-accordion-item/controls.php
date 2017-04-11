<?php

/**
 * Element Controls
 */

$ep_class = new EP_Advanced_Accordion_Item();

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

  'content' => array(
    'type' => 'editor',
		'ui' => array(
			'title' => __( 'Content', 'edies-plugin' )
		),
		'context' => 'content'
  ),

  'image_toggle' => array(
    'type' => 'toggle',
    'ui' => array(
      'title' => __( 'Image', 'edies-plugin' )
    )
  ),

  'link_toggle' => array(
    'type' => 'toggle',
    'ui' => array(
      'title' => __( 'Link', 'edies-plugin' )
    )
  ),

  'image' => array(
    'type' => 'image',
    'ui' => array(
      'title' => __( 'Image', 'edies-plugin' )
    ),
    'condition' => array(
      'image_toggle' => true
    )
  ),


  'link' => array(
    'type' => 'text',
		'ui' => array(
			'title' => __( 'Link', 'edies-plugin' )
		),
    'condition' => array(
      'link_toggle' => true
    )
  )
);
