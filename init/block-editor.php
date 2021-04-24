<?php
/* BLOCK EDITOR FUNCTIONS
========================================================= */

/* Disable Gutenberg Sitewide
========================================================= */
//add_filter('use_block_editor_for_post', '__return_false', 10);

/* Disable Gutenberg Per Post Type
========================================================= */
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
  if ($post_type === 'CPT_HERE' || $post_type === 'ANOTHER_CPT_HERE') return false;
  return $current_status;
}

/* Templates and Page IDs without editor
========================================================= */

function chee_disable_editor( $id = false ) {

  $excluded_templates = array(
    //'templates/tpl-{template-name}.php',
  );

  if( empty( $id ) )
    return false;

  $id = intval( $id );
  $template = get_page_template_slug( $id );

  return in_array( $template, $excluded_templates );
}

function chee_disable_gutenberg( $can_edit, $post_type ) {

  if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
    return $can_edit;

  if( chee_disable_editor( $_GET['post'] ) )
    $can_edit = false;

  return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'chee_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'chee_disable_gutenberg', 10, 2 );

/* Disable Classic Editor Sidewide
========================================================= */

/*function chee_disable_classic_editor() {

  $screen = get_current_screen();
  if( 'page' !== $screen->id || ! isset( $_GET['post']) )
    return;

  if( chee_disable_editor( $_GET['post'] ) ) {
    remove_post_type_support( 'page', 'editor' );
  }

}
add_action( 'admin_head', 'chee_disable_classic_editor' );*/