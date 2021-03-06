<?php

// enque script
wp_enqueue_script( "myScript", site_url()."/assets/s1/myscript.js", array('jquery'), '1.0',true);

// Setup our data
$myDataArray = array(
	'data' => array( // Add some data
			'person' => array(
				'name'=>'Nick',
				'job' => 'Developer'
			)
		)
);

// Pass data to myscript.js on page load
wp_localize_script( "myScript", "myLocalizedData", $myDataArray );

// wp_localize_script( $handle, $objectName, $arrayOfValues );
// $handle - The enqueued script to place the data immedietly before
// $objectName - Name of the JS object that will hold the data
// $arrayOfValues - Data to pass to JS