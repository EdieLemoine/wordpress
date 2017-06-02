<?php

/**
 * Element Definition
 */

class EP_Masonry_Grid extends EP_Element_Base {

	public function __construct() {
		// add_action('wp_footer', 'footer_script');
	}

	public function ui() {
		return array(
      'title' => $this->__( 'Masonry Grid' ),
    	'icon_group' => 'edies-plugin'
    );
	}

	public function staticID() {
		static $staticID = 0;
		$staticID++;

		return $staticID;
	}

	public function update_build_shortcode_atts( $atts ) {
		$atts['id'] .= $this->staticID();
	}

	public function footer_script() { ?>
		<script>
			jQuery(document).ready(function(){

				<?php for ($i = 1; $i <= $this->staticID(); $i++) { ?>

					var $grid = $('#grid-<?php echo $this->staticID(); ?>').imagesLoaded( function() {
						$grid.masonry({
							itemSelector: '.grid-item',
							percentPosition: true,
							columnWidth: '.grid-sizer'
						});
					});

				<?php } ?>

			});
		</script>
	<?php }


}
