<?php

// Setup our data
$myDataArray = array(
	'ajax_url' => admin_url( 'admin-ajax.php' ),
	'ajax_nonce' => wp_create_nonce( 'secret-string' ), // add some security
);

// Pass data to myscript.js on page load
wp_localize_script( "myScript3", "myLocalizedData3", $myDataArray );
wp_localize_script( "myScript4", "myLocalizedData3", $myDataArray );
wp_localize_script( "myScript5", "myLocalizedData3", $myDataArray );
wp_localize_script( "myScript6", "myLocalizedData3", $myDataArray );
wp_localize_script( "myScript7", "myLocalizedData3", $myDataArray );
wp_localize_script( "myScript8", "myLocalizedData3", $myDataArray );
wp_localize_script( "myScript9", "myLocalizedData3", $myDataArray );
wp_localize_script( "myScript10", "myLocalizedData3", $myDataArray );

// wp_localize_script( $handle, $objectName, $arrayOfValues );
// $handle - The enqueued script to place the data immedietly before
// $objectName - Name of the JS object that will hold the data
// $arrayOfValues - Data to pass to JS