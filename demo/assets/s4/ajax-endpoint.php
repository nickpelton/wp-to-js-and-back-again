<?php

/**
 * Setup JSON Ajax endpoint for Javascript async access to WP data 
 */

add_action('wp_ajax_load_posts', 'load_post_callback'); // Enable for logged-in users
add_action('wp_ajax_nopriv_load_posts', 'load_post_callback'); // Enable for anonymous users

function load_post_callback(){

	// Get some data from WP
	$args = array(
		'post_type'=>'post',
		'posts_per_page' => 3
	);
	$posts_array = get_posts($args);

	// Return data as JSON string
	wp_send_json($posts_array);

}


// output: http://presentation.dev/demo/wp-admin/admin-ajax.php?action=my_action_4