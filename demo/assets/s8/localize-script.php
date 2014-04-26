<?php

// enque script
wp_enqueue_script( "myScript", site_url()."/assets/s8/myscript.js", array('jquery','underscore'), '1.0',true);

// Setup our data
$myDataArray = array(
	'ajax_url' => admin_url( 'admin-ajax.php' ),
	'data'=>get_option('ww_votes_fast')
);

// Pass data to myscript.js on page load
wp_localize_script( "myScript", "myLocalizedData", $myDataArray );


// wp_localize_script( $handle, $objectName, $arrayOfValues );
// $handle - The enqueued script to place the data immedietly before
// $objectName - Name of the JS object that will hold the data
// $arrayOfValues - Data to pass to JS