<?php
add_action( 'wp_enqueue_scripts', 'my_scripts' );


function my_scripts(){
	
	if(is_page('s1')){
		// Register & enqueue our script
		wp_register_script( "myScript1", site_url()."/assets/js/myscript-1.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript1" );
	}

	if(is_page('s2')){
		// Register & enqueue our script
		wp_register_script( "myScript2", site_url()."/assets/js/myscript-2.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript2" );
	}

	if(is_page('s3')){
		// Register & enqueue our script
		wp_register_script( "myScript3", site_url()."/assets/js/myscript-3.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript3" );
	}

	if(is_page('s4')){
		// Register & enqueue our script
		wp_register_script( "myScript4", site_url()."/assets/js/myscript-4.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript4" );
	}

	if(is_page('s5')){
		// Register & enqueue our script
		wp_register_script( "myScript5", site_url()."/assets/js/myscript-5.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript5" );
	}

	if(is_page('s6')){
		// Register & enqueue our script
		wp_register_script( "myScript6", site_url()."/assets/js/myscript-6.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript6" );
	}

	if(is_page('s7')){
		// Register & enqueue our script
		wp_register_script( "myScript7", site_url()."/assets/js/myscript-7.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript7" );
	}

	if(is_page('s8')){
		// Register & enqueue our script
		wp_register_script( "myScript8", site_url()."/assets/js/myscript-8.js", array('jquery','underscore'), '1.0',true);
		wp_enqueue_script( "myScript8" );
	}

	if(is_page('s9')){
		// Register & enqueue our script
		wp_register_script( "myScript9", site_url()."/assets/js/myscript-9.js", array('jquery','underscore'), '1.0',true);
		wp_enqueue_script( "myScript9" );
	}

	if(is_page('s10')){
		// Register & enqueue our script
		wp_register_script( "myScript10", site_url()."/assets/js/myscript-10.js", array('jquery','underscore'), '1.0',true);
		wp_enqueue_script( "myScript10" );
	}
}