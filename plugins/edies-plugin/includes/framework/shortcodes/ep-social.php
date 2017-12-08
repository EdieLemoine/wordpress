<?php

function ep_social( $atts ) {
  $socials = array(
    "facebook" => get_option( 'x_social_facebook' ),
    "twitter" => get_option( 'x_social_twitter' ),
    "googleplus" => get_option( 'x_social_googleplus' ),
    "linkedin" => get_option( 'x_social_linkedin' ),
    "xing" => get_option( 'x_social_xing' ),
    "foursquare" => get_option( 'x_social_foursquare' ),
    "youtube" => get_option( 'x_social_youtube' ),
    "vimeo" => get_option( 'x_social_vimeo' ),
    "instagram" => get_option( 'x_social_instagram' ),
    "pinterest" => get_option( 'x_social_pinterest' ),
    "dribbble" => get_option( 'x_social_dribbble' ),
    "flickr" => get_option( 'x_social_flickr' ),
    "github" => get_option( 'x_social_github' ),
    "behance" => get_option( 'x_social_behance' ),
    "tumblr" => get_option( 'x_social_tumblr' ),
    "whatsapp" => get_option( 'x_social_whatsapp' ),
    "soundcloud" => get_option( 'x_social_soundcloud' ),
    "rss" => get_option( 'x_social_rss' ),
  );

  $style = get_option( 'ep_social_icon_style' );
  $text = get_option( 'ep_social_icon_text' );
  $text_position = get_option( 'ep_social_icon_text_position' );
  $text_font = get_option( 'ep_social_icon_text_font' );
  $textclass = !$text ?"": 'text ' . $text_position . ' ' . $text_font;

  $output = "<div class='x-social-global $style $textclass'>";

  foreach ( $socials as $social => $link ) {
    if ( $link ) :
      $output .= "<div class='social-icon'><a href='$link' class='$social' title='" . ucwords( $social ) . "' target='_blank'><i aria-hidden='true'></i>";
      // $output .= !$text ?"": "<span class='text $text_position'>" . ucwords( $social ) . "</span>";
      $output .= "</a></div>";
    endif;
  }

  $output .= '</div>';

  return $output;
}
