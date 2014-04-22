<?php

/**
 * Setup JSON Ajax endpoint for saving votes
 */

add_action('wp_ajax_save_votes_secure', 'save_votes_secure_callback_function'); // Enable for logged-in users
add_action('wp_ajax_nopriv_save_votes_secure', 'save_votes_secure_callback_function'); // Enable for anonymous users

function save_votes_secure_callback_function(){

	// Check ajax security
	security_check();

	// Set values
	$clicks = $_POST['vote'];

	// Update DB record
	update_option("ww_votes_secure",(int) $clicks);

	// Return true in JSON
	wp_send_json_success($clicks);

}


function security_check(){

	// Nonce Security check
	check_ajax_referer( 'secret-string', 'nonce' );

	// Capability Security check
	if(!current_user_can('edit_posts')){
		die("You dont have permission");
	}

	// Method Security check - must be POST
	$method = $_SERVER[ 'REQUEST_METHOD' ];
	if(!$method === 'POST'){
		die('Invalid Request type');
	}
	
	// Confirm Ajax Headers // Note requires this to be set, luckily jQuery does this
	if(!strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	{
		die('Invalid HTTP request');
	}


}