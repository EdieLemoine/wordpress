<?php

/**
 * Element Controls
 */

$c = new EP_Custom_Map();

$array = array(
  'common' => array(
    '!style'
  ),
  'post_type' => $c->control( 'post_type' ),
  'zoom' => $c->control( 'number', 'Zoom level' ),
  'scroll' => $c->control( 'toggle', 'Scroll' ),
  'spinner_toggle' => $c->control( 'toggle', 'Spinner' ),
  'spinner' => $c->control( 'text', 'Spinner URL', 'spinner_toggle' ),
  'center' => $c->control( 'text', 'Center' ),
  'height' => $c->control( 'text', 'Height' ),
  'snazzy_style' => array(
    'type' => 'textarea',
		'ui' => array(
			'title' => $c->__( 'Snazzy JSON' ),
      'tooltip' => $c->__( 'Paste JSON code from snazzymaps here.' )
		),
		'context' => 'content',
    'monospace' => true
  )
);

return $array;
