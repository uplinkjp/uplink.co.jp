<?php

$args = $wp_query->query_vars;
$sticky_posts = get_option( 'sticky_posts' );

if ( $sticky_posts )
{

  if (!is_paged())
  {
    $args = array_merge( $args, array(
      'post__in'              => $sticky_posts,
      'posts_per_page'        => 9999,
      'ignore_sticky_posts'   => 1
    ));
  }
  else
  {
    $args = array_merge( $args, array(
      'post__not_in' => $sticky_posts,
    ));
  }

}

$q = new WP_Query( $args );

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <?php get_template_part( 'navs/detail' )?>
</div>

<div class="l-wrap">

<section class="l-archive">
  <div class="list_archive">

  <?php
  while( $q->have_posts() ):
  $q->the_post();

  get_template_part( 'partials/loop', 'panel' );

  endwhile?>

  </div>
</section>

<?php
wp_reset_query();
wp_paginate();
?>

<?php get_template_part( 'partials/footer' );