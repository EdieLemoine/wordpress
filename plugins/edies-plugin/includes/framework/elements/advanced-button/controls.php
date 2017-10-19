<?php

/**
 * Element Controls
 */

$c = new EP_Advanced_Button();

$array = array(
  'common' => array(
    '!style'
  ),
  'button_style' => array(
    'type' => 'select',
    'ui' => array(
      'title' => __ep( 'Button style', 'edies-plugin' )
    ),
    'options' => array(
      'choices' => array(
        array( 'label' => 'Simple', 'value' => 'simple' ),
        array( 'label' => 'Custom', 'value' => 'custom' )
      )
    )
  ),
  'link_type' => array(
    'type' => 'select',
    'ui' => array(
      'title' => __ep( 'Link type', 'edies-plugin' )
    ),
    'options' => array(
      'choices' => array(
        array( 'label' => __ep( 'Post', 'edies-plugin' ), 'value' => 'post' ),
        array( 'label' => __ep( 'Custom', 'edies-plugin' ), 'value' => 'custom' ),
      )
    )
  ),
  'post_type' => $c->control( 'post_type', 'Post Type', array( 'link_type', 'post' ) ),
  'link' => $c->control( 'text', 'Link', array( 'link_type', 'custom' ) )
);

return $array;
