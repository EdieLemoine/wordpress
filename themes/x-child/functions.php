<?php

// Enqueue (or not) the parent stylesheet
// add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

// Load custom js
add_action( 'wp_enqueue_scripts', 'load_scripts' );

function load_scripts() {
  // wp_enqueue_style( 'style-name', get_stylesheet_uri() );
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/dist/js/script.min.js', array( 'jquery' ) );
}
