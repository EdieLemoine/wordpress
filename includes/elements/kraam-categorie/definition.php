<?php

/**
 * Element Definition
 */

class Kraam_Categorie {

	public function ui() {
		return array(
      'title'       => __( 'Kraam Categorie', 'albertcuyp' ),
      'autofocus' => array(
				'categorie' => '',
    	),
    	'icon_group' => 'kraam-categorie'
    );
	}
}
