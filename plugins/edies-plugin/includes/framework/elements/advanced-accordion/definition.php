<?php

/**
 * Element Definition
 */

class EP_Advanced_Accordion extends EP_Element_Base {
	static $ID;

	public function __construct() {
		$this::$ID++;
	}

	public function ui() {
		return array(
      'title' => $this->__( 'Advanced Accordion' ),
    	'icon_group' => 'edies-plugin'
    );
	}
}
