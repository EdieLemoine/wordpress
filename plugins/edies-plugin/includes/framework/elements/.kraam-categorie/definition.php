<?php

/**
 * Element Definition
 */

class EP_Kraam_Categorie extends EP_Element_Base {

	public function ui() {
		return array(
      'title'       => __ep( 'Kraam Categorie', 'albertcuyp' ),
      'autofocus' => array(
				'categorie' => '',
    	),
   'icon_group' => $this->icon_group
    );
	}
}
