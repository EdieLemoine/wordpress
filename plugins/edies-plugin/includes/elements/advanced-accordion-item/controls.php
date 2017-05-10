<?php

/**
 * Element Controls
 */

$c = new EP_Advanced_Accordion_Item();

return array(
  'common' => array(
    '!style',
    '!id',
    '!class'
  ),
  'title' => $c->control( 'title' ),
  'content' => $c->control( 'editor', 'Content' ),
  'image_toggle' => $c->control( 'toggle', 'Image' ),
  'image' => $c->control( 'image', 'Image', 'image_toggle' ),
  'link_toggle' => $c->control( 'toggle', 'Link' ),
  'link' => $c->control( 'text', 'Link', 'link_toggle' )
);
