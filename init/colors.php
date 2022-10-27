<?php

/* Block/TinyMCE/ACF Editor Colors
========================================================= */

/* TinyMCE Colors (defined in theme.json) */

function custom_acf_colors() { ?>
<script type="text/javascript">
(function($) {
  acf.addFilter('color_picker_args', function(args) {
    const settings = wp.data.select("core/editor").getEditorSettings();
    let colors = settings.colors.map(x => x.color);
    args.palettes = colors;
    return args;
  });
})(jQuery);
</script>
<?php
}
add_action('acf/input/admin_footer', 'custom_acf_colors');

/* TinyMCE Colors (defined in theme.json) */

function custom_tinymce_colors($init) {

 $theme_json_settings = WP_Theme_JSON_Resolver::get_theme_data()->get_settings();
 $theme_colors = $theme_json_settings['color']['palette']['theme'];

 $colors_custom = [];
 foreach ($theme_colors as $entry) {
  $clean_color = str_replace('#', '', $entry['color']);
  $colors_custom[$entry['name']] = $clean_color;
 }

 $tinymce_colors = [];
 foreach ($colors_custom as $name => $hex) {
  $tinymce_colors[] = $hex;
  $tinymce_colors[] = $name;
 }

 $init['textcolor_map'] = json_encode($tinymce_colors);
 return $init;

}
add_filter('tiny_mce_before_init', 'custom_tinymce_colors');