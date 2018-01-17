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

    $type       = (is_array($args) and array_key_exists('type', $args))       ? $args['type'] : $args;
    $title      = (is_array($args) and array_key_exists('title', $args))      ? $args['title'] : ucwords( str_replace( '_', ' ', $type ) );
    $condition  = (is_array($args) and array_key_exists('condition', $args))  ? $args['condition'] : null;
    $default    = (is_array($args) and array_key_exists('default', $args))    ? $args['default'] : null;
    $post_types = (is_array($args) and array_key_exists('post_types', $args)) ? $args['post_types'] : 'post';
    $tax        = (is_array($args) and array_key_exists('tax', $args))        ? $args['tax'] : 'category';
    $options    = (is_array($args) and array_key_exists('options', $args))    ? $args['options'] : null;

    // icon-choose is the proper name but don't have to remember it this way
    if ( $type == 'icon' )
      $type .= '-choose';

    // Backup default everything to enabled
    if ( $type == 'toggle' && $default == null )
      $default = '1';

    // Check if it's a select control
    switch ( $type ) {
      case 'post_type':
      case 'post':
        $array = $this->select( 'post_type', array(
          'type' => $type,
          'post_types' => $post_types
        ) );
        break;
      case 'category':
      case 'categories':
        $array = $this->select( 'category', array(
          'tax' => $tax,
          'post_types' => $post_types
        ) );
        break;
      case 'order_by':
      case 'orderby':
        $array = $this->select( 'orderby' );
        break;
      case 'order':
        $array = $this->select( 'order' );
        break;
      case 'select':
        $array = $this->select( 'select', array(
          'options' => $options
        ));
        break;
      case 'code':
        $array = array(
          'type' => 'textarea'
        );
        $array['options']['monospace'] = true;
        break;
      default:
        $array = array(
          'type' => $type
        );
      break;
    }

    // Add optional condition
    if ( $condition != null ) :
      if ( is_array( $condition ) ) :
        $array['condition'] = $condition;

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

    // Add default if exists
    if ( $default ) :
      $array['default'] = $default;
    elseif ( array_key_exists( 'options', $array ) and array_key_exists( 'choices', $array['options'] ) ) :
      $array['default'] = $array['options']['choices'][0]['value'];
    endif;

    // Add title
    $array['ui']['title'] = __ep( $title );

    return $array;
  }

  private function hierarchical_cat_tree( $tax = 'category', $category = 0 ) {
    $args = array(
      'parent' => $category
    );

    $next = get_terms( $tax, $args);
    static $array = [];

    if ( $next and !is_wp_error( $next ) ) :
      foreach( $next as $cat ) :
        $title = $cat->name;
        if ( $cat->parent > 0 )
          $title = '  ' . $title;

        $array[$cat->slug] = $title;

        if ( $cat->term_id > 0 ) :
          $this->hierarchical_cat_tree( $tax, $cat->term_id );
        endif;
      endforeach;
    endif;

    return $array;
  }

  // private function get_categories( $tax = 'category', $title = null, $post_types = null, $default = 'post' ) {
  //   $choices = $this->default_choice();
  //
  //   $choices = $this->hierarchical_cat_tree( $tax );
  //
  //   // foreach ( $entries as $cat ):
  //   //   if ( $cat->parent != 0 ) :
  //   //     $name = '— ' . $cat->name;
  //   //   else:
  //   //     $name = $cat->cat_name;
  //   //   endif;
  //   //   $choices[] = array(
  //   //     'value' => $cat->slug,
  //   //     'label' => $name
  //   //   );
  //   // endforeach;
  //
  //   // pretty_print( $entries );
  //   // pretty_print( $choices );
  //
  //   $array = array(
  //     'type' => 'select',
  //     'context' => 'content',
  //     'ui' => array(
  //       'title' => __ep( $title )
  //     ),
  //     'options' => array(
  //       'choices' => $choices
  //     )
  //   );
  //
  //   return $array;
  // }

  /*
    Gets post types and inserts it into a select control (controls.php)
    Usage: "name of element" => $this->post_types()
  */
  // private function get_post_types( $type = 'post_type', $title = null, $post_types = null, $default = 'post' ) {
  //   if ( $title == null && $type == 'post_type' ) :
  //     $title = 'Post type';
  //   elseif ( $title == null ) :
  //     $title = 'Post';
  //   endif;
  //
  //   if ( $post_types == null ) :
  //     $post_types = 'any';
  //   endif;
  //
  //   $choices = $this->default_choice();
  //
  //   if ( $type == 'post' ) :
  //     $entries = get_posts(
  //       array(
  //         'post_type' => $post_types,
  //         'posts_per_page' => -1
  //       )
  //     );
  //
  //     foreach ( $entries as $post ):
  //       $choices[] = array(
  //         'value' => $post->name,
  //         'label' => $post->post_title . ' (' . $post->post_type . ')'
  //       );
  //     endforeach;
  //   else : // Get post types instead
  //     $entries = get_post_types(
  //       array(
  //         'public' => true
  //       )
  //     );
  //
  //     foreach ( $entries as $post_type ):
  //       $post_type_obj = get_post_type_object( $post_type );
  //       $choices[] = array(
  //         'value' => $post_type,
  //         'label' => $post_type_obj->labels->singular_name . ' (' . $post_type_obj->name . ')'
  //       );
  //     endforeach;
  //   endif;
  //
  //   $array = array(
  //     'type' => 'select',
  //     'context' => 'content',
  //     'default' => $default,
  //     'ui' => array(
  //       'title' => __ep( $title )
  //     ),
  //     'options' => array(
  //       'choices' => $choices
  //     )
  //   );
  //
  //   return $array;
  // }

  // public function order_by( $title = null, $default = 'title' ) {
  //   if ( $title == null ) :
  //     $title = 'Order by';
  //   endif;
  //
  //   $choices = array();
  //
  //   $orders = array( 'none', 'ID', 'author', 'title', 'name', 'type', 'date', 'modified', 'parent', 'rand', 'comment_count', 'relevance', 'menu_order', 'meta_value', 'meta_value_num', 'post__in', 'post_name__in', 'post_parent' );
  //
  //   foreach ( $orders as $order ) :
  //     $choices[] = array(
  //       'value' => $order,
  //       'label' => ucwords( str_replace( '  ', ' ', ( str_replace( '_', ' ', $order ) ) ) )
  //     );
  //   endforeach;
  //
  //   $array = array(
  //     'type' => 'select',
  //     'context' => 'content',
  //     'default' => $default,
  //     'ui' => array(
  //       'title' => __ep( $title )
  //     ),
  //     'options' => array(
  //       'choices' => $choices
  //     ),
  //   );
  //
  //   return $array;
  // }

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

  // public function order( $title = null ) {
  //   return array(
  //     'type' => 'select',
  //     'context' => 'content',
  //     'default' => 'DESC',
  //     'ui' => array(
  //       'title' => __ep( $title )
  //     ),
  //     'options' => array(
  //       'choices' => array(
  //         array(
  //           'label' => 'ASC',
  //           'value' => 'ASC'
  //         ),
  //         array(
  //           'label' => 'DESC',
  //           'value' => 'DESC'
  //         )
  //       )
  //     ),
  //   );
  // }

  /////////////////////////////////

  public function select( $type, $args = [] ) {
    // Create empty options array
    $options = array();

    // Add select type
    $array = array(
      'type' => 'select'
    );

    // Add empty option if needed
    if ( array_key_exists( 'none', $args ) )
      $options[] = 'None';

    // select( $title, $type = null, $default = null, $post_types )

    switch ( $type ) {
      case 'category':

        foreach ( $this->hierarchical_cat_tree( $args['tax'] ) as $key => $value) {
          $options[$key] = $value;
        }

      break;
      case 'post':
      case 'post_type':
        if ( $type == 'post' ) : // Get posts
          $entries = get_posts(
            array(
              'post_type' => $post_types == null ? 'any' : $post_types,
              'posts_per_page' => -1
            )
          );
        else : // Get post types instead
          $entries = get_post_types(
            array(
              'public' => true
            )
          );
        endif;

        foreach ( $entries as $entry ) :
          if ( $type == 'post' ) :
            $value = $post->name;
            $label = $post->post_title . ' (' . $post->post_type . ')';
          else :
            $post = get_post_type_object( $entry );
            $value = $entry;
            $label = $post->labels->singular_name . ' (' . $post->name . ')';
          endif;

          $options[$value] = $label;
        endforeach;


      break;
      case 'order':
        $options = array(
          'asc' => 'Ascending',
          'desc' => 'Descending'
        );
      break;
      case 'orderby':
        // Static list of order types in WordPress
        // TODO: Find dynamic way of creating this list
        $orders = ['none', 'ID', 'author', 'title', 'name', 'type', 'date', 'modified', 'parent', 'rand', 'comment_count', 'relevance', 'menu_order', 'meta_value', 'meta_value_num', 'post__in', 'post_name__in', 'post_parent'];

        // Add formatted name with every order type
        foreach ( $orders as $order ) :
          $options[$order] = ucwords( str_replace( '  ', ' ', str_replace( '_', ' ', $order ) ) );
        endforeach;
      break;
      case 'select' :
        foreach ( $args['options'] as $option => $val ) :
          $options[$option] = $val;
        endforeach;
      break;
    }

    foreach ( $options as $value => $option ) {
      $array['options']['choices'][] = array(
        'label' => $option,
        'value' => $value
      );
    }

    return $array;
  }

  // public function default_choice() {
  //   return array(
  //     array(
  //       'value' => 'false',
  //       'label' => 'None'
  //     )
  //   );
  // }

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
