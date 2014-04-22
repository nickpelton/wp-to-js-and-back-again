<?php
/**
 *  Enqueue scripts and styles
 *
 * @package Alpha
 */
 
function alpha_scripts() {

	wp_enqueue_style( 'alpha-style', get_template_directory_uri() . '/assets/css/app-min.css', array(), '1.0' );
	wp_enqueue_style( 'demo', '/assets/css/demo.css', array(), '1.0' );

	wp_enqueue_script( 'alpha-script', get_template_directory_uri() . '/assets/js/app-min.js', array(), '1.0', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
	
}

add_action( 'wp_enqueue_scripts', 'alpha_scripts' );