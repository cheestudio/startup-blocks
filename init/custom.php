<?php 
/* Custom Functions
========================================================= */

/* Sort Post Type by Title
========================================================= */
add_filter('pre_get_posts', 'custom_order_post_type');
function custom_order_post_type( $query ) {
  if ( $query->is_admin ) {
    if ( $query->get('post_type') == 'page' ) {
      $query->set('orderby', 'title');
      $query->set('order', 'ASC');
    }
  }
  return $query;
}
