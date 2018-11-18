<?php

function movie_postype() {
  $labels = array(
    'name' => '上映',
    'singular_name' => '上映',
    'add_new' => '新規追加',
    'add_new_item' => '新規上映を追加',
    'edit_item' => '上映を編集',
    'new_item' => '新規上映',
    'view_item' => '上映を表示',
    'search_items' => '上映を検索',
    'not_found' =>  '投稿された上映はありません',
    'not_found_in_trash' => 'ゴミ箱に上映はありません。',
    'parent_item_colon' => '',
  );
  $args = array(
    'label' => __('movie'),
    'labels' => $labels,
    'public' => true,
    'menu_position' => 5,
    'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
    'has_archive' => 'movie'
  );
  register_post_type( 'movie', $args);
}
add_action( 'init', 'movie_postype' );

//カスタム投稿タイプ イベント
function event_postype() {
  $labels = array(
    'name' => 'イベント',
    'singular_name' => 'イベント',
    'add_new' => '新規追加',
    'add_new_item' => '新規イベントを追加',
    'edit_item' => 'イベントを編集',
    'new_item' => '新規イベント',
    'view_item' => 'イベントを表示',
    'search_items' => 'イベントを検索',
    'not_found' =>  '投稿されたイベントはありません',
    'not_found_in_trash' => 'ゴミ箱にイベントはありません。',
    'parent_item_colon' => '',
  );
  $args = array(
    'label' => __('event'),
    'labels' => $labels,
    'public' => true,
    'menu_position' => 5,
    'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
    'has_archive' => 'event'
  );
  register_post_type( 'event', $args);
}
add_action( 'init', 'event_postype' );