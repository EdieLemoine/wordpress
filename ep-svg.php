<?php

function ep_svg_types($svgs) {
  $svgs['svg'] = 'image/svg+xml';
  return $svgs;
}
add_filter('upload_svgs', 'ep_svg_types');

?>
