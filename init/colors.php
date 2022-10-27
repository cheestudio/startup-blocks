<?php

/* ACF Color Picker (synced to theme.json)
========================================================= */

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