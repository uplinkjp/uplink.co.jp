<?php

add_action('init', function()
{

  register_taxonomy('lang', array('post', 'page'), array(
    'labels' => array(
      'name'                =>  ___('言語'),
      'singular_name'       =>  ___('言語'),
      'search_items'        =>  ___('言語を検索'),
      'all_items'           =>  ___('すべての言語'),
      'parent_item'         =>  ___('親言語'),
      'parent_item_colon'   =>  ___('親言語:'),
      'edit_item'           =>  ___('言語を編集'),
      'update_item'         =>  ___('言語を更新する'),
      'add_new_item'        =>  ___('新規言語を追加'),
      'new_item_name'       =>  ___('新しい言語名'),
    ),
    'hierarchical'          => false,
    'show_ui'               => true,
    'query_var'             => true,
    'show_in_nav_menus'     => true,
    // 'rewrite'               => array( 'slug' => 'type' ),
  ));

});