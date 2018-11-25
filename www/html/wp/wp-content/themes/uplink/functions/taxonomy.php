<?php

function uplink_unregister_taxonomies()
{
    global $wp_taxonomies;

    /*
     * 投稿機能から「カテゴリー」を削除
     */
    if (!empty($wp_taxonomies['category']->object_type))
    {
        foreach ($wp_taxonomies['category']->object_type as $k => $object_type)
        {
            if ($object_type === 'post')
            {
                unset($wp_taxonomies['category']->object_type[$k]);
            }
        }
    }

    /*
     * 投稿機能から「タグ」を削除
     */
    if (!empty($wp_taxonomies['post_tag']->object_type))
    {
        foreach ($wp_taxonomies['post_tag']->object_type as $k => $object_type)
        {
            if ($object_type === 'post')
            {
                unset($wp_taxonomies['post_tag']->object_type[$k]);
            }
        }
    }

    return true;
}
add_action('init', 'uplink_unregister_taxonomies', 1);

register_taxonomy('movie_status', array('movie'), array(
  'labels' => array(
    'name'              => '公開ステータス',
    'singular_name'     => '公開ステータス',
    'search_items'      => '公開ステータスを検索',
    'popular_items'     => 'よく使われている公開ステータス',
    'all_items'         => 'すべての公開ステータス',
    'parent_item'       => '親公開ステータス',
    'parent_item_colon' => '親公開ステータス:',
    'edit_item'         => '公開ステータスの編集',
    'update_item'       => '更新',
    'add_new_item'      => '新規公開ステータス',
    'new_item_name'     => '新しい公開ステータス',
  ),
  'hierarchical'      => false,
  'show_ui'           => true,
  'query_var'         => true,
  'show_admin_column' => true,
  'rewrite'           => true,
));