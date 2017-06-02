<?php x_get_view( 'global', '_header' );

$intro = get_post(189);

$args = array(
  'post_type' => 'post',
  'orderby' => 'menu_order',
  'per_page' => -1,
  'order' => ASC,
  'category_name' => 'homepage'
);

$query = new WP_Query( $args ); ?>

<div id="ep-parallax-outer">
  <div id="ep-parallax-inner">
    <div class="ep-parallax-wrapper">
      <div id="ep-top">
        <div class="x-container max width">
          <div class="intro">
            <img class="style-svg madog-logo" src="<?php echo wp_upload_dir()['url'] . '/MADOG-Logo-white.svg' ?>" alt="MADOG BRANDING LOGO" />
            <h1 class="h3 mts cs-ta-center"><?php echo $intro->post_title; ?></h1>
            <p>
              <?php echo $intro->post_content; ?>
            </p>

            <?php

            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post();

                $i++;
                $title = trim( str_replace('madog', '', strtolower( get_the_title() ) ) );
                $shortcode = "[x_button class=\"x-btn-global\" href=\"#{$post->post_name}\"]{$title}[/x_button]";
                $output .= do_shortcode( $shortcode );

              endwhile;
            endif;
            rewind_posts();
            echo '<div class="ep-btn-group">' . $output . '</div>'; ?>
          </div>
        </div>
        <div class="bg3">
          <?php echo do_shortcode( '[x_button class="x-btn-global" href="#ep-footer"]Direct contact opnemen[/x_button]' ); ?>
        </div>
        <div class="svg-background">
          <img class="style-svg" src="<?php echo wp_upload_dir()['url'] . '/MADOG-Background.svg' ?>" />
        </div>
      </div>
      <div id="ep-content">

        <?php
        $paw = '<img class="style-svg madog-paw" src="' . wp_upload_dir()['url'] . '/MADOG-Paw-transparent.svg" alt="MADOG" />';

        $i = 1;
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post();
            $i++;
            $id = $post->post_name;
            $pic_class = 'ep ep-3-5';
            $text_class = 'ep ep-2-5';
            $svg_url = wp_upload_dir()['url'] . '/' . $id . '.svg';
            $svg_path = wp_upload_dir()['path'] . '/' . $id . '.svg';

            $svg = "<img class=\"style-svg madog-svg $id\" src=\"$svg_url\" />";

            if ( $i % 2 === 0 ) :
              $text_class .= ' bg3';
            endif; ?>
            <div class="ep-row" id="<?php echo $id ?>">
              <div class="<?php echo $pic_class ?>">
                <div class="bg-image" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post, 'full' ) ?>);"></div>
                <?php echo $paw . $svg_path; ?>
                <?php if ( file_exists( $svg_path )) : echo $svg; endif; ?>
              </div>

              <div class="<?php echo $text_class ?>">
                <div class="x-container max width">
                  <div class="x-column x-1-1">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    <?php if ( is_user_logged_in() ) {
                      echo do_shortcode('[x_button class="x-btn-global" href="' . get_edit_post_link( $post->ID ) . '"]Bewerken[/x_button]');
                    } ?>
                  </div>
                  <?php //echo $paw; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

        </div>
      <div id="ep-footer">
      <?php get_footer(); ?>
      </div>
    </div>
  </div>
</div>
