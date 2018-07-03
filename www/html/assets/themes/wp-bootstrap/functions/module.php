<?php

class WP_Module
{

  public function render( $text )
  {
    global $post;

    if ($post->post_type !== 'post') $text = '';

    while(have_rows('modules', $post->ID))
    {

      the_row();

      $tpl = locate_template( 'modules/' . get_row_layout() . '-' . get_sub_field('style') . '.php', false );

      if (!$tpl) $tpl = locate_template( 'modules/' . get_row_layout() .'.php', false );

      if ($tpl) $text .= load_template( $tpl, false );

    }

    return $text;
  }

}

if (CTS_USE_MODULE)
{

  add_action( 'the_content', array( 'WP_Module', 'render' ), 1000 );

}

/* ----------------------------------------------------------

  ￼Helper

---------------------------------------------------------- */

function cts_get_wp_query()
{

  $args = [
    'posts_per_page'        => get_sub_field('posts_per_page'),
    'ignore_sticky_posts'   => true,
  ];

  $posts = get_sub_field('posts');

  if (!$posts)
  {
    
    if ($terms = get_sub_field('terms'))
    {
      foreach($terms as $term)
      {
        if (!isset($args['tax_query'][$term->taxonomy]))
        {
          $args['tax_query'][$term->taxonomy] = array(
            'taxonomy' => $term->taxonomy,
            'field' => 'term_id',
            'terms' => [],
          );
        }
        $args['tax_query'][$term->taxonomy]['terms'][] = $term->term_id;
      }
    }

  }
  else
  {

    $args['post__in'] = wp_list_pluck($posts, 'ID');
    $args['orderby'] = 'post__in';

  }

  return new WP_Query($args);

}