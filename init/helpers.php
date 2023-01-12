<?php

/* Gravity Forms Button Markup
========================================================= */
add_filter('gform_next_button', 'input_to_button', 10, 2);
add_filter('gform_previous_button', 'input_to_button', 10, 2);
add_filter('gform_submit_button', 'input_to_button', 10, 2);
function input_to_button($button, $form) {
 $dom = new DOMDocument();
 $dom->loadHTML('<?xml encoding="utf-8" ?>' . $button);
 $input = $dom->getElementsByTagName('input')->item(0);
 $new_button = $dom->createElement('button');
 $new_button->appendChild($dom->createTextNode($input->getAttribute('value')));
 $input->removeAttribute('value');
 foreach ($input->attributes as $attribute) {
  $new_button->setAttribute($attribute->name, $attribute->value);
}
$input->parentNode->replaceChild($new_button, $input);

return $dom->saveHtml($new_button);
}

/* Gravity Forms anchor creation
========================================================= */
add_filter('gform_confirmation_anchor', '__return_false');

/* Enable Gravity Forms field label visibility
========================================================= */
add_filter('gform_enable_field_label_visibility_settings', '__return_true');

/* Responsive IFRAME tags
========================================================= */
add_filter('embed_oembed_html', 'responsive_embed', 10, 3);
function responsive_embed($html, $url, $attr) {
 return $html !== '' ? '<div class="embed-container">' . $html . '</div>' : '';
}

/* Add Slug to Body Class
========================================================= */
add_filter('body_class', 'post_name_in_body_class');
function post_name_in_body_class($classes) {
 if (is_singular()) {
  global $post;
  $parent = get_page($post->post_parent);
  array_push($classes, "{$post->post_name}");
  array_push($classes, "{$parent->post_name}");
}
return $classes;
}

/* Replace "Howdy" on Admin
========================================================= */
add_filter('admin_bar_menu', 'replace_howdy', 25);
function replace_howdy($wp_admin_bar) {
 $my_account = $wp_admin_bar->get_node('my-account');
 $newtitle = str_replace('Howdy,', 'Logged in as', $my_account->title);
 $wp_admin_bar->add_node(array(
  'id' => 'my-account',
  'title' => $newtitle,
));
}

/* Hide Help on Admin
========================================================= */
add_action('admin_head', 'hide_help');
function hide_help() {
 echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
 </style>';
}

/* Remove footer branding
========================================================= */
add_filter('admin_footer_text', '__return_false');

/* Stop images getting wrapped up in <p> tags when using the_content()
========================================================= */
add_filter('the_content', 'remove_img_ptags');
function remove_img_ptags($content) {
 return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
// for ACF wizzy fields
add_filter('acf_the_content', 'img_p_class_content_filter', 20);
function img_p_class_content_filter($content) {
 return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/* Always show Kitchen Sink
========================================================= */
add_filter('tiny_mce_before_init', 'unhide_kitchensink');
function unhide_kitchensink($args) {
 $args['wordpress_adv_hidden'] = false;
 return $args;
}

/* Remove Emoji scripts from head
========================================================= */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/* Remove the additional CSS section, introduced in 4.7, from the Customizer.
========================================================= */
add_action('customize_register', 'prefix_remove_css_section', 15);
function prefix_remove_css_section($wp_customize) {
 $wp_customize->remove_section('custom_css');
}

/* Show Single Post/Page Content (without loop)
========================================================= */
function show_content() {
 $current_page = get_queried_object();
 $content = apply_filters('the_content', $current_page->post_content);
 echo $content;
}

/* Remove hard-coded width on WordPress Captions
========================================================= */
add_filter('img_caption_shortcode_width', 'my_img_caption_shortcode_width', 10, 3);
function my_img_caption_shortcode_width($width, $atts, $content) {
 return 0;
}

/* Custom Wizzy Toolbar
========================================================= */
add_filter('acf/fields/wysiwyg/toolbars', 'my_custom_toolbars');
function my_custom_toolbars($toolbars) {
 $toolbars['Full'] = array();
 $toolbars['Full'][1] = array(
  'formatselect',
  'bold',
  'italic',
  'underline',
  'forecolor',
  'strikethrough',
  'superscript',
  'charmap',
  'blockquote',
  'bullist',
  'numlist',
  'alignleft',
  'aligncenter',
  'alignright',
  'alignjustify',
  'symbol',
  'link',
  'unlink',
  'removeformat',
  'fullscreen',
  'hr',
);
 return $toolbars;
}

/* ACF - WP Admin Styles
========================================================= */
add_action('acf/input/admin_head', 'my_acf_admin_head');
function my_acf_admin_head() {
 ?>
 <style type="text/css">
  .acf-field.center {
    text-align: center;
  }
  .acf-field.center .image-wrap,
  .acf-field.center .image-wrap img {
    float: none;
    margin-left: auto;
    margin-right: auto;
  }
  .acf-field-button-group.center {
    text-align: center;
  }
  .acf-field.hide-border>.acf-label {
    display: none;
  }
  .acf-field.hide-border>.acf-input>.acf-fields {
    border: none;
  }
  table.acf-table tbody td {
    vertical-align: middle;
  }
  table.acf-table th.acf-th {
    text-align: center;
    font-weight: 700;
  }
  .acf-field-wysiwyg.short .mce-edit-area iframe {
    height: auto !important;
  }
  .acf-field.heading>.acf-label {
    text-align: center;
    text-transform: uppercase;
    font-size: 20px;
  }
  .acf-block-fields>.acf-field-group>.acf-label label,
  .acf-block-fields>.acf-field-repeater>.acf-label label {
    display: block;
    text-align: center;
    font-size: 20px;
    color: #555;
    line-height: 1;
    margin-bottom: 20px;
    text-transform: uppercase;
  }
  .acf-relationship ul.acf-bl {
    text-align: left;
  }
  #poststuff .acf-postbox .postbox-header h2 {
    display: block;
    text-align: center;
    font-size: 20px;
    color: #555;
    line-height: 1;
    text-transform: uppercase;
  }
  .acf-field-link .link-wrap > span {
    display: block;
  }
  form.metabox-location-side #poststuff .postbox-header h2 {
    font-size: 13px;
    text-align: left;
    text-transform: none;
    padding: 0 16px;
    font-weight: 500;
  }
  .acf-field-group[data-name="button_group"] .acf-fields {
    border: none;
  }
  .acf-field-group[data-name="button_group"] > .acf-label {
    display: none;
  }
  .components-base-control__field > div,
  .components-base-control__field .components-focal-point-picker {
    height: auto;
  }
</style>
<?php
}

/* Numerical Pagination
========================================================= */
function post_pagination($pages = '', $range = 2) {
  $showitems = ($range * 2) + 1;
  global $paged;

  if (empty($paged)) {
    $paged = 1;
  }
  if ($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }

  if (1 != $pages) {
    if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
      echo "<a class='first-link' href='" . get_pagenum_link(1) . "' title='Go to First Page'><<</a>";
    }
    if ($paged > 1 && $showitems < $pages) {
      echo "<a class='prev-link' href='" . get_pagenum_link($paged - 1) . "' title='Go to Previous Page'><</a>";
    }

    for ($i = 1; $i <= $pages; $i++) {
      if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
        echo ($paged == $i) ? "<span class='current'>{$i}</span>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' title='Go to Page {$i}'>{$i}</a>";
      }
    }

    if ($paged < $pages && $showitems < $pages) {
      echo "<a class='next-link' href='" . get_pagenum_link($paged + 1) . "' title='Go to Next Page'>></a>";
    }
    if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
      echo "<a class='last-link' href='" . get_pagenum_link($pages) . "' title='Go to Last Page'>>></a>";
    }
  }
}

/* Move Yoast to bottom of edit page
========================================================= */
add_filter('wpseo_metabox_prio', function () {
 return 'low';
});

/* Sort Post Type by Title
========================================================= */
add_filter('pre_get_posts', 'custom_order_post_type');
function custom_order_post_type($query) {
  if ($query->is_admin) {
    if ($query->get('post_type') == 'page') {
      $query->set('orderby', 'title');
      $query->set('order', 'ASC');
    }
  }
  return $query;
}

/* Output inline SVG
========================================================= */
function svg_inline($filename = false, $path = false, $echo = true) {

  // set file path (default to /assets/ dir)
  if ( $path ) {
    $filepath = $path;
  } else if ( $filename ) {
    $filepath = get_stylesheet_directory_uri() . '/assets/img/svg/' . $filename;
  } else {
    return false;
  }

  // require mime type .svg & valid url
  $args_get = array(
    'headers' => array(
      'Content-Type' => 'image/svg+xml',
    ),
    'response' => array(
      'code' => 200,
    )
  );

  // get file using above settings
  $svg_file = wp_safe_remote_get( $filepath, $args_get );

  // exit if fail
  if ( is_wp_error($svg_file) || $svg_file['response']['code'] != 200 || $svg_file['headers']['content-type'] != 'image/svg+xml' ) {
    return false;
  }

  // if file found, output or return result
  else {
    if ( $echo ) {
      echo wp_remote_retrieve_body( $svg_file );
    } else {
      return wp_remote_retrieve_body( $svg_file );
    }
  }
}

/* Limit Post Revisions
========================================================= */
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 20);

/* Excerpt
========================================================= */
// Word Length
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
  return 30;
}

// Read More
add_filter( 'excerpt_more', 'excerpt_more', 999 );
function excerpt_more( $more ) {
  return ' ...';
}


/* Custom Admin Edits
========================================================= */

/* Reorder Menu Items */

function reorder_admin_menu( $__return_true ) {
  return [
       'index.php',
       'edit.php?post_type=page',
       'admin.php?page=gf_edit_forms',
       'edit.php',
       'edit.php?post_type=POSTTYPE',
       'separator1',
       'themes.php',
        // 'edit-comments.php', (de-registered below)
       'users.php',
       'upload.php',
       'plugins.php',
       'tools.php',
       'options-general.php',
       'separator2',
  ];
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

/* Remove Comments */

add_action( 'admin_init', 'remove_admin_menus' );
function remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

/* Custom CSS */

add_action('admin_head', 'custom_admin_css');
function custom_admin_css() {
  echo '<style>
  #adminmenu li.wp-menu-separator {
    margin:10px 0 5px 0;
  }
  #adminmenu div.separator {
      background:rgba(255,255,255,0.1);
  } 
  #adminmenu .wp-submenu-head, #adminmenu a.menu-top {
      font-size:13px;
  }
  </style>';
}


/* Disable Pingbacks
========================================================= */

add_filter('xmlrpc_methods', function($methods) {
  unset($methods['pingback.ping']); 
  return $methods; 
});
