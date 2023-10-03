<?php 

/* Admin Security
========================================================= */

// Redirect Subscribers to Frontend
add_action('admin_init', 'wp_admin_redirect');
function wp_admin_redirect() {
    if ( defined('DOING_AJAX') && DOING_AJAX ) { //preserve admin-ajax.php
        return;
    }
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_redirect(home_url());
        exit;
    }
}

// Disable Admin Bar for Subscribers
if ( ! current_user_can( 'manage_options' ) ) {
	show_admin_bar( false );
}