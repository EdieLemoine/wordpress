<?php

get_header();

$args = array(
  'post_type' => 'post',
  'category_name' => 'wonen',
  'orderby' => 'menu_order',
  'per_page' => -1,
  'order' => 'ASC'
);

$query = new WP_Query( $args ); ?>

  <?php $i = 0;

  if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
      $i++;

      $row = array(
        'class' => 'ep-row',
        'id' => $post->post_name
      );

      $text = array(
        'class' => 'ep ep-2-5 ep-text'
      );

      $bg = array(
        'class' => 'ep ep-3-5 ep-bg-image',
        'style' => 'background-image: url(' . get_the_post_thumbnail_url( $post, 'full' ) . ');'
      );

      if ( $i % 2 === 0 ) :
        $row['class'] .=  ' ep-fd-row-rev';
      endif;

      ?>
      <div <?php ep_atts( $row ) ?>>
        <?php if ( get_the_post_thumbnail_url() ) : ?>
          <div <?php ep_atts( $bg ) ?>>
          </div>
        <?php endif; ?>
        <div <?php ep_atts( $text ) ?>>
          <div class="x-container max width">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php endif; ?>
<?php get_footer(); ?>
