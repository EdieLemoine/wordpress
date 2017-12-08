<?php get_header(); ?>

  <div class="x-main full" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php x_get_view( 'global', '_content', 'the-content' ); ?>
    <?php endwhile; ?>
  </div>
<?php get_footer(); ?>
