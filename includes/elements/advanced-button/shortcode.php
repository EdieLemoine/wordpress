<?php

/**
 * Shortcode handler
 */
$ep_class = new EP_Advanced_Button();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim('ep-advanced-button ' . $class)
) );


if ( $button_type == 'simple' ) : ?>
	<a class="x-btn x-btn-global" href="<?php echo $link ?>"><?php echo $button_text ?></a>

<?php endif; ?>


<div <?php echo $atts ?>>
	<?php echo $content ?>
</div>
