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

    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/libs/jquery.min.js', null, null, true );
    wp_enqueue_script( 'plugin', get_template_directory_uri() . '/js/plugins.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.min.js', array('plugin'), null, true);

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
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.min.css' );
  }
}
add_action('wp_print_styles', 'manage_css');