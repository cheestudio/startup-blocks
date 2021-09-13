<?php
/* Custom Font Embeds
========================================================= */

function chee_enqueue_custom_fonts() {
	// wp_enqueue_style('typekit', "https://use.typekit.net/rfw6ied.css" );
	// wp_enqueue_script('fontawesome', "https://use.fontawesome.com/430a4cedb2.js" );
}
add_action('admin_enqueue_scripts', 'chee_enqueue_custom_fonts');
add_action('wp_enqueue_scripts', 'chee_enqueue_custom_fonts');
