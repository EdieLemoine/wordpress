<?php

/**
	* Shortcode handler
*/

$c = new EP_Adv_Button();

switch ($link_type) {
	case 'post':
		$href = $post_link;
		// echo $post_link;
		break;
	case 'custom' :
		$href = $link;
		break;
}

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim("$button_style $class"),
	'href' => $href
) );

do_shortcode( "[eps_button $atts ]".$text."[/eps_button]" );
