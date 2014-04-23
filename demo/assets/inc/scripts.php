<?php
add_action( 'wp_enqueue_scripts', 'my_scripts' );


function my_scripts(){
	
	if(is_page('s1')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s1/myscript.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}

	if(is_page('s2')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s2/myscript.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}

	if(is_page('s3')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s3/myscript.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}

	if(is_page('s4')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s4/myscript.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}

	if(is_page('s5')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s5/myscript.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}

	if(is_page('s6')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s6/myscript.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}

	if(is_page('s7')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s7/myscript.js", array('jquery'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}

	if(is_page('s8')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s8/myscript.js", array('jquery','underscore'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}

	if(is_page('s9')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s9/myscript.js", array('jquery','underscore'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}

	if(is_page('s10')){
		// Register & enqueue our script
		wp_register_script( "myScript", site_url()."/assets/s10/myscript.js", array('jquery','underscore'), '1.0',true);
		wp_enqueue_script( "myScript" );
	}
}