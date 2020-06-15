<?php

/* ----------------------------------------------------------

  ￼Admin

---------------------------------------------------------- */

function uplink_add_movie_id_column($columns)
{

  if( in_array(get_post_type(), array('movie', 'event', 'market', 'gallery')) )
  {
    foreach ($columns as $name => $column)
    {
      if ($name === 'date') $columns['movie_id'] = 'Movie ID';
      $columns[$name] = $column;
    }
  }

  return $columns;
}
add_filter( 'manage_posts_columns', 'uplink_add_movie_id_column' );

function uplink_manage_movie_id_column($column_name, $post_id) {
    if ( 'movie_id' == $column_name )
    {
      the_field('movie_id');
    }
}
add_action( 'manage_posts_custom_column', 'uplink_manage_movie_id_column', 10, 2 );

// カスタム投稿タイプでaddquicktagを使う
add_filter( 'addquicktag_post_types', 'my_addquicktag_post_types' );
function my_addquicktag_post_types( $post_types )
{
  array_push($post_types, 'event', 'movie' , 'movie', 'gallery', 'market', 'news', 'film', 'webshop');
  return $post_types;
}
