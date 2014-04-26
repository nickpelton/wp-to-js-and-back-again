<?php

/**
 * Setup JSON Ajax endpoint
 */

add_action('wp_ajax_secure_endpoint', 'secure_endpoint_callback_function');
add_action('wp_ajax_nopriv_secure_endpoint', 'secure_endpoint_callback_function');

function secure_endpoint_callback_function(){

	// Nonce Security check
	check_ajax_referer( 'my-secret-string', 'security' );

	echo "You have access!";
	die();
}
