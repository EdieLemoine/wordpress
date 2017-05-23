<?php

/**
 * Element Definition
 */

class EP_Image_Grid extends EP_Element_Base {

	public function ui() {
		return array(
      'title' => $this->__( 'Image Grid' ),
      'autofocus' => array(
				'categorie' => '',
    	),
    	'icon_group' => 'image-grid'
    );
	}

	public function truncate( $string, $length, $dots = "..." ) {
		return ( strlen( $string ) > $length ) ? substr( $string, 0, $length - strlen( $dots ) ) . $dots : $string;
	}
}
