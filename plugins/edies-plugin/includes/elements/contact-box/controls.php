<?php

/**
 * Element Controls
 */

$c = new EP_Contact_Box();

return array(
  'common' => array(
    '!style'
  ),
  'elements' => array(
    'type' => 'sortable',
    'ui' => array(
      'title' => $c->__( 'Contact boxes')
    ),
    'options' => array(
      'element' => 'contact-box-item',
      'newTitle' => $c->__( 'Contact box %s'),
      'floor'   => 0,
    )
  )
);
