<?php
/**
 * Starter functions and definitions
 *
 * @package Alpha
 */

// Initialize theme support.
require get_template_directory() . '/inc/init.php'; 
 
// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Extras - will phase out during development
require get_template_directory() . '/inc/extras.php';

// Theme Scripts
require get_template_directory() . '/inc/scripts.php';

// Custom sidebar widgets 
require get_template_directory() . '/inc/widgets.php';

// For Placement Only Thumbnails
require get_template_directory() . '/inc/fpo-image.php';

// Custom Post Types 
require get_template_directory() . '/inc/post-types.php';

// Custom Taxonomies 
require get_template_directory() . '/inc/taxonomies.php';

// Custom Taxonomies 
require get_template_directory() . '/inc/taxonomies.php';

// Ajax demo
require ABSPATH.'assets/ajax-demo.php';