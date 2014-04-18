<?php

/**
 * Setup JSON Ajax endpoint for Javascript async access to WP data 
 */

add_action('wp_ajax_my_action', 'my_callback_function'); // Enable for logged-in users
add_action('wp_ajax_nopriv_my_action', 'my_callback_function'); // Enable for anonymous users

// add_action('wp_ajax_{name_of_action}', 'name_of_function_to_call');


function my_callback_function(){

	// Nonce Security check
	check_ajax_referer( 'secret-string', 'nonce' );

	// Capability Security check
	if(!current_user_can('edit_posts')){
		die('No Way');
	}

	// Method Security check - must be POST
	$method = $_SERVER[ 'REQUEST_METHOD' ];
	if(!$method === 'POST'){
		die('Nope');
	}
	
	// Confirm Ajax Headers // Note requires this to be set, luckily jQuery does this
	if(!strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	{
		die('Still Nope');
	}
	   
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

	// Return data as JSON string
	wp_send_json($myDataArray); // Shorthand for below

	// header("Content-Type: application/json");
	// echo json_encode($myDataArray);
	// die(); // Kill process, no need to go any further.

}









/**
 * Better way to define Ajax endpoints
 *
 * array($action_name => $public);
 * 
 */
$ajax_actions = array(
					'my_action_1'=>true,
					'my_action_2'=>true,
					'my_action_3'=>true,
					'my_action_4'=>true,
			);

// Register our endpoints
register_ajax_endpoints($ajax_actions);


function my_action_1_callback(){
	echo 'test';
	die;
}

function my_action_2_callback(){
	echo 'test';
	die;
}

function my_action_3_callback(){
	echo 'test';
	die;
}

function my_action_4_callback(){
	echo 'test';
	die;
}



/*
** AJAX Action Setup
*/
function register_ajax_endpoints($ajax_actions = array()){
	
	//Loop through and set up an ajax action for each
	foreach($ajax_actions as $action => $public){

		if($public){
			add_action('wp_ajax_nopriv_'.$action, $action."_callback");
		}
		add_action('wp_ajax_'.$action, $action."_callback");
	}

}

