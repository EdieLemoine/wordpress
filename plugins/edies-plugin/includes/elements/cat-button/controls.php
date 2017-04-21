<?php

/**
 * Element Controls
 */

return array(
	'heading' => array(
		'type' => 'title',
		'ui' => array(
			'title' => __( 'Titel', 'albertcuyp' )
		),
		'context' => 'heading'
	),
	'subtitle' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Subtitel', 'albertcuyp' )
		),
		'context' => 'subtitle'
	),
	'image' => array(
		'type' => 'image',
		'ui' => array(
			'title' => __( 'Image', 'albertcuyp' )
		),
		'context' => 'image'
	),
  'url' => array(
    'type' => 'text',
		'ui' => array(
			'title' => __( 'Link', 'albertcuyp' )
		),
		'context' => 'url'
  )
);
