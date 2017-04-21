<?php

/**
 * Element Controls
 */

$ep_class = new EP_Advanced_Button();

$post_types = get_post_types( '', 'objects' );


$array = array(
  'common' => array(
    '!style'
  ),

  'button_style' => array(
    'type' => 'select',
    'ui' => array(
      'title' => __( 'Button style', 'edies-plugin' )
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
      'title' => __( 'Link type', 'edies-plugin' )
    ),
    'options' => array(
      'choices' => array(
        array( 'label' => __( 'Post', 'edies-plugin' ), 'value' => 'post' ),
        array( 'label' => __( 'Custom', 'edies-plugin' ), 'value' => 'custom' ),
      )
    )
  ),

  'post_type' => array(
    'type' => 'select',
    'ui' => array(
      'title' => __( 'Post type', 'edies-plugin' )
    ),
    'options' => array(),
    'condition' => array(
      'link_type' => 'post'
    )
  ),

  'post' => array(
    'type' => 'select',
    'ui' => array(
      'title' => __( 'Post', 'edies-plugin' )
    ),
    'options' => array(),
    'condition' => array(
      'link_type' => 'post',
      'post_type:not' => ''
    )
  ),

  'link' => array(
    'type' => 'text',
    'ui' => array(
      'title' => __( 'Link', 'edies-plugin' )
    ),
    'condition' => array(
      'link_type' => 'custom'
    )
  )
);

foreach ($post_types as $post_type) {
  $post_types[] = array(
    'value' => $post_type->name,
    'label' => $post_type->name
  );
  // $array['post_type']['options']['choices'] = array(
  //   'value' => $post_type->ID,
  //   'label' => $post_type->name
  // );

}
  $array['post_type']['options'] = array(
    'choices' => $post_types
  );

  // $array[$post_type->name]['options'] = array(
  //   'choices' => $categories
  // );




return $array;
