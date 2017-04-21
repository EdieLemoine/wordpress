<?php

/**
 * Element Controls
 */

$post_types = array(
  '1' => array(
    'name' => 'ac_kraam',
    'id' => 'ac-kraam'
  ),
  '2' => array(
    'name' => 'ac_winkel',
    'id' => 'ac-winkel'
  )
);
foreach ($post_types as $post_type) {
  $entries = array();
  $entries[] = array(
    'value' => '',
    'label' => 'None'
  );

  $array[$post_type['name']] = array(
    'type' => 'select',
    'context' => 'content',
    'ui' => array(
      'title' => __($post_type['id'], 'albertcuyp')
    ),
    'options' => array()
  );

  // Get posts
  $args = array(
    'post_type' => $post_type['id'],
    'posts_per_page' => -1,
    'orderby' => 'name',
    'order' => 'ASC'
  );

   // Create the query
  $postquery = new WP_Query( $args );

  if ( $postquery->have_posts() ) :
    while ( $postquery->have_posts() ) : $postquery->the_post(); // Start The Loop
      $entries[] = array(
        'value' => get_the_ID(),
        'label' => get_the_title()
      );
    endwhile;
  endif;
  wp_reset_postdata();

  $array[$post_type['name']]['options'] = array(
    'choices' => $entries
  );
}
wp_reset_postdata();
return $array;
