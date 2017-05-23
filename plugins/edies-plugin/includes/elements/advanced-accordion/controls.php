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
    ),
    'context' => 'content',
    'suggest' => array(
      array( 'title' => 'First Item', 'content' => 'Test content' ),
      array( 'title' => 'Second Item', 'content' => 'Test content' )
    )
  ),
  'title_toggle' => $c->control( 'toggle', 'Toggle Heading' ),
  'columns' => $c->control( 'number', 'Columns' )
);
