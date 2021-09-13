<?php

/* Block/TinyMCE/ACF Editor Colors
========================================================= */

/* Global Color Definitions */

$color_vars = array(
  'Black' => '000000',
  'White' => 'ffffff'
);

/* Block Editor Colors
-----------------------------------*/

// Disable Custom Colors (optional)
//add_theme_support( 'disable-custom-colors' );

function block_editor_color_map() {
  global $color_vars;
  $colors = array();
  foreach ($color_vars as $name => $hex) {
    $colors[] = array(
      'name'  => __($name),
      'slug'  => strtolower($name),
      'color' => '#'.$hex,
    );
  }
  return $colors;
}

function custom_block_editor_colors() {
  $colors = block_editor_color_map();
  add_theme_support('editor-color-palette', $colors);
}
add_action('after_setup_theme', 'custom_block_editor_colors');


/* Branded Color Picker for ACF
-----------------------------------*/

function output_the_colors() {

  // use defined Block Editor color array
  $color_palette = current((array) get_theme_support('editor-color-palette'));

  if (!$color_palette) {
    return;
  }

  ob_start();

  echo '[';
  foreach ($color_palette as $color) {
    echo "'" . $color['color'] . "', ";
  }
  echo ']';

  return ob_get_clean();
}

function custom_acf_colors() {
  $custom_colors = output_the_colors(); ?>
  <script type="text/javascript">
    (function($) {
      acf.add_filter('color_picker_args', function(args, $field) {
        args.palettes = <?php echo $custom_colors; ?>
// return colors
return args;
});
    })(jQuery);
  </script>
  <?php
}
add_action('acf/input/admin_footer', 'custom_acf_colors');

/* Add Custom Colors to ACF Wizzy
-----------------------------------*/

function custom_tinymce_colors($init) {
  global $color_vars;
  $colors_custom = array();
  foreach ($color_vars as $name => $hex) {
    $colors_custom[] = $hex;
    $colors_custom[] = $name;
  }
  $colors = $colors_custom;
  $init['textcolor_map']  = json_encode($colors);
  return $init;
}
add_filter('tiny_mce_before_init', 'custom_tinymce_colors');
