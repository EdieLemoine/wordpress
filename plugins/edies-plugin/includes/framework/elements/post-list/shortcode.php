<?php

/**
	* Shortcode handler
*/

$c = new EP_Post_List();

$atts = cs_atts( array(
	'id' => $id,
	'class' => 'ep-post-list'
) );

$args = array(
  'post_type' => $post_type,
  'posts_per_page' => $per_page,
	'orderby' => $orderby,
	'order' => $order,
	'category__name' => $category
);

$query = new WP_Query($args);

$count = $query->post_count();
// if ( $columns_auto == 1 ):
if ( $count % 4 == 0 ):
	$cols = 4;
elseif ( $count % 3 == 0 ):
	$cols = 3;
elseif ( $count % 2 == 0 ):
	$cols = 2;
else:
	$cols = 3;
endif;

$i = 0;

?>



<div <?php echo $atts ?>>
  <?php if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			$i++;
			$image = get_the_post_thumbnail_url( null, 'large');
			$content = get_the_content();
			$row_class = 'ep-row ep-l-fd-col-rev';

			if ( $i % 2 == 0 ) {
				$row_class .= ' ep-fd-row-rev bg-color';
			}
			?>

			<div class="<?php echo $row_class ?>">
				<div class="ep-3-5">
					<div class="x-container max width">
						<h2><?php echo get_the_title(); ?></h2>
			    	<p><?php the_content(); ?></p>
					</div>
				</div>
				<div class="ep-2-5 bg" style="background-image: url('<?php echo $image ?>');">

					<!-- <img class="" src="<?php echo $image ?>"> -->
				</div>
			</div>

    <?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
  <?php endif; ?>
</div>
