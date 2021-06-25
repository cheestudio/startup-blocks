<?php
/* ACF Builder + Block Registration Workflows (optional)
========================================================= */

$acf_builder = true;
$acf_blocks = true;

 
/* Register Fields (can be removed if $acf_builder == false)
========================================================= */

use StoutLogic\AcfBuilder\FieldsBuilder; 
function acf_field_builder_registration(){
define('FIELDS_DIR', dirname(__FILE__) . '/fields');
if (is_dir(FIELDS_DIR)) {
  add_action('acf/init', function () {
    foreach (glob(FIELDS_DIR . '/partials/*.php') as $partial) { //include partials first
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

/* Register Blocks (can be removed if $acf_blocks == false)
========================================================= */

function acf_blocks_registration(){
define('BLOCKS_DIR', dirname(__FILE__,2) . '/partials/blocks');
add_action('acf/init', function () {

  // Retrieve all existing blocks
  foreach (glob(BLOCKS_DIR . '/**/*.php') as $filepath) {

    // Read the PHP comment meta data for the block
    $meta = get_file_data($filepath, array(
      'name'        => 'Block Name',
      'description' => 'Block Description',
      'category'    => 'Block Category',
      'post_types'  => 'Post Types',
      'mode'        => 'Block Mode',
      'align'       => 'Block Align',
      'icon'        => 'Block Icon'
    ));

    // Convert the post types to an array (or use defaults)
    $post_types = array_filter(
      array_map('trim', explode(',', $meta['post_types']))
    );

    if (empty($post_types)) {
      $post_types = array('page', 'post');
    }

    // Establish template path for each block directory
    $template_path = basename(dirname($filepath));

    // Register the ACF block using template meta data
    acf_register_block_type(array(
      'name'              => $template_path,
      'title'             => $meta['name'],
      'description'       => $meta['description'],
      'category'          => 'custom_blocks',
      'post_types'        => $post_types,
      'render_template'   => get_template_directory() . '/partials/blocks/'.$template_path.'/template.php',
      'enqueue_assets'    => 'block_assets',
      'mode'              => $meta['mode'] ? $meta['mode'] : 'edit',
      'align'             => $meta['align'] ? $meta['align'] : 'full',
      'icon'              => $meta['icon'],
      'supports'          => array(
        'align' => array( 'center','wide','full' ),
        'customClassName' => true
      ),
    ));
  }

// Register existing block assets
  function block_assets() {
    foreach (glob(BLOCKS_DIR . '/**/*.php') as $filepath) {
      // Establish template path for each block directory
      $block_name = basename(dirname($filepath));
      $block_styles = get_template_directory() . '/partials/blocks/'.$block_name.'/style.css';
      $block_script = get_template_directory() . '/partials/blocks/'.$block_name.'/script.js';
      if ( file_exists( $block_styles ) ) {
        $cache_bust = '?'.filemtime($block_styles);
        wp_enqueue_style( $block_name, get_template_directory_uri() . '/partials/blocks/'.$block_name.'/style.css',array(),$cache_bust);
      }
      if ( file_exists( $block_script ) ) {
       $cache_bust = '?'.filemtime($block_script);
       wp_enqueue_script( $block_name, get_template_directory_uri() . '/partials/blocks/'.$block_name.'/script.js', array('jquery'), $cache_bust, true );
     }
   }
 }
});
}

/* ACF Block Class/ID Helper Function
========================================================= */

function block_class_id($block_entry, $class)
{
    $className = $class;
    $id = $block_entry['id'];
    if (!empty($block_entry['anchor'])) {
        $id = $block_entry['anchor'];
    }
    if (!empty($block_entry['className'])) {
        $className .= ' ' . $block_entry['className'];
    }
    if (!empty($block_entry['align'])) {
        $className .= ' align' . $block_entry['align'];
    }
    echo 'id="'.esc_attr($id).'" class="'.esc_attr($className).'"';
}


/* Toggle Builder/Block Workflows
========================================================= */

if($acf_builder == true) {
  acf_field_builder_registration();
}

if($acf_blocks == true) {
  acf_blocks_registration();
}

/* ACF Options Page */

if(class_exists('ACF')) {
  acf_add_options_page([
    'page_title' => 'Theme Options',
    'menu_title' => 'Theme Options',
    'menu_slug'  => 'theme-options',
    'capability' => 'edit_theme_options',
    'position'   => '999',
    'autoload'   => true
  ]);
}