<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Alpha
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri() . '/assets/js/html5shiv.min.js';?>"></script>
	<script src="<?php echo get_template_directory_uri() . '/assets/js/respond.min.js';?>"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="container">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>

		<div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		    </button>
	    </div>
		<nav id="site-navigation" class="collapse navbar-collapse navbar-ex1-collapse">
			<?php 
				wp_nav_menu( 
					array(
						'theme_location' => 'primary', 
						'menu_class' => 'nav navbar-nav',
						'walker' => new Alpha_Walker_Nav_Menu()
					) 
				); 
			?>
			
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
