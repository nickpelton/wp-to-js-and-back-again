<?php

/**
 * Setup JSON Ajax endpoint for saving votes
 */

add_action('wp_ajax_save_votes_fast', 'save_votes_fast_callback_function'); // Enable for logged-in users
add_action('wp_ajax_nopriv_save_votes_fast', 'save_votes_fast_callback_function'); // Enable for anonymous users

function save_votes_fast_callback_function(){

	// Set values
	$votes = $_POST['vote'];

	// Update DB record
	update_option('ww_votes_fast',(int) $votes);

	// Return true in JSON
	wp_send_json_success($votes);

}


/**
 * Setup JSON Ajax endpoint for reseting votes
 */

add_action('wp_ajax_reset_votes_fast', 'reset_votes_fast_callback_function'); // Enable for logged-in users
add_action('wp_ajax_nopriv_reset_votes_fast', 'reset_votes_fast_callback_function'); // Enable for anonymous users

function reset_votes_fast_callback_function(){

	// Update DB record
	update_option('ww_votes_fast',0);

	// Return true in JSON
	wp_send_json_success(0);

}