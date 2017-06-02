<?php

function ep_part( $part ) {
  $file = DIR_FRAMEWORK . '/parts/ep-' . $part . '.php';

  if ( file_exists( $file ) ) :
    require_once $file;
    $classname = 'EP_Part_' . ucwords( $part );
    return new $classname();
  endif;
}

function ep_button( $link = null, $text = "Bewerken" ) {
  if ($link == null) :
    if ( is_user_logged_in() ):
      global $post;
      $link = get_edit_post_link( $post->ID );
    else :
      return;
    endif;
  endif;

  echo do_shortcode( "[x_button class='x-btn x-btn-global' href='$link']" . $text . "[/x_button]" );
}
