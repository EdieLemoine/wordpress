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
      'title' => __ep( 'Contact boxes')
    ),
    'options' => array(
      'element' => 'contact-box-item',
      'newTitle' => __ep( 'Contact box %s'),
      'floor'   => 0,
    )
  ),
  'ani_bar_toggle' => $c->control( 'toggle', 'Animation bar' )
);
