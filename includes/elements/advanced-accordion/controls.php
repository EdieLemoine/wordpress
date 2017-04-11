<?php

/**
 * Element Controls
 */

$ep_class = new EP_Advanced_Accordion();

return array(
  'common' => array(
    '!style'
  ),

  'elements' => array(
    'type' => 'sortable',
    'ui' => array(
      'title' => __( 'Accordion Items', 'edies-plugin' )
    ),
    'options' => array(
      'element' => 'advanced-accordion-item',
      'newTitle' => __( 'Accordion item %s', 'edies-plugin' ),
      'floor'   => 1,
      'title_field' => 'title'
    ),
    'context' => 'content',
    'suggest' => array(
      array( 'title' => 'First Item', 'content' => 'Test content' ),
      array( 'title' => 'Second Item', 'content' => 'Test content' )
    )
  ),

  'title_toggle' => array(
    'type' => 'toggle',
    'ui' => array(
      'title' => __( 'Toggle Heading', 'edies-plugin' )
    )
  )
);
