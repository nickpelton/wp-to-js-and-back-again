<?php

// Setup our data
$myDataArray = array(
	'ajax_url' => site_url().'/myapi/',
	'ajax_nonce' => wp_create_nonce( 'secret-string' ), // add some security
	'data'=>get_option('ww_votes_secure')
);

// Pass data to myscript.js on page load
wp_localize_script( "myScript10", "myLocalizedData10", $myDataArray );


// wp_localize_script( $handle, $objectName, $arrayOfValues );
// $handle - The enqueued script to place the data immedietly before
// $objectName - Name of the JS object that will hold the data
// $arrayOfValues - Data to pass to JS