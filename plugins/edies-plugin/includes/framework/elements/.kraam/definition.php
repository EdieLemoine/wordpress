<?php

/**
 * Element Definition
 */

class EP_Kraam extends EP_Element_Base {

	public function ui() {
		return array(
      'title'       => __ep( 'Kraam', 'albertcuyp' ),
      'autofocus' => array(
				'categorie' => '',
    	),
   'icon_group' => $this->icon_group
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
