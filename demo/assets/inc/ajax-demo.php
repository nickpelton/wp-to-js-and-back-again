<?php

// Load scripts
require "scripts.php";

// WP localize script
add_action( 'wp_enqueue_scripts', 'my_local_scripts' );

function my_local_scripts(){

	if(is_page('s1')){
		require "localize-script-001.php";
	}else if(is_page('s2')){
		require "localize-script-002.php";
	}else if(is_page('s8')){
		require "localize-script-008.php";
	}else if(is_page('s9')){
		require "localize-script-009.php";
	}else{
		require "localize-script-003.php";
	}

}

// Setup AJAX endpoints
require "ajax-endpoints-1.php";
require "ajax-endpoints-2.php";
require "ajax-endpoints-3.php";
require "ajax-endpoints-4.php";
require "ajax-endpoints-5.php";
require "ajax-endpoints-6.php";
require "ajax-endpoints-8.php";
require "ajax-endpoints-9.php";

// Pretty Ajax URL
require "ajax-pretty-url.php";