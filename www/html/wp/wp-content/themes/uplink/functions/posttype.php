<?php

//カスタム投稿タイプ お知らせ
function news_postype() {
  $labels = array(
    'name' => 'お知らせ',
    'singular_name' => 'お知らせ',
    'add_new' => '新規追加',
    'add_new_item' => '新規お知らせを追加',
    'edit_item' => 'お知らせを編集',
    'new_item' => '新規お知らせ',
    'view_item' => 'お知らせを表示',
    'search_items' => 'お知らせを検索',
    'not_found' =>  '投稿されたお知らせはありません',
    'not_found_in_trash' => 'ゴミ箱にお知らせはありません。',
    'parent_item_colon' => '',
  );
  $args = array(
    'label' => __('news'),
    'labels' => $labels,
    'public' => true,
    'menu_position' => 5,
    'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
    'has_archive' => 'news'
  );
  register_post_type( 'news', $args);
}
add_action( 'init', 'news_postype' );

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
    'supports'=> array('title', 'thumbnail', 'excerpt', 'editor'),
    'taxonomies' => array('post_tag'),
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
    'supports'=> array('title', 'thumbnail', 'excerpt', 'editor'),
    'taxonomies' => array('post_tag'),
    'has_archive' => 'event'
  );
  register_post_type( 'event', $args);
}
add_action( 'init', 'event_postype' );

function gallery_postype() {
  $labels = array(
    'name' => 'ギャラリー',
    'singular_name' => 'ギャラリー',
    'add_new' => '新規追加',
    'add_new_item' => '新規ギャラリーを追加',
    'edit_item' => 'ギャラリーを編集',
    'new_item' => '新規ギャラリー',
    'view_item' => 'ギャラリーを表示',
    'search_items' => 'ギャラリーを検索',
    'not_found' =>  '投稿されたギャラリーはありません',
    'not_found_in_trash' => 'ゴミ箱にギャラリーはありません。',
    'parent_item_colon' => '',
  );
  $args = array(
    'label' => __('gallery'),
    'labels' => $labels,
    'public' => true,
    'menu_position' => 5,
    'supports'=> array('title', 'thumbnail', 'excerpt', 'editor'),
    'taxonomies' => array('post_tag'),
    'has_archive' => 'gallery'
  );
  register_post_type( 'gallery', $args);
}
add_action( 'init', 'gallery_postype' );

function market_postype() {
  $labels = array(
    'name' => 'マーケット',
    'singular_name' => 'マーケット',
    'add_new' => '新規追加',
    'add_new_item' => '新規マーケットを追加',
    'edit_item' => 'マーケットを編集',
    'new_item' => '新規マーケット',
    'view_item' => 'マーケットを表示',
    'search_items' => 'マーケットを検索',
    'not_found' =>  '投稿されたマーケットはありません',
    'not_found_in_trash' => 'ゴミ箱にマーケットはありません。',
    'parent_item_colon' => '',
  );
  $args = array(
    'label' => __('market'),
    'labels' => $labels,
    'public' => true,
    'menu_position' => 5,
    'supports'=> array('title', 'thumbnail', 'excerpt', 'editor'),
    'taxonomies' => array('post_tag'),
    'has_archive' => 'market'
  );
  register_post_type( 'market', $args);
}
add_action( 'init', 'market_postype' );