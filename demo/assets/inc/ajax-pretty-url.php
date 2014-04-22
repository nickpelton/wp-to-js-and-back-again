<?php

/**
 * API Pretty URL setup
 *
 * Ideal if you want to hide WP or build a RESTful interface
 */

add_action('generate_rewrite_rules', 'add_my_non_wp_rewrite_rules');

function add_my_non_wp_rewrite_rules() {

  global $wp_rewrite;
  $new_non_wp_rules = array(
    "myapi/(.*)" => "wp-admin/admin-ajax.php?action=$1",
  );
  $wp_rewrite->non_wp_rules += $new_non_wp_rules;
}
