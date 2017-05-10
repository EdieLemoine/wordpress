<?php

/**
 * Element Controls
 */
$c = new EP_Element_Base();

return array(
	'heading' => $c->title(),

	'subtitle' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __( 'Subtitel', 'albertcuyp' )
		),
		'context' => 'subtitle'
	),
	'image' => $c->image(),

  'url' => $c->text( 'Link' )
);
