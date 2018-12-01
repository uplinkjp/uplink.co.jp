<?php

/* ----------------------------------------------------------

  ￼Pagination

---------------------------------------------------------- */

if (!function_exists('wp_paginate'))
{

  function wp_paginate()
  {

    global $paged, $wp_query, $wp_rewrite;

    $big = 999999;

    $paginate_base = str_replace( home_url(), trim(home_url('/'), '/'), get_pagenum_link($big) );

    if ( strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks() )
    {
      $paginate_format = '';
      $paginate_base = add_query_arg('paged','%#%');
    }
    else
    {
      $paginate_base = str_replace('page/' . $big, '%_%', $paginate_base);
      $paginate_format = 'page/%#%';
    }

    $pages = paginate_links(array(
      'base'        => $paginate_base,
      'format'      => $paginate_format,
      'total'       => $wp_query->max_num_pages,
      'type'        => 'array',
      'mid_size'    => 4,
      'prev_next'   => false,
      'current'     => $paged ? $paged : 1,
    ));

    $prev = get_previous_posts_link('PREV');
    $next = get_next_posts_link('NEXT');

    if ($pages)
    {
      echo '<div class="archive-pager">';

      if ($prev) echo $prev;

      foreach($pages as $page) echo $page;

      if ($next) echo $next;

      echo '</div>';
    }

  }

  add_filter( 'previous_posts_link_attributes', function( $attr )
  {
    return $attr . ' class="pager-prev"';
  } );

  add_filter( 'next_posts_link_attributes', function( $attr )
  {
    return $attr . ' class="pager-next"';
  } );
}