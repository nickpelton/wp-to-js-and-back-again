<?php

/**
 * Setup JSON Ajax endpoint for saving votes
 */

add_action('wp_ajax_save_votes_async', 'save_votes_async_callback_function'); // Enable for logged-in users
add_action('wp_ajax_nopriv_save_votes_async', 'save_votes_async_callback_function'); // Enable for anonymous users

function save_votes_async_callback_function(){

	// Set values
	$clicks = $_POST['vote'];
	$current_votes = get_option('ww_votes_async');

	// Check if there are existing votes
	if(!$current_votes){
		$current_votes = 0;
	}
	// Add votes
	$current_votes += (int) $clicks;

	// Update DB record
	update_option('ww_votes_async',$current_votes);

	sleep(rand(0,3)); // show how ajax is asyncronus

	// Return true in JSON
	wp_send_json_success($current_votes);

}


/**
 * Setup JSON Ajax endpoint for reseting votes
 */

add_action('wp_ajax_reset_votes_async', 'reset_votes_async_callback_function'); // Enable for logged-in users
add_action('wp_ajax_nopriv_reset_votes_async', 'reset_votes_async_callback_function'); // Enable for anonymous users

function reset_votes_async_callback_function(){

	// Update DB record
	update_option('ww_votes_async',0);

	sleep(rand(0,3)); // show how ajax is syncronus

	// Return true in JSON
	wp_send_json_success(0);

}



/**
 * Setup JSON Ajax endpoint for reseting votes
 */

add_action('wp_ajax_get_votes_async', 'get_votes_async_callback_function'); // Enable for logged-in users
add_action('wp_ajax_nopriv_get_votes_async', 'get_votes_async_callback_function'); // Enable for anonymous users

function get_votes_async_callback_function(){

	// Get Votes
	$votes = get_option('ww_votes_async');

	sleep(rand(0,3)); // show how ajax is syncronus

	// Return true in JSON
	wp_send_json_success($votes);

}
