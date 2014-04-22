<?php

/**
 * Setup JSON Ajax endpoint for Javascript async access to WP data 
 */

add_action('wp_ajax_my_action_4', 'my_callback_function_4'); // Enable for logged-in users
add_action('wp_ajax_nopriv_my_action_4', 'my_callback_function_4'); // Enable for anonymous users

function my_callback_function_4(){

	// Get some data from WP
	$args = array(
		'post_type'=>'post',
		'posts_per_page' => 3
	);
	$posts_array = get_posts($args);

	// Return data as JSON string
	wp_send_json($posts_array); // Shorthand for below

}
