<?php

/**
 * Shortcode handler
 */
$c = new WG_Masonry_Grid();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim('ep-advanced-accordion ' . $class)
) );
?>

<div <?php echo $atts ?>>
	<?php echo $content ?>
</div>
