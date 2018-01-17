<?php

/**
	* Shortcode handler
*/

$c = new EP_Image_Grid();

$atts = cs_atts( array(
	'id' => $id,
	'class' => 'ep-grid'
) );

$args = array(
  'post_type' => $post_type,
  'posts_per_page' => $per_page,
	'orderby' => $orderby,
	'order' => $order
);

$query = new WP_Query($args);

$count = $query->post_count();
if ( $count % 4 == 0 ):
	$cols = 4;
elseif ( $count % 3 == 0 ):
	$cols = 3;
elseif ( $count % 2 == 0 ):
	$cols = 2;
else:
	$cols = 3;
endif;

?>

<div <?php echo $atts ?>>
	<div class="ep-row ep-fw-w">

	  <?php if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$image = get_the_post_thumbnail_url( null, 'large');
				$content = truncate( wp_strip_all_tags( get_the_excerpt(), true ), 120 ); ?>

					<div class="ep-1-2 ep-l-1-1 ep-row ep-s-fd-col">

						<a class="ep-1-3 ep-s-1-1 ep-bg" href="<?php echo get_permalink() ?>" style="background-image: url('<?php echo $image ?>');">
							<!-- <img src='<?php // echo $image ?>'> -->
						</a>
						<div class="ep-text ep-2-3 ep-s-1-1">
							<h2><?php echo get_the_title(); ?></h2>
							<p><?php echo $content; ?></p>
							<?php ep_button( get_permalink(), 'Lees verder' ); ?>
						</div>
					</div>

	    <?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
	  <?php endif; ?>
	</div>
</div>
