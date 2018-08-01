<?php

/* ----------------------------------------------------------

  ￼functions/asset.php

---------------------------------------------------------- */

/* ----------------------------------------------------------

  JS

---------------------------------------------------------- */

function manage_js()
{
  if (!is_admin())
  {
    wp_deregister_script('jquery');

    wp_enqueue_script( 'script', get_bloginfo('template_url').'/js/build.js', null, null, true);

    // add_filter('script_loader_src', 'script_cleanup');
  }
}
add_action('wp_print_scripts', 'manage_js');

/* ----------------------------------------------------------

  CSS

---------------------------------------------------------- */

function manage_css()
{
  if (!is_admin())
  {
    wp_enqueue_style('style', get_bloginfo('template_url').'/css/style.css');
    wp_enqueue_style('lato', 'https://fonts.googleapis.com/css?family=Lato:400,700|Oswald:500,700');
    // wp_enqueue_style('fa', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css');
  }
}
add_action('wp_print_styles', 'manage_css');