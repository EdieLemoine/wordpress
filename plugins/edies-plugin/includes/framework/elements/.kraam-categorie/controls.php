<?php

/**
  * Element Controls
  */
$taxonomies = array(
  '1' => array(
    'name' => 'kraam_cat',
    'id' => 'kraam-cat'
  ),
  '2' => array(
    'name' => 'winkel_cat',
    'id' => 'winkel-cat'
  )
);

foreach ($taxonomies as $taxonomy) {

  $terms = get_terms(
    $taxonomy['id'],
    array(
      'orderby' => 'term_group',
      'hide_empty' => false,
      'hierarchical' => true
    )
  );
  $categories = array();
  $categories[] = array(
    'value' => '',
    'label' => 'None'
  );

  foreach ($terms as $term):
    if ( $term->parent != 0 ) :
      $name = '— ' . $term->name;
    else:
      $name = $term->name;
    endif;
    $categories[] = array(
      'value' => $term->term_id,
      'label' => $name
    );
  endforeach;

  $array[$taxonomy['name']] = array(
    'type' => 'select',
    'context' => 'content',
    'ui' => array(
      'title' => __ep($taxonomy['id'], 'albertcuyp')
    ),
    'options' => array()
  );

  $array[$taxonomy['name']]['options'] = array(
    'choices' => $categories
  );

}

return $array;
