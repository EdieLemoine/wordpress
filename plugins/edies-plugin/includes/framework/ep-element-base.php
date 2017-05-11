<?php

/*
  Main class for use with custom elements
*/

class EP_Element_Base extends EP_Theme {
  protected $icon_group;

  public function __construct() {
    $this->icon_group = $this->slug;
  }

  public function control( $type, $title = null, $condition = null, $post_types = null) {
    // Create title if none exists
    if ( $title == null ) :
      $title = ucwords( $type );
    endif;
    
    // Check if it's a select control
    if ( $type == 'post_type' OR $type == 'post' ) :
      $array = $this->get_post_types( $type, $title, $post_types );
    else :
      $array = array(
        'type' => $type,
        'ui' => array(
          'title' => $this->__( $title )
        )
      );
    endif;

    // Add optional condition
    if ( $condition != null ) :
      if ( is_array( $condition ) ) :
        $array['condition'] = array(
          $condition[0] => $condition[1]
        );
      elseif ( $condition[0] === '!' ) : // Check for '!' shortcut and remove it in the output
        $array['condition'] = array(
          str_replace( '!', '', $condition ) => false
        );
      else :
        $array['condition'] = array(
          $condition => true
        );
      endif;
    endif;
    return $array;
  }

  /*
    Gets post types and inserts it into a select control (controls.php)
    Usage: "name of element" => $this->post_types()
  */
  public function get_post_types( $type = 'post_type', $title = null, $post_types = null ) {
    if ( $title == null && $type == 'post_type' ) :
      $title = 'Post type';
    elseif ( $title == null ) :
      $title = 'Post';
    endif;

    if ( $post_types == null ) :
      $post_types = 'any';
    endif;

    $choices = array(
      array(
        'value' => 'false',
        'label' => 'None'
      )
    );

    if ( $type == 'post' ) :
      $entries = get_posts(
        array(
          'post_type' => $post_types,
          'posts_per_page' => -1
        )
      );
      foreach ( $entries as $post ):
        $choices[] = array(
          'value' => $post->name,
          'label' => $post->post_title . ' (' . $post->post_type . ')'
        );
      endforeach;
    else : // Get post types instead
      $entries = get_post_types(
        array(
          'public' => true
        )
      );

      foreach ( $entries as $post_type ):
        $post_type_obj = get_post_type_object( $post_type );
        $choices[] = array(
          'value' => $post_type,
          'label' => $post_type_obj->labels->singular_name . ' (' . $post_type_obj->name . ')'
        );
      endforeach;
    endif;

    $array = array(
      'type' => 'select',
      'context' => 'content',
      'ui' => array(
        'title' => $this->__( $title )
      ),
      'options' => array(
        'choices' => $choices
      )
    );
    return $array;
  }

  /*
    Converts bool back to true/false after controls (shortcode.php)
  */
  public function convert_bool( $bool ) {
    if ( $bool == 1 ) :
    	$bool = true;
    elseif ( $bool == 0 ) :
    	$bool = false;
    endif;

    return $bool;
  }

}
