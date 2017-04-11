<?php

/**
 * Element Definition
 */

class Kraam {

	public function ui() {
		return array(
      'title'       => __( 'Kraam', 'albertcuyp' ),
      'autofocus' => array(
				'categorie' => '',
    	),
    	'icon_group' => 'kraam'
    );
	}


  public function get_original_acf( $id, $post_type ) {
    if( function_exists( 'icl_object_id' ) ) :
      return icl_object_id( $id, $post_type, false, "NL" );
    else :
      return $id;
    endif;
  }
}
