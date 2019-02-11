<?php

$args = $wp_query->query_vars;

$sticky_posts = get_option( 'sticky_posts' );

$sticky_q = null;

if ( $sticky_posts )
{

  if (!is_paged())
  {

    $sticky_q = new WP_Query( array_merge( $args, array(
      'post__in'              => $sticky_posts,
      'posts_per_page'        => 9999,
      'ignore_sticky_posts'   => 1
    )) );

    $posts_per_page = (int)$args['posts_per_page'] - $sticky_q->found_posts;
    if ($posts_per_page < 1) $args['post_type'] = 'empty';

    $args = array_merge( $args, array(
      'post__not_in'          => $sticky_posts,
      'posts_per_page'        => $posts_per_page,
    ));

  }
  else
  {
    $args = array_merge( $args, array(
      'post__not_in' => $sticky_posts,
      'ignore_sticky_posts'   => 1,
      // 'paged' => $args['paged'] - 1,
    ));
  }

}

$q = new WP_Query( $args );

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <?php get_template_part( 'navs/detail', get_post_type() )?>
</div>

<div class="l-wrap">

<section class="l-archive">
  <ul class="list-news">

  <?php
  if ($sticky_q):

  while( $sticky_q->have_posts() ):
  $sticky_q->the_post();

  get_template_part( 'partials/loop', 'news' );

  endwhile;
  endif?>

  <?php
  while( $q->have_posts() ):
  $q->the_post();

  get_template_part( 'partials/loop', 'news' );

  endwhile?>

  </ul>
</section>

<?php wp_paginate()?>

<?php get_template_part( 'partials/footer' );