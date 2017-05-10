<?php

/**
  * Element Controls
  */
$c = new EP_Image_Grid();

$array = array(
  'common' => array(
    '!style'
  ),
  'post_type' => $c->control( 'post_type' ),
  'per_page' => $c->control( 'number', 'Per page' ),
  'columns_auto' => $c->control( 'toggle', 'Automatic columns' ),
  'columns' => $c->control( 'number', 'Columns', '!columns_auto' ),
  'complex' => $c->control( 'toggle', 'Toggle complex output' ),
  'x' => $c->control( 'number', 'X ratio' ),
  'y' => $c->control( 'number', 'Y ratio' )
);

return $array;
