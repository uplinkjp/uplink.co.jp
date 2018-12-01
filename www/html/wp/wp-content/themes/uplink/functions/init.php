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

add_theme_support( 'post-thumbnails' );

if ( function_exists('acf_add_options_page') )
{

  $option = acf_add_options_page(array(
    'menu_slug'   => 'option',
    'page_title'  => 'オプション',
    'menu_title'  => 'オプション',
    'redirect'    => false
  ));

}

/* ----------------------------------------------------------

  ￼Uploads Path

---------------------------------------------------------- */

// add_action('init', function() {

//   if (get_uplink_site() !== 'www')
//   {
//     define( 'UPLOADS', 'wp-content/uploads/' . get_uplink_site() );
//   }

// });

/* ----------------------------------------------------------

  ￼body_class()

---------------------------------------------------------- */

function cts_body_classes( $classes, $class = null )
{

  $classes = [];

  $classes[] = 'theme-' . get_uplink_site();

  if (is_front_page() || is_home() || is_404()) $classes[] = 'type-frontpage';

  if (is_singular())
  {
    $classes[] = 'type-3rd';
  }
  if (is_archive()) $classes[] = 'type-2nd';

  if (is_singular() || is_post_type_archive())
  {
    $posttype = get_post_type();
    if ($posttype === 'movie') $posttype = 'film';
    if ($posttype === 'news') $posttype = 'default';
    if ($posttype === 'page') $posttype = is_page('map') ? 'map' : 'default';
    $classes[] = 'category-' . $posttype;
  }

  if (is_tag())
  {
    $classes[] = 'category-default';
  }

  if (is_404())
  {
    $classes[] = 'category-alt';
  }

  return $classes;

}
add_filter( 'body_class', 'cts_body_classes', 1 );

/* ----------------------------------------------------------

  ￼Archive Page

---------------------------------------------------------- */

add_action( 'pre_get_posts', function( $query )
{

  if (is_tag())
  {
    $query->set('post_type', array( 'movie', 'film', 'event', 'market', 'gallery' ));
  }

});