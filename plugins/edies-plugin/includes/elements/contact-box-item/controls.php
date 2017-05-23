<?php

/**
 * Element Controls
 */

$c = new EP_Contact_Box_Item();

return array(
  'common' => array(
    '!style',
    '!id',
    '!class'
  ),
  'title' => $c->control( 'title' ),
  'icon' => $c->control( 'icon' ),
  'ani_bar_toggle' => $c->control( 'toggle', 'Animation bar' )
);
