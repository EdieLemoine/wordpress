<?php x_get_view( 'global', '_header' );

$args = array(
  'post_type' => 'post',
  'orderby' => 'menu_order',
  'per_page' => -1,
  'order' => 'ASC'
);

$query = new WP_Query( $args ); ?>

<?php ep_part( 'parallax' ) ?>

  <div id="ep-top">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php x_link_pages(); ?>
    <?php endwhile;
    wp_reset_postdata(); ?>
  </div>
  <div id="ep-content">

    <?php $i = 0;

    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) : $query->the_post();
        $i++;
        $id = $post->post_name; ?>
        <div class='ep-row'>
          <?php if ( get_the_post_thumbnail_url() ) : ?>
            <div class="ep ep-3-5 ep-bg-image" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post, 'full' ) ?>);">
              <a href="<?php echo get_the_permalink() ?>">
                <h1 class="ep-heading"><?php strtolower( the_title() ) . '.'; ?></h1>
              </a>
            </div>
            <div class="ep-text ep ep-1-2 bg3">
              <div class="x-container max width">
                <h1 class="ep-heading"><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <div class="ep-btn-group">
                  <?php if ( is_user_logged_in() ) {
                    ep_button();
                  } ?>

                  <?php while ( have_rows( 'buttons' ) ) : the_row();
                    ep_button( get_sub_field('link'), get_sub_field('text') );
                  endwhile; ?>
                </div>
              </div>
            </div>
          <?php else : ?>
          <div class="ep-text ep ep-1-2 bg3">
            <div class="x-container max width">
              <h1 class="ep-heading"><?php the_title(); ?></h1>
              <?php the_content(); ?>
              <?php if( have_rows('buttons') ) : ?>
                <div class="ep-btn-group">
                  <?php if ( is_user_logged_in() ) {
                    echo do_shortcode('[x_button class="x-btn-global" href="' . get_edit_post_link( $post->ID ) . '"]Bewerken[/x_button]');
                  } ?>

                  <?php while ( have_rows('buttons') ) : the_row();
                    $ep::button( get_sub_field('link'), get_sub_field('tekst') );
                    echo do_shortcode( '[x_button class="x-btn-global" href="' . get_sub_field('link') . '"]' . get_sub_field('tekst') . '[/x_button]');

                  endwhile; ?>

                </div>
              <?php endif; ?>

            </div>
          </div>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>
  <div id="ep-footer">
  <?php get_footer(); ?>
  </div>
<?php $c->ep_part( 'parallax' )->close(); ?>
