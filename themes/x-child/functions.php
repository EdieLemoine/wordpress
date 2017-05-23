<?php

// Enqueue (or not) the parent stylesheet
// add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

// Load custom js
add_action( 'wp_enqueue_scripts', 'load_scripts', 99999 );

function load_scripts() {
  wp_enqueue_style( 'ep-child', get_stylesheet_uri() );
  wp_enqueue_script( 'ep-javascript', get_stylesheet_directory_uri() . '/dist/js/ep-javascript.min.js', '', '', true );
  wp_enqueue_script( 'ep-jquery', get_stylesheet_directory_uri() . '/dist/js/ep-jquery.min.js', array( 'jquery' ), '', true );
}
