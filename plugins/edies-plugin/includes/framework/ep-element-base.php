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
    $type       = ( !array_key_exists( 'type', $args ) )       ? null       : $args['type'];
    $title      = ( !array_key_exists( 'title', $args ) ) ? ucwords( str_replace( '_', ' ', $type ) ) : $args['title'];
    $condition  = ( !array_key_exists( 'condition', $args ) )  ? null       : $args['condition'];
    $default    = ( !array_key_exists( 'default', $args ) )    ? null       : $args['default'];
    $post_types = ( !array_key_exists( 'post_types', $args ) ) ? 'post'     : $args['post_types'];
    $tax        = ( !array_key_exists( 'tax', $args ) )        ? 'category' : $args['tax'];

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
        $array = $this->get_post_types( $type, $title, $post_types );
        break;
      case 'category':
      case 'categories':
        $array = $this->get_categories( $tax, $title, $post_types );
        break;
      case 'order_by':
        $array = $this->order_by( $title, $default );
        break;
      case 'order':
        $array = $this->order( $title );
        break;
      default:
        $array = array(
          'type' => $type,
          'ui' => array(
            'title' => __ep( $title )
          )
        );
        break;
    }

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

  private function hierarchical_cat_tree( $tax = 0, $cat = 0 ) {
    $next = get_categories("hide_empty=false&orderby=name&order=ASC&parent=$cat&taxonomy=$tax");
    $array = [];

    if ( $next ) :
      foreach( $next as $cat ) :
        // echo '<strong>' . $cat->name . '</strong>';
        $array[] = array(
          'value' => $cat->slug,
          'label' => $cat->name
        );
        $this->hierarchical_cat_tree( $tax, $cat->term_id );
      endforeach;
    endif;

    return $array;
  }

  private function get_categories( $tax = 'category', $title = null, $post_types = null, $default = 'post' ) {
    $choices = $this->default_choice();

    $choices = $this->hierarchical_cat_tree( $tax );

    // foreach ( $entries as $cat ):
    //   if ( $cat->parent != 0 ) :
    //     $name = '— ' . $cat->name;
    //   else:
    //     $name = $cat->cat_name;
    //   endif;
    //   $choices[] = array(
    //     'value' => $cat->slug,
    //     'label' => $name
    //   );
    // endforeach;

    // pretty_print( $entries );
    // pretty_print( $choices );

    $array = array(
      'type' => 'select',
      'context' => 'content',
      'ui' => array(
        'title' => __ep( $title )
      ),
      'options' => array(
        'choices' => $choices
      )
    );

    return $array;
  }

  /*
    Gets post types and inserts it into a select control (controls.php)
    Usage: "name of element" => $this->post_types()
  */
  private function get_post_types( $type = 'post_type', $title = null, $post_types = null, $default = 'post' ) {
    if ( $title == null && $type == 'post_type' ) :
      $title = 'Post type';
    elseif ( $title == null ) :
      $title = 'Post';
    endif;

    if ( $post_types == null ) :
      $post_types = 'any';
    endif;

    $choices = $this->default_choice();

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

  public function default_choice() {
    return array(
      array(
        'value' => 'false',
        'label' => 'None'
      )
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
