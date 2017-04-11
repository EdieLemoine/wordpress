<?php

/**
 * Shortcode handler
 */
$ep_class = new EP_Advanced_Accordion();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim('ep-advanced-accordion ' . $class)
) );
?>

<div <?php echo $atts ?>>
	<!-- <?php do_shortcode( $content ) ?> -->
	<?php echo $content ?>
</div>
