<?php

/* ----------------------------------------------------------

  ￼functions/init.php

---------------------------------------------------------- */

/* ----------------------------------------------------------

  ￼Action

---------------------------------------------------------- */

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

remove_action( 'load-plugins.php', 'wp_update_plugins' );
remove_action( 'load-update.php', 'wp_update_plugins' );
remove_action( 'load-update-core.php', 'wp_update_plugins' );
remove_action( 'admin_init', '_maybe_update_core');
remove_action( 'admin_init', '_maybe_update_plugins' );
remove_action( 'wp_update_plugins', 'wp_update_plugins' );
remove_action( 'wp_version_check', 'wp_version_check' );

add_filter( 'pre_transient_update_plugins', function() { return null; } );
add_filter( 'pre_site_transient_update_core', function() { return null; } );
add_filter( 'pre_site_transient_update_plugins', function() { return null; } );

if ( function_exists('acf_add_options_page') )
{

  acf_add_options_page();

}

/* ----------------------------------------------------------

  ￼body_class()

---------------------------------------------------------- */

function cts_body_classes( $classes, $class = null )
{

  $classes = [];

  $classes[] = 'theme-bg';

  return $classes;

}
add_filter( 'body_class', 'cts_body_classes', 1 );