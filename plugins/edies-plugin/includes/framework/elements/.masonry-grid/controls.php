<?php

/**
  * Element Controls
  */
$c = new EP_Masonry_Grid();

$array = array(
  'common' => array(
    '!style'
  ),

  'post_type' => array(
    'type' => 'select',
    'context' => 'content',
    'ui' => array(
      'title' => __ep( 'Post type' )
    ),
    'options' => array()
  ),

  // 'post_category' => array(
  //   'type' => 'multi-choose',
  //   'context' => 'content',
  //   'ui' => array(
  //     'title' => __ep( 'Categories' ),
  //     'tooltip' => __ep( 'Leave empty to select all' )
  //   ),
  //   'options' => array()
  // ),

  'per_page' => array(
    'type' => 'number',
    'ui' => array(
      'title' => 'Per page'
    )
  ),

  'columns_auto' => array(
    'type' => 'toggle',
    'ui' => array(
      'title' => 'Automatic columns',
      'tooltip' => 'Calculate columns based on post count'
    )
  ),

  'columns' => array(
    'type' => 'number',
    'ui' => array(
      'title' => 'Columns'
    ),
    'condition' => array(
      'columns_auto' => false
    )
  )
);

$post_types = get_post_types(
  array(
    'public'   => true
  )
);

$choices = array();
foreach ($post_types as $post_name ):
  $post_obj = get_post_type_object( $post_name );
  $choices[] = array(
    'value' => $post_name,
    'label' => $post_obj->labels->singular_name
  );
endforeach;

$array['post_type']['options'] = array(
  'choices' => $choices
);

return $array;
