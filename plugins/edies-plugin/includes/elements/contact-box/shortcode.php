<?php

/**
 * Shortcode handler
 */

$atts = cs_atts( array(
	'id' => trim($id . ' ' . $mapID),
	'class' => trim('ep-map bg-image ' . $class),
	'style' => 'height: ' . $height . ';' . $style
) );

?>

<div <?php echo $atts ?>>
	<?php echo $content ?>
</div>
