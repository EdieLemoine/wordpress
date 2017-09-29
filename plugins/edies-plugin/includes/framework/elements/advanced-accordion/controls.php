<?php

/**
 * Element Controls
 */

$c = new EP_Advanced_Accordion();

return array(
  'common' => array(
    '!style'
  ),

  'elements' => array(
    'type' => 'sortable',
    'ui' => array(
      'title' => $c->__('Accordion Items')
    ),
    'options' => array(
      'element' => 'advanced-accordion-item',
      'newTitle' => $c->__('Accordion item %s'),
      'floor'   => 1,
      'title_field' => 'title'
    )
  ),
  'title_toggle' => $c->control( 'toggle', 'Toggle Heading' ),
  'type' => $c->control( 'toggle', 'Multiple/single' ),
  'direction' => $c->control( 'toggle', 'Vertical/horizontal' )
);
