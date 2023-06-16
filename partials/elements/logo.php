<?php 
$location = $args['location'];

// fallback to desktop if no mobile or footer assigned
if ( $location !== 'desktop') {
  $image_url = get_theme_mod($location . '_image');
  if ( empty($image_url)) {
    $image_url = get_theme_mod('desktop_image');
  }
} else {
  $image_url = get_theme_mod($location . '_image');
}

// width & height
$image_width = !empty(get_theme_mod($location . '_width')) ? esc_attr(get_theme_mod($location . '_width')) : 'auto';
$image_height = !empty(get_theme_mod($location . '_height')) ? esc_attr(get_theme_mod($location . '_height')) : 'auto';

// output
if (!empty($image_url)) {
  $image_url = esc_url($image_url);
  echo "<img src='{$image_url}' alt='Site Logo' width='{$image_width}' height='{$image_height}'>";
}
