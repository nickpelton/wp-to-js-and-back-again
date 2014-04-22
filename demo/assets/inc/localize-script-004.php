<?php

// Setup our data
$myDataArray = array(
	'ajax_url' => admin_url( 'admin-ajax.php' ),
	'data'=>get_option('ww_votes')
);

// Pass data to myscript.js on page load
wp_localize_script( "myScript9", "myLocalizedData5", $myDataArray );


// wp_localize_script( $handle, $objectName, $arrayOfValues );
// $handle - The enqueued script to place the data immedietly before
// $objectName - Name of the JS object that will hold the data
// $arrayOfValues - Data to pass to JS