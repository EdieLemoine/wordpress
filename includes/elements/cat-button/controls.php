<?php

/**
 * Element Controls
 */

return array(
	'heading' => array(
		'type' => 'title',
		'ui' => array(
			'title' => __( 'Titel', 'edies-plugin' )
		),
		'context' => 'heading'
	),
	'subtitle' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Subtitel', 'edies-plugin' )
		),
		'context' => 'subtitle'
	),
	'image' => array(
		'type' => 'image',
		'ui' => array(
			'title' => __( 'Image', 'edies-plugin' )
		),
		'context' => 'image'
	),
  'url' => array(
    'type' => 'text',
		'ui' => array(
			'title' => __( 'Link', 'edies-plugin' )
		),
		'context' => 'url'
  )
);
