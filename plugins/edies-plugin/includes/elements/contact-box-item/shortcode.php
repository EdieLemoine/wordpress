<?php

$c = new EP_Contact_Box_Item();

$atts = cs_atts( array(
	'id' => $id,
	'class' => trim( 'class' . $c->staticID() . ' ep-contactbox ' . $class)
) );
?>

<div <?php echo $atts ?>>
	<a class="cf" href="<?php echo $link ?>">
		<div class="ep-cb-left"><i class="fa fa-fw fa-phone"></i></div>
			<?php if ( $ani_bar_toggle ) : ?>
				<div class="ep-cb-ani-bar"></div>
			<?php endif; ?>
		<div class="ep-cb-right"><span>075 6701 934</span></div>
	</a>
</div>
