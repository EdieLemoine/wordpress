<?php

/**
 * Element Definition
 */

class EP_Contact_Box extends EP_Element_Base {

	public function ui() {
		return array(
      'title' => $this->__( 'Contact box group' ),
      'autofocus' => array(
				'height' => '',
    	),
    	'icon_group' => 'contact-box'
    );
	}

	public function flags() {
		return array(
			'dynamic_child' => true
		);
	}
}
