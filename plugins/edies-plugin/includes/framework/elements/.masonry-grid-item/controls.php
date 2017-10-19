<?php

/**
 * Element Controls
 */

$ep_class = new EP_Masonry_Grid_Item();

return array(
  'common' => array(
    '!style',
    '!id',
    '!class'
  ),
  
  'title' => array(
    'type' => 'title',
  	'ui' => array(
  		'title' => __ep( 'Title', 'waterlands-goed' )
  	),
  	'context' => 'title'
  ),

  'content' => array(
    'type' => 'editor',
		'ui' => array(
			'title' => __ep( 'Content', 'waterlands-goed' )
		),
		'context' => 'content'
  ),

  'image_toggle' => array(
    'type' => 'toggle',
    'ui' => array(
      'title' => __ep( 'Image', 'waterlands-goed' )
    )
  ),

  'link_toggle' => array(
    'type' => 'toggle',
    'ui' => array(
      'title' => __ep( 'Link', 'waterlands-goed' )
    )
  ),

  'image' => array(
    'type' => 'image',
    'ui' => array(
      'title' => __ep( 'Image', 'waterlands-goed' )
    ),
    'condition' => array(
      'image_toggle' => true
    )
  ),


  'link' => array(
    'type' => 'text',
		'ui' => array(
			'title' => __ep( 'Link', 'waterlands-goed' )
		),
    'condition' => array(
      'link_toggle' => true
    )
  )
);
