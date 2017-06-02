<?php

$c = new EP_Contact_Box_Item();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim( 'ep-contactbox-item ' . $class),
	'href' => $link
) );

if ( $icon ) :
	$icon = 'fa-' . $icon;
endif;
?>

<a <?php echo $atts ?>>
	<div class="ep-cb-left"><i class="fa fa-fw <?php echo $icon ?>"></i></div>
	<div class="ep-cb-right">
		<?php if ( $ani_bar_toggle ) : ?>
			<div class="ep-cb-ani-bar"></div>
		<?php endif; ?>
		<span><?php echo $title ?></span>
	</div>
</a>
