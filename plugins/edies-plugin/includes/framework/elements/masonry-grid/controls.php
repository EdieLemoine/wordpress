<?php

/**
 * Element Controls
 */

$c = new EP_Masonry_Grid();

return array(
  'common' => array(
    '!style'
  ),
  'title_toggle' => $c->control( 'toggle', 'Toggle Heading' ),
  'columns' => $c->control( 'number', 'Columns' )
);
