<?php
/* STYLESHEETS AND SCRIPTS
========================================================= */

/* Front End Styles */

function theme_styles() {
  $cache_bust = '?'.filemtime( get_stylesheet_directory() . '/style.min.css');
  wp_register_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/style.min.css'.$cache_bust, array(), '', 'all' );
  wp_enqueue_style( 'main-stylesheet' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

/* Custom Gutenberg Styles */

function gutenberg_editor_styles() {
  $cache_bust = '?'.filemtime( get_stylesheet_directory() . '/editor.css');
  wp_register_style( 'editor-stylesheet', get_stylesheet_directory_uri() . '/editor.css'.$cache_bust, array(), '', 'all' );
  wp_enqueue_style( 'editor-stylesheet' );
}
add_action( 'enqueue_block_editor_assets', 'gutenberg_editor_styles' );


/* Custom JS */

function custom_scripts() {
  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  $js1_bust = '?'.filemtime( get_stylesheet_directory() . '/assets/js/all.min.js');
  wp_register_script('custom_main', get_template_directory_uri() . '/assets/js/all.min.js', false, $js1_bust, true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('custom_main');
}
add_action('wp_enqueue_scripts', 'custom_scripts', 100);

/* Default TinyMCE Editor Styles */

add_editor_style( 'editor-styles.css' );