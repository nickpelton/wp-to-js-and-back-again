<?php

// Pretty Ajax URL
require 'inc/ajax-pretty-url.php';

// WP localize script
add_action( 'wp_enqueue_scripts', 'my_local_scripts' );

// Load script based on page slug
function my_local_scripts(){

	global $post;
	if(get_post_type() == 'page'){
		require ABSPATH.'assets/'.$post->post_name.'/localize-script.php';
	}

}

// Setup AJAX endpoints
require 's2/ajax-endpoint.php';
require 's3/ajax-endpoint.php';
require 's4/ajax-endpoint.php';
require 's5/ajax-endpoint.php';
require 's6/ajax-endpoint.php';
require 's7/ajax-endpoint.php';
require 's8/ajax-endpoint.php';
require 's9/ajax-endpoint.php';