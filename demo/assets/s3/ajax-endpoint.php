<?php

/**
 * Setup JSON Ajax endpoint for Javascript async access to WP data 
 */

add_action('wp_ajax_my_action_3', 'my_callback_function_3'); // Enable for logged-in users
add_action('wp_ajax_nopriv_my_action_3', 'my_callback_function_3'); // Enable for anonymous users

function my_callback_function_3(){

	// Setup our data
	$myDataArray = array(
		'data' => array(
			'person' => array(
				'name'=>'Nick',
				'job' => 'Developer'
			)
		)
	);

	// Return data as JSON string
	wp_send_json($myDataArray); // Shorthand for below

}