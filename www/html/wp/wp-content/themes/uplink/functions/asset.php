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

function manage_twitter_js()
{
  if( !is_admin() )
  {
    echo <<< EOS
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
EOS;


  }
}

add_action('wp_print_scripts', 'manage_js');
add_action('wp_print_scripts', 'manage_twitter_js');

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