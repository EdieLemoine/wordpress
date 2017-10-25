<?php

/*
  Main class for use with custom elements
*/

class EP_Element_Base extends EP_Theme {
  protected $icon_group;
  // public static $controls = array();

  public function __construct() {
    $this->icon_group = $this->slug;
  }

  // public function control( $type, $title = null, $condition = null, $default = '', $post_types = null ) {
  public function control( $args ) {
    $title      = ( !array_key_exists( 'title', $args ) ) ? null : $args['title'];
    $type       = ( !array_key_exists( 'type', $args ) ) ? null : $args['type'];
    $condition  = ( !array_key_exists( 'condition', $args ) ) ? null : $args['condition'];
    $default    = ( !array_key_exists( 'default', $args ) ) ? null : $args['default'];
    $post_types = ( !array_key_exists( 'post_types', $args ) ) ? null : $args['post_types'];

    // Create title if none exists
    if ( $title == null ) :
      $title = ucwords( str_replace( '_', ' ', $type ) );
    endif;

    if ( $type == 'icon' ) :
      $type .= '-choose';
    endif;

    if ( $type == 'toggle' && $default == null ) :
      $default = '1';
    endif;

    // Check if it's a select control
    if ( $type == 'post_type' OR $type == 'post' ) :
      $array = $this->get_post_types( $type, $title, $post_types );
    elseif ( $type == 'order_by' ) :
      $array = $this->order_by( $title, $default );
    elseif ( $type == 'order' ) :
      $array = $this->order( $title );
    else :
      $array = array(
        'type' => $type,
        'ui' => array(
          'title' => __ep( $title )
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

    $array['default'] = $default;

    return $array;
  }

  /*
    Gets post types and inserts it into a select control (controls.php)
    Usage: "name of element" => $this->post_types()
  */
  public function get_post_types( $type = 'post_type', $title = null, $post_types = null, $default = 'post' ) {
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
      'default' => $default,
      'ui' => array(
        'title' => __ep( $title )
      ),
      'options' => array(
        'choices' => $choices
      )
    );

    $array['default'] = $default;

    return $array;
  }

  public function order_by( $title = null, $default = 'title' ) {
    if ( $title == null ) :
      $title = 'Order by';
    endif;

    $choices = array();

    $orders = array( 'none', 'ID', 'author', 'title', 'name', 'type', 'date', 'modified', 'parent', 'rand', 'comment_count', 'relevance', 'menu_order', 'meta_value', 'meta_value_num', 'post__in', 'post_name__in', 'post_parent' );

    foreach ( $orders as $order ) :
      $choices[] = array(
        'value' => $order,
        'label' => ucwords( str_replace( '  ', ' ', ( str_replace( '_', ' ', $order ) ) ) )
      );
    endforeach;

    $array = array(
      'type' => 'select',
      'context' => 'content',
      'default' => $default,
      'ui' => array(
        'title' => __ep( $title )
      ),
      'options' => array(
        'choices' => $choices
      ),
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

  public function order( $title = null ) {
    return array(
      'type' => 'select',
      'context' => 'content',
      'default' => 'DESC',
      'ui' => array(
        'title' => __ep( $title )
      ),
      'options' => array(
        'choices' => array(
          array(
            'label' => 'ASC',
            'value' => 'ASC'
          ),
          array(
            'label' => 'DESC',
            'value' => 'DESC'
          )
        )
      ),
    );
  }

  public function add_defaults( $controls ) {
		$defaults = array(
			'id' => '',
			'class' => '',
			'style' => ''
		);

		foreach ( $controls as $control => $value ) :
      $defaults[ $control ] = ( !array_key_exists( 'default', $value ) ) ? '' : $value['default'];
		endforeach;

		return $defaults;
	}
}
