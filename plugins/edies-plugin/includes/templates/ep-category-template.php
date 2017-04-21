<?php get_header(); ?>
<?php



// Category
if ( get_post_type() == 'ep-kraam' ) {
  $taxonomy = 'kraam-cat';
}
if ( get_post_type() == 'ep-winkel' ) {
  $taxonomy = 'winkel-cat';
}
$category = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

$subcategories = get_terms( $taxonomy, array(
  'hide_empty' => 0,
  'hierarchical' => true,
  'child_of' => $category->term_id
) );

$terms = array();
if ( ! empty( $subcategories ) && ! is_wp_error( $subcategories ) ){
  foreach ( $subcategories as $term ) {
    $terms[] = $term->term_id;
  }
}
// echo implode(', ', $terms);

?>

<div class="" id="main">
  <div class="x-section bg-image">
    <div class="x-container max width">
      <h1 class="h2 cs-ta-center"><?php echo single_cat_title(); ?></h1>
    </div>
  </div>
  <div class="x-section">
    <div class="x-container max width">
    <?php

    // $args = array(
    //   'post_type' => 'any',
    //   'tax_query' => array(
    //     // 'relation' => 'OR',
    //     array(
    //       // 'include_children' => true,
    //       'terms' => $terms
    //     ),
    //   ),
    // );$query->have_posts()
    //
    // $query = new WP_Query( $args );

    ?>
    <div class="cat-3">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $title = get_the_title();

        if ( get_field('subtitle') != '' ) {
          $subtitle = get_field('subtitle');
        }
        else {
          $subtitle = $category->name;
        }
        if ( get_field('cat_foto') ) {
          $image = get_field('cat_foto');
        }
        else {
          $image = 'http://lorempixel.com/300/300/';
        }

        $url = get_the_permalink();

        echo do_shortcode('[cs_cat_button heading="' . $title . '" subtitle="' . $subtitle . '" image="' . $image . '" url="' . $url . '"]');

      endwhile; ?>
      <?php


      else: ?>


      <p>Sorry, no posts matched your criteria.</p>


      <?php endif; ?>
    </div>
  </div>
</div>


<?php get_footer(); ?>
