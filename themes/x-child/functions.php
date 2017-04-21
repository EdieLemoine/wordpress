<?php

// Enqueue (or not) the parent stylesheet
// add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

// Don't output generated css
remove_action( 'wp_head', 'x_output_generated_styles', 9998, 0 );

// Load custom js
add_action( 'wp_enqueue_scripts', 'load_scripts' );

function load_scripts() {
  // wp_enqueue_style( 'style-name', get_stylesheet_uri() );
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/dist/js/script.min.js', array( 'jquery' ) );
}

// Add Livereload script to footer
add_action( 'wp_footer', 'insert_in_footer', 100 );

function insert_in_footer() {
  echo '<script src="//localhost:35729/livereload.js"></script>';
}
