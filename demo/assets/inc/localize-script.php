<?php

// Setup our data
$myDataArray = array(
	"data" => array(
			'person' => array(
				'name'=>'Nick',
				'job' => 'Developer',
				'age' => 'NonYaBiz'
			)
		),
	'ajax_url' => admin_url( 'admin-ajax.php' ),
	'ajax_nonce' => wp_create_nonce( "secret-string" ), // add some security
);

// Register &amp; enqueue our script
wp_register_script( "myScript", site_url()."/assets/js/myscript.js", array('jquery'), '1.0',true);
wp_enqueue_script( "myScript" );

// Pass data to myscript.js on page load
wp_localize_script( "myScript", "myLocalizedData", $myDataArray );

// wp_localize_script( $handle, $objectName, $arrayOfValues );
// $handle - The enqueued script to place the data immedietly before
// $objectName - Name of the JS object that will hold the data
// $arrayOfValues - Data to pass to JS