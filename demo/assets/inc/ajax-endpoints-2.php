<?php

/**
 * Setup JSON Ajax endpoint for Javascript async access to WP data 
 */

add_action('wp_ajax_my_action_2', 'my_callback_function_2'); // Enable for logged-in users
add_action('wp_ajax_nopriv_my_action_2', 'my_callback_function_2'); // Enable for anonymous users

function my_callback_function_2(){

	// Setup our data
	$myDataArray = array(
		"data" => array(
			'person' => array(
				'name'=>'Nick',
				'job' => 'Developer',
				'age' => 'NonYaBiz'
			)
		)
	);

	header("Content-Type: application/json");
	echo json_encode($myDataArray);
	die(); // Kill process, no need to go any further.

}