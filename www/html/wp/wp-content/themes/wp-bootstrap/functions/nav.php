<?php

/* ----------------------------------------------------------

  ￼functions/nav.php

---------------------------------------------------------- */

add_theme_support( 'menus' );

add_action( 'init', 'cts_register_navs', 100 );

function cts_register_navs()
{

  register_nav_menus( array(
    'drawer_nav'          => 'ドロワー',
    'footer_links'        => 'フッターリンク',
    'footer_links_sub'    => 'フッターリンク（サブ）',
  ));

}

function cts_wp_nav_description( $item_output, $item, $depth, $args )
{

  if ($args->theme_location !== 'footer_links') return $item_output;

  if ( !empty( $item->description ) )
  {
    $item_output = str_replace(
      '">' . $args->link_before . $item->title . '</a>',
      '">' . $args->link_before . $item->title . '</a>' . '<p class="c-gFooter-navi-note">' . nl2br($item->description) . '</p>',
      $item_output );
  }

  return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'cts_wp_nav_description', 10, 4 );

/* ----------------------------------------------------------

  ￼Drawer

---------------------------------------------------------- */

class WP_Walker_Drawer extends Walker_Nav_Menu
{

  function start_lvl(&$output, $depth = 0, $args = array())
  {
    $output .= '<ul class="c-navi_drawer-content-list-children">';
  }

}