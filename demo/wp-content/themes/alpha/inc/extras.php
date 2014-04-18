<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Alpha
 */

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function alpha_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'alpha_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function alpha_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'starter' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'alpha_wp_title', 10, 2 );


// Add custom login styles 
if ( !function_exists( 'alpha_custom_login_style' ) ) {
	function alpha_custom_login_style() {
		echo '<style type="text/css">
			body.login { background: #f1f1f1; } 
			.login h1 a { max-width: 100%; }
			.login form {
				box-shadow: none;
				-webkit-box-shadow: none;
				border: none;
				margin: 0;
				padding: 30px;
			}
			.login #backtoblog a {
				display: none;
			}
			.login #nav a { 
				text-shadow: none; 
				color: #58b4db !important;
			}
			.login form label { color:#ccc; text-transform: uppercase; font-size: 12px; }
			.login form .input, .login input[type=text] {
				border: none;
				box-shadow: none;
				background: #f9f9f9;
				border-radius: 2px;
				padding: 8px;
			}
			.login form .forgetmenot { float: none; }
			#login form p.submit {
				padding: 0;
				width: 100%;
				height: 45px;
				margin: 20px 0 0;
			}
			#login_error, .login .message {
				margin: 0 0 16px;
				border: none;
			}
			.wp-core-ui .button.button-large {
				border: none;
				border-radius: 2px;
				background: #58b4db;
				line-height: 1;
				font-size: 14px;
				text-transform: uppercase;
				width: 100%;
				padding: 15px 0;
				float: left;
				display: block;
				height: auto;
			}	
		</style>';
	}
}
add_action('login_head', 'alpha_custom_login_style');