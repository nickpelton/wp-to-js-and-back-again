<?php

/**
 * Setup JSON Ajax endpoint for Javascript async access to WP data 
 */

add_action('wp_ajax_my_action_1', 'my_callback_function_1'); // Enable for logged-in users
add_action('wp_ajax_nopriv_my_action_1', 'my_callback_function_1'); // Enable for anonymous users

function my_callback_function_1(){

	header('Content-Type: text/html');
	echo '<p>HTML from WP for Javascript to use</p>';
	die(); // Prevent WP -1

}