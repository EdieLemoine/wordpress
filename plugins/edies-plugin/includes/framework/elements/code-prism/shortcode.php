<?php

/**
	* Shortcode handler
*/

$c = new EP_Code_Prism();

$atts = cs_atts( array(
	'id' => $id,
	'class' => $class,
	'language' => $language,
	'title' => $title
) );

do_shortcode( "[eps_code $atts ]" . $code_content . "[/eps_code]" );
