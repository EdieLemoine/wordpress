<?php

/**
 * Element Definition
 */

class EP_Image_Grid extends Edies_Plugin {

	public function ui() {
		return array(
      'title' => $this->text( 'Image Grid' ),
      'autofocus' => array(
				'categorie' => '',
    	),
    	'icon_group' => 'image-grid'
    );
	}

	public function truncate( $string, $length, $dots = "..." ) {
		return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
	}
}
