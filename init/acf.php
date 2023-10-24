<?php

/* ACF Key
========================================================= */
define('ACF_PRO_LICENSE', 'b3JkZXJfaWQ9MzQ3NTJ8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTA3LTE0IDE5OjU3OjM0');

/* ACF Builder + Block Registration Workflows (optional)
========================================================= */
$acf_builder = true;
$acf_blocks  = true;

/* Register Fields (can be removed if $acf_builder == false)
========================================================= */

use StoutLogic\AcfBuilder\FieldsBuilder;

define('FIELDS_DIR', dirname(__FILE__) . '/fields');
define('BLOCK_FIELDS_DIR', dirname(__DIR__) . '/partials/acf-blocks/');

function acf_field_builder_registration() {
  if (is_dir(FIELDS_DIR)) {
    add_action('acf/init', function () {
      foreach (glob(FIELDS_DIR . '/partials/*.php') as $partial) {
        // include partials first
        if (file_exists($partial)) {
          include $partial;
        }
      }
      foreach (glob(FIELDS_DIR . '/*.php') as $file_path) {
        if (($fields = require_once $file_path) !== true) {
          if (!is_array($fields)) {
            $fields = [$fields];
          }
          foreach ($fields as $field) {
            if ($field instanceof FieldsBuilder) {
              acf_add_local_field_group($field->build());
            }
          }
        }
      }
    });
  }
}

/* Register Block Fields
========================================================= */
function acf_block_field_builder_registration() {
  add_action('acf/init', function () {
    foreach (glob(FIELDS_DIR . '/partials/*.php') as $partial) {
      // include partials first
      if (file_exists($partial)) {
        include $partial;
      }
    }
    foreach (glob(BLOCK_FIELDS_DIR . '**/fields.php') as $file_path) {
      if (($fields = require_once $file_path) !== true) {
        if (!is_array($fields)) {
          $fields = [$fields];
        }
        foreach ($fields as $field) {
          if ($field instanceof FieldsBuilder) {
            acf_add_local_field_group($field->build());
          }
        }
      }
    }
  });
}

/* Register Blocks (can be removed if $acf_blocks == false)
========================================================= */

function acf_blocks_registration() {
  add_action('init', 'register_acf_blocks', 5);
  function register_acf_blocks() {
    define('BLOCKS_DIR', dirname(__FILE__, 2) . '/partials/acf-blocks');
    foreach (glob(BLOCKS_DIR . '/**/block.json') as $block_path) {
      $block_json_path = basename(dirname($block_path));
      register_block_type(BLOCKS_DIR . '/' . $block_json_path);
    }
  }
}

/* ACF Block Class/ID Helper Function
========================================================= */
function block_class_id($block_entry, $class) {
  $className = $class;

  if (!empty($block_entry['anchor'])) {
    $id = $block_entry['anchor'];
  }
  if (!empty($block_entry['className'])) {
    $className .= ' ' . $block_entry['className'];
  }
  if (!empty($block_entry['align'])) {
    $className .= ' align' . $block_entry['align'];
  }

  $output = 'class="' . esc_attr($className) . '"';
  if (isset($id)) {
    $output .= 'id="' . esc_attr($id) . '"';
  }

  echo $output;
}

/* Block Field Group Path
========================================================= */
function blockFieldGroup($file) {
  $path = basename(dirname($file));
  $name = str_replace('-', '_', $path);
  $group = $name . '_group';
  return get_field($group);
}

/* Block Asset Path
usage: echo block_path(__DIR__);
========================================================= */
function block_path($dir) {
  return esc_url(get_template_directory_uri()) . '/partials/acf-blocks/' . basename($dir);
}

/* Block Image Preview
======================================================== */
function block_preview($blockpath) {
  echo '<img data="block_preview" src="' . get_template_directory_uri() . '/partials/acf-blocks/' . basename(dirname($blockpath)) . '/preview.jpg" width="450" height="250">';
}

/* Toggle Builder/Block Workflows
========================================================= */
if ($acf_builder == true) {

  acf_field_builder_registration();

  /* Admin Notice  */
  add_action('admin_notices', 'acf_builder_notice');
  function acf_builder_notice() {
    global $pagenow;
    if (!is_admin()) {
      return false;
    }
    if ($pagenow == 'edit.php') {
      if (isset($_GET['post_type']) && $_GET['post_type'] == 'acf-field-group') {
        echo '<div class="notice notice-error">
        <h2>Custom Fields managed via ACF Builder</h2>
        <p>ACF Builder library is located within the /init/ of this theme folder. Please <a target="_blank" rel="noopener" href="https://github.com/cheestudio/startup-blocks">view the README for more information</a> on this theme and the field management workflow.</p>
        </div>';
      }
    }
  }
}

if ($acf_blocks == true) {
  acf_blocks_registration();
}

if ($acf_builder && $acf_blocks == true) {
  acf_block_field_builder_registration();
}

/* ACF Options Page
========================================================= */
if (class_exists('ACF')) {
  acf_add_options_page([
    'page_title' => 'Theme Options',
    'menu_title' => 'Theme Options',
    'menu_slug' => 'theme-options',
    'capability' => 'edit_theme_options',
    'position' => '999',
    'autoload' => true,
    'parent_slug' => 'themes.php',
  ]);
  // acf_add_options_page([
  //   'page_title' => 'Index Page (Posts)',
  //   'menu_title' => 'Index Page',
  //   'menu_slug' => 'posts-options',
  //   'capability' => 'edit_theme_options',
  //   'position' => '999',
  //   'autoload' => true,
  //   'parent_slug' => 'edit.php',
  // ]);
}
